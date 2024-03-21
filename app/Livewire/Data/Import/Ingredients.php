<?php

namespace App\Livewire\Data\Import;

use App\Models\FoodDataSources;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Import Data')]
class Ingredients extends Component
{

    use WithFileUploads;

    public $file;

    public $path;

    public $source;

    public $columns = [];

    public $name;

    public $foodgroup;

    public $serving_g;

    public $calories;

    public $protein_g;

    public $fat_g;

    public $water_g;

    public $fiber_g;

    public $sugar_g;

    public $carbohydrates_g;

    public $notes;

    public $version;

    public function mount()
    {
        $id = request()->id;
        $this->source = FoodDataSources::find($id);
        if (json_decode($this->source->ingredients_columns)) {
            $this->name = json_decode($this->source->ingredients_columns)->name;
            $this->foodgroup = json_decode($this->source->ingredients_columns)->foodgroup;
            $this->serving_g = json_decode($this->source->ingredients_columns)->serving_g;
            $this->calories = json_decode($this->source->ingredients_columns)->calories;
            $this->protein_g = json_decode($this->source->ingredients_columns)->protein_g;
            $this->fat_g = json_decode($this->source->ingredients_columns)->fat_g;
            $this->water_g = json_decode($this->source->ingredients_columns)->water_g;
            $this->fiber_g = json_decode($this->source->ingredients_columns)->fiber_g;
            $this->sugar_g = json_decode($this->source->ingredients_columns)->sugar_g;
            $this->carbohydrates_g = json_decode($this->source->ingredients_columns)->carbohydrates_g;
            $this->notes = json_decode($this->source->ingredients_columns)->notes;
            $this->version = json_decode($this->source->ingredients_columns)->version;
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.data.import.ingredients');
    }

    public function filechosen()
    {
        $this->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        $path = $this->file->store('ingredients');

        $this->path = $path;

        $file = fopen(storage_path('app/' . $path), 'r');

        $rows = str_getcsv(fgets($file), $this->source->row_delimiter);

        $this->columns = str_getcsv($rows[0], $this->source->column_delimiter);
    }

    public function queueImport()
    {
        $this->validate([
            'name' => 'required',
            'foodgroup' => 'required',
            'serving_g' => 'required',
            'calories' => 'required',
            'protein_g' => 'required',
            'fat_g' => 'required',
            'water_g' => 'required',
            'fiber_g' => 'required',
            'sugar_g' => 'required',
            'carbohydrates_g' => 'required',
            'notes' => 'required',
            'version' => 'required',
        ]);

        $columns = [
            'name' => $this->name,
            'foodgroup' => $this->foodgroup,
            'serving_g' => $this->serving_g,
            'calories' => $this->calories,
            'protein_g' => $this->protein_g,
            'fat_g' => $this->fat_g,
            'water_g' => $this->water_g,
            'fiber_g' => $this->fiber_g,
            'sugar_g' => $this->sugar_g,
            'carbohydrates_g' => $this->carbohydrates_g,
            'notes' => $this->notes,
            'version' => $this->version,
        ];

        $this->source->ingredients_columns = $columns;
        $this->source->save();

        $import = new \App\Jobs\Import\ProcessIngredientsImport($this->source, auth()->user(), $this->path);
        dispatch($import);

        session()->flash('flash.banner', 'Import queued for processing');
        session()->flash('flash.bannerStyle', 'success');

        return $this->redirect(route('data.index'), navigate: true);
    }
}
