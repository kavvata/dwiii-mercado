<?php

namespace App\Livewire\Components;

use Illuminate\Support\Collection;
use Livewire\Component;

class Table extends Component
{
    public Collection $modelList;

    public array $campos;

    public function render()
    {
        return view('livewire.components.table');
    }
}
