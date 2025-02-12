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
        $this->produtoSelecionado = $this->produtos->get(0);
    }

    public function render()
    {
        return view('livewire.produtos.table');
    }

    public function editarProduto($produtoId)
    {
        $this->produtoSelecionado = Produto::findOrFail($produtoId);
        $this->dispatch('open-modal', 'editar-produto');
    }
}
