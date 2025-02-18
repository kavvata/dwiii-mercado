<?php

namespace App\Livewire\UnidadeMedidas;

use App\Models\UnidadeMedida;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $filtroTexto = '';

    public $medidaSelecionada;

    private function fetchProdutos()
    {
        $query = UnidadeMedida::query();
        if (!empty($this->filtroTexto)) {
            $query->where('descricao', 'like', '%' . $this->filtroTexto . '%');
            $query->orWhere('sigla', 'like', '%' . $this->filtroTexto . '%');
        }

        return $query->orderBy('descricao')->paginate(15);
    }

    public function mount()
    {
        $this->medidaSelecionada = new UnidadeMedida;
    }

    public function render()
    {
        return view('livewire.unidade-medidas.table', ['medidas' => $this->fetchProdutos()]);
    }

    public function criarMedida()
    {
        $this->medidaSelecionada = new UnidadeMedida;
        $this->dispatch('open-modal', 'editar-medida');
    }

    public function editarMedida($medidaId)
    {
        $this->medidaSelecionada = UnidadeMedida::findOrFail($medidaId);
        $this->dispatch('open-modal', 'editar-medida');
    }

    #[On('atualizar-categorias')]
    public function atualizarCategorias()
    {
        $this->gotoPage($this->getPage());
    }

    public function filtrar()
    {
        $this->resetPage();
    }
}
