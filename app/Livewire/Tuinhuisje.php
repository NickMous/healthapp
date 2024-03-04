<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('tuinhuisje')]
class Tuinhuisje extends Component
{
    public function render()
    {
        return view('livewire.tuinhuisje')->layout('layouts.guest');
    }
}
