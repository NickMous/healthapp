<?php

namespace App\Jobs\Import;

use App\Models\FoodData;
use App\Models\FoodDataSources;
use App\Models\User;
use App\Notifications\Data\Import\Done;
use App\Notifications\Data\Import\FileDoesNotExist;
use App\Notifications\Data\Import\OldDataRemoved;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProcessIngredientsImport implements ShouldQueue
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
        if (!Storage::exists($this->file)) {
            $this->user->notify(new FileDoesNotExist($this->source));
            return;
        }

        if (FoodData::where('food_data_source_id', $this->source->id)->count() > 0) {
            FoodData::where('food_data_source_id', $this->source->id)->delete();
            $this->user->notify(new OldDataRemoved($this->source));
        }

        $file = Storage::get($this->file);
        $rows = explode($this->source->row_delimiter == '\n' ? PHP_EOL : $this->source->row_delimiter, $file);
        foreach ($rows as $id => $row) {
            if ($id === 0 || empty($row)) {
                continue;
            }
            $columns = str_getcsv($row, $this->source->column_delimiter);

            $foodData = new \App\Models\FoodData;
            $foodData->food_data_source_id = $this->source->id;
            $foodData->name = $columns[json_decode($this->source->ingredients_columns)->name];
            $foodData->food_group = json_decode($this->source->ingredients_columns)->foodgroup ? $columns[json_decode($this->source->ingredients_columns)->foodgroup] : null;
            $foodData->serving_g = $this->getNumber($columns[json_decode($this->source->ingredients_columns)->serving_g]);
            $foodData->energy_kcal = $this->getNumber($columns[json_decode($this->source->ingredients_columns)->calories]);
            $foodData->protein_g = $this->getNumber($columns[json_decode($this->source->ingredients_columns)->protein_g]);
            $foodData->fat_g = $this->getNumber($columns[json_decode($this->source->ingredients_columns)->fat_g]);
            $foodData->water_g = $this->getNumber($columns[json_decode($this->source->ingredients_columns)->water_g]);
            $foodData->fiber_g = $this->getNumber($columns[json_decode($this->source->ingredients_columns)->fiber_g]);
            $foodData->sugar_g = $this->getNumber($columns[json_decode($this->source->ingredients_columns)->sugar_g]);
            $foodData->carbohydrates_g = $this->getNumber($columns[json_decode($this->source->ingredients_columns)->carbohydrates_g]);
            $foodData->notes = json_decode($this->source->ingredients_columns)->notes ? $columns[json_decode($this->source->ingredients_columns)->notes] : null;
            $foodData->save();
        }

        $source = FoodDataSources::find($this->source->id);
        $source->ingredients_version = json_decode($this->source->ingredients_columns)->version ? str_getcsv($rows[1], $this->source->column_delimiter)[json_decode($this->source->ingredients_columns)->version] : 'Not Specified';
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
