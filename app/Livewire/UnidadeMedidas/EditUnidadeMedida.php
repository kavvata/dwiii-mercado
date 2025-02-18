<?php

namespace App\Livewire\UnidadeMedidas;

use App\Models\UnidadeMedida;
use Livewire\Component;

class EditUnidadeMedida extends Component
{
    public $medida;

    public function mount($medida = new UnidadeMedida)
    {
        $this->medida = $medida;
    }

    public function render()
    {
        return view('livewire.unidade-medidas.edit-unidade-medida');
    }
}
