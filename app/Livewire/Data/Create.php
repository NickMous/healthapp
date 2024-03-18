<?php

namespace App\Livewire\Data;

use App\Models\FoodDataSources;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule(['required', 'min:3'])]
    public $name;

    public $description;

    public $url;

    #[Rule(['required', 'in:csv'])]
    public $file_type;

    #[Rule(['required'])]
    public $row_delimiter;

    #[Rule(['required'])]
    public $column_delimiter;

    public function create() {
        $this->validate();

        $source = new FoodDataSources();
        $source->name = $this->name;
        $source->description = $this->description;
        $source->url = $this->url;
        $source->file_type = $this->file_type;
        $source->row_delimiter = $this->row_delimiter;
        $source->column_delimiter = $this->column_delimiter;
        $source->save();

        $this->redirect(route('data.import'), navigate: true);
    }

    public function render()
    {
        return view('livewire.data.create')->layout('layouts.app')->title(__('Create source'));
    }
}
