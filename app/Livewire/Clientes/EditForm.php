<?php

namespace App\Livewire\Clientes;

use Livewire\Component;

class EditForm extends Component
{
    public $cliente;

    public function render()
    {
        return view('livewire.clientes.edit-form');
    }
}
