<?php

namespace App\Jobs\Import;

use App\Models\FoodData;
use App\Models\FoodDataSources;
use App\Models\FoodRecipes;
use App\Models\User;
use App\Notifications\Data\Import\Done;
use App\Notifications\Data\Import\FileDoesNotExist;
use App\Notifications\Data\Import\OldDataRemoved;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessRecipesImport implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $source;

    public $user;

    public $file;

    /**
     * Create a new job instance.
     */
    public function __construct(FoodDataSources $source, User $user, $file)
    {
        $this->source = $source;
        $this->user = $user;
        $this->file = $file;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ( ! Storage::exists($this->file)) {
            $this->user->notify(new FileDoesNotExist($this->source));

            return;
        }

        if (FoodRecipes::where('source_id', $this->source->id)->count() > 0) {
            FoodRecipes::where('source_id', $this->source->id)->delete();
            $this->user->notify(new OldDataRemoved($this->source));
        }

        $file = Storage::get($this->file);

        $rows = explode($this->source->row_delimiter == '\n' ? PHP_EOL : $this->source->row_delimiter, $file);

        foreach ($rows as $id => $row) {
            if ($id === 0 || empty($row)) {
                continue;
            }

            $columns = str_getcsv($row, $this->source->column_delimiter);

            $recipe = FoodRecipes::where('name', $columns[ json_decode($this->source->recipes_columns)->name ])
                                 ->first() ?? new FoodRecipes();
            $recipe->name = $columns[ json_decode($this->source->recipes_columns)->name ];
            $recipe->source_id = $this->source->id;
            $recipe->save();

            if ((bool) json_decode($this->source->recipes_columns)->canUseOtherSources) {
                $ingredients = FoodData::where('name', 'like', '%' . $columns[ json_decode($this->source->recipes_columns)->ingredients ] . '%')
                                       ->get();
            } else {
                $ingredients = FoodData::where('food_data_source_id', $this->source->id)
                                       ->where('name', 'like', '%' . $columns[ json_decode($this->source->recipes_columns)->ingredients ] . '%')
                                       ->get();
            }

            $recipe->foodData()->attach($ingredients, [
                'amount' => $this->getNumber($columns[ json_decode($this->source->recipes_columns)->amount ]),
            ]);

            $recipe->save();
        }

        $source = FoodDataSources::find($this->source->id);
        $source->recipes_version = str_getcsv($rows[1], $this->source->column_delimiter)[ json_decode($this->source->recipes_columns)->version ];
        $source->updated_at = now();
        $source->save();
        $this->user->notify(new Done($this->source));
    }

    private function getNumber($string): float
    {
        $number = preg_replace('/[,]/', '.', $string);
        preg_match('/\d+[.]\d+/', $number, $matches);
        if (count($matches) > 0) {
            return $matches[0];
        }

        return preg_match('/\d+/', $number, $matches) ? $matches[0] : 0;
    }
}
