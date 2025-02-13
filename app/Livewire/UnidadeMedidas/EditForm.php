<?php

namespace App\Livewire\UnidadeMedidas;

use App\Models\UnidadeMedida;
use Livewire\Component;

class EditForm extends Component
{
    public $medida;

    public function mount($medida = new UnidadeMedida)
    {
        $this->medida = $medida;
    }

    public function render()
    {
        return view('livewire.unidade-medidas.edit-form');
    }
}
