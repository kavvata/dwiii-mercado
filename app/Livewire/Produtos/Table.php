<?php

namespace App\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Component;

class Table extends Component
{
    public $produtoSelecionado;

    public $produtos;

    public $categorias;

    public function mount()
    {
        $this->produtoSelecionado = new Produto;
    }

    public function render()
    {
        return view('livewire.produtos.table');
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
}
