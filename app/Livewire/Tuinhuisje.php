<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('tuinhuisje')]
class Tuinhuisje extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.tuinhuisje');
    }
}
