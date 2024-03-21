<?php

namespace App\Livewire\Data;

use App\Models\FoodDataSources;
use Livewire\Component;
use Livewire\WithFileUploads;

class Import extends Component
{

    use WithFileUploads;

    public $data = [];

    public $showModal = false;

    public $modalId = 0;

    public function createModal($id)
    {
        $this->modalId = $id;
        $this->showModal = true;
    }

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
        FoodDataSources::find($id)->delete();
        $this->data = FoodDataSources::all();
    }
}
