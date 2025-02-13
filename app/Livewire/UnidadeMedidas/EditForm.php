<?php

namespace App\Livewire\UnidadeMedidas;

use Livewire\Component;

class EditForm extends Component
{
    public $medida;

    public function render()
    {
        return view('livewire.unidade-medidas.edit-form');
    }
}
