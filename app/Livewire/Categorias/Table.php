<?php

namespace App\Livewire\Categorias;

use App\Models\Categoria;
use Livewire\Component;

class Table extends Component
{
    public $categoriaSelecionada;

    public $categorias;

    public function mount()
    {
        $this->categoriaSelecionada = new Categoria();
    }

    public function render()
    {
        return view("livewire.categorias.table");
    }
    public function criarCategoria()
    {
        $this->categoriaSelecionada = new Categoria();
        $this->dispatch("open-modal", "editar-categoria");
    }

    public function editarCategoria($categoriaId)
    {
        $this->categoriaSelecionada = Categoria::findOrFail($categoriaId);
        $this->dispatch("open-modal", "editar-categoria");
    }
}
