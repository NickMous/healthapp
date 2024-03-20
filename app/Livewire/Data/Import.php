<?php

namespace App\Livewire\Data;

use App\Models\FoodDataSources;
use Livewire\Component;
use Livewire\WithFileUploads;

class Import extends Component
{

    use WithFileUploads;

    public $data = [];

    public function mount()
    {
        $this->data = FoodDataSources::all();
    }

    public function render()
    {
        return view('livewire.data.import')->layout('layouts.app')->title(__('Import data'));
    }

    public function delete($id)
    {
        FoodDataSources::find($id)->delete()->cascade();
        $this->data = FoodDataSources::all();
    }
}
