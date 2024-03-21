<?php

namespace App\Livewire\Data\Import;

use App\Jobs\Import\ProcessRecipesImport;
use App\Models\FoodDataSources;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Recipes extends Component
{
    use WithFileUploads;

    public $canUseOtherSources = false;

    public $source;

    public $name;

    public $ingredients;

    public $amount;

    public $version;

    public $file;

    public $path;

    public $columns = [];

    #[Layout('layouts.app', ['title' => 'Import Data'])]
    public function render()
    {
        return view('livewire.data.import.recipes');
    }

    public function mount()
    {
        $id = request()->id;
        $this->source = FoodDataSources::find($id);
        if (json_decode($this->source->recipes_columns)) {
            $this->name = json_decode($this->source->recipes_columns)->name;
            $this->ingredients = json_decode($this->source->recipes_columns)->ingredients;
            $this->amount = json_decode($this->source->recipes_columns)->amount;
            $this->version = json_decode($this->source->recipes_columns)->version;
            $this->canUseOtherSources = (bool) json_decode($this->source->recipes_columns)->canUseOtherSources;
        }
    }

    public function fileChosen()
    {
        $this->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        $file = $this->file;

        $this->path = $file->store('recipes');

        $file = Storage::get($this->path);

        $rows = explode($this->source->row_delimiter == '\n' ? PHP_EOL : $this->source->row_delimiter, $file);

        $this->columns = str_getcsv($rows[0], $this->source->column_delimiter);
    }

    public function queueImport()
    {
        $this->validate([
            'name' => 'required',
            'ingredients' => 'required',
            'amount' => 'required',
            'version' => 'required',
        ]);

        $columns = [
            'name' => $this->name,
            'ingredients' => $this->ingredients,
            'amount' => $this->amount,
            'version' => $this->version,
            'canUseOtherSources' => (bool) $this->canUseOtherSources,
        ];

        $this->source->recipes_columns = json_encode($columns);
        $this->source->save();

        ProcessRecipesImport::dispatch($this->source, auth()->user(), $this->path);

        session()->flash('flash.banner', 'Your import has been queued!');
        session()->flash('flash.bannerStyle', 'success');

        return $this->redirect(route('data.index'), navigate: true);
    }
}
