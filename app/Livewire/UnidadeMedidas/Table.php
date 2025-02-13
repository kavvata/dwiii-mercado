<?php

namespace App\Livewire\UnidadeMedidas;

use App\Models\UnidadeMedida;
use Livewire\Component;

class Table extends Component
{
    public $medidaSelecionada;

    public $medidas;

    public function mount()
    {
        $this->medidaSelecionada = new UnidadeMedida();
    }

    public function render()
    {
        return view("livewire.unidade-medidas.table");
    }

    public function criarMedida()
    {
        $this->medidaSelecionada = new UnidadeMedida();
        $this->dispatch("open-modal", "editar-medida");
    }

    public function editarMedida($medidaId)
    {
        $this->medidaSelecionada = UnidadeMedida::findOrFail($medidaId);
        $this->dispatch("open-modal", "editar-medida");
    }
}
