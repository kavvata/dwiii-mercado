<?php

namespace App\Livewire\Clientes;

use Livewire\Component;

class EditCliente extends Component
{
    public $cliente;

    public function render()
    {
        return view('livewire.clientes.edit-cliente');
    }
}
