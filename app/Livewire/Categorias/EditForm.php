<?php

namespace App\Livewire\Categorias;

use Livewire\Component;

class EditForm extends Component
{
    public $categoria;

    public function render()
    {
        return view("livewire.categorias.edit-form");
    }
}
