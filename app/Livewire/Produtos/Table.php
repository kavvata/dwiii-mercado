<?php

namespace App\Livewire\Produtos;

use App\Models\Categoria;
use App\Models\Produto;
use Livewire\Attributes\On;
use Livewire\Component;

class Table extends Component
{
    public $filtroTexto = '';

    public $produtoSelecionado;

    public $idCategoriaSelecionada = '';

    public $produtos;

    public $categorias;

    public function mount($produtos, $categorias)
    {
        if (!isset($produtos)) {
            $this->atualizarProdutos();
        }

        if (!isset($categorias)) {
            $this->categorias = Categoria::all();
        }
        $this->produtoSelecionado = $this->produtos->get(0);
    }

    public function render()
    {
        return view('livewire.produtos.table');
    }

    public function criarProduto()
    {
        $this->produtoSelecionado = new Produto;

        if (!empty($this->idCategoriaSelecionada)) {
            $this->produtoSelecionado->categoria = $this->categorias->find($this->idCategoriaSelecionada);
        }

        $this->dispatch('open-modal', 'editar-produto');
    }

    public function editarProduto($produtoId)
    {
        $this->produtoSelecionado = $this->produtos->find($produtoId);
        $this->dispatch('open-modal', 'editar-produto');
    }

    #[On('atualizar-produtos')]
    public function atualizarProdutos()
    {
        $query = Produto::query()->with('categoria')->orderByDesc('preco');

        if (!empty($this->filtroTexto)) {
            $query->where('nome', 'like', '%' . $this->filtroTexto . '%');
            $query->orWhereRelation('categoria', 'nome', 'like', '%' . $this->filtroTexto . '%');
        }

        if (!empty($this->idCategoriaSelecionada)) {
            $query->where('categoria_id', '=', $this->idCategoriaSelecionada);
        }

        $this->produtos = $query->get()->sortByDesc(fn(Produto $produto) => $produto->preco * $produto->quantidade);
    }
}
