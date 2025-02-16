<?php

namespace App\Livewire\Produtos;

use App\Models\Categoria;
use App\Models\Produto;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $filtroTexto = '';

    public $produtoSelecionado;

    public $idCategoriaSelecionada = '';

    public $categorias;

    private function fetchProdutos()
    {
        $query = Produto::query()->with('categoria')->orderByDesc('preco');

        if (!empty($this->filtroTexto)) {
            $query->where('nome', 'like', '%' . $this->filtroTexto . '%');
            $query->orWhereRelation('categoria', 'nome', 'like', '%' . $this->filtroTexto . '%');
        }

        if (!empty($this->idCategoriaSelecionada)) {
            $query->where('categoria_id', '=', $this->idCategoriaSelecionada);
        }

        return $query->paginate(15);
    }

    public function mount($categorias)
    {
        if (!isset($categorias)) {
            $this->categorias = Categoria::all();
        }
        $this->produtoSelecionado = Produto::first();
    }

    public function render()
    {
        return view('livewire.produtos.table', [
            'produtos' => $this->fetchProdutos(),
        ]);
    }

    public function criarProduto()
    {
        $this->produtoSelecionado = new Produto;

        $this->dispatch('open-modal', 'editar-produto');
    }

    public function editarProduto($produtoId)
    {
        $this->produtoSelecionado = Produto::findOrFail($produtoId);
        $this->dispatch('open-modal', 'editar-produto');
    }

    #[On('atualizar-produtos')]
    public function atualizarProdutos()
    {
        $this->resetPage();
    }
}
