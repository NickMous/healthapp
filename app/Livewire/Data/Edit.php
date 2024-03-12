<?php

namespace App\Livewire\Data;

use App\Models\FoodDataSources;
use Livewire\Component;

class Edit extends Component
{
    public $data;

    public $name;

    public $description;

    public $url;

    public $file_type;

    public $row_delimiter;

    public $column_delimiter;

    public function mount()
    {
        $this->data = FoodDataSources::find(request()->id);
        $this->name = $this->data->name;
        $this->description = $this->data->description;
        $this->url = $this->data->url;
        $this->file_type = $this->data->file_type;
        $this->row_delimiter = $this->data->row_delimiter;
        $this->column_delimiter = $this->data->column_delimiter;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'url' => 'required',
            'file_type' => 'required',
            'row_delimiter' => 'required',
            'column_delimiter' => 'required',
        ]);

        $this->data->update([
            'name' => $this->name,
            'description' => $this->description,
            'url' => $this->url,
            'file_type' => $this->file_type,
            'row_delimiter' => $this->row_delimiter,
            'column_delimiter' => $this->column_delimiter,
        ]);

        request()->session()->flash('flash.banner', 'Data source updated successfully.');
        request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('data.import');
    }

    public function render()
    {
        return view('livewire.data.edit')->layout('layouts.app')->title(__('Edit Data'));
    }
}
