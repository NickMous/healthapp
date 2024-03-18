<?php

namespace App\Livewire\Data;

use App\Models\FoodDataSources;
use Livewire\Component;

class Index extends Component
{

    public $data = [];

    public function mount()
    {
        $this->data = FoodDataSources::all();
    }

    public function render()
    {
        return view('livewire.data.index')->layout('layouts.app')->title(__('Data'));
    }
}
