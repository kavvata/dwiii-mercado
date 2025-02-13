<?php

namespace App\Livewire\Produtos;

use App\Models\Categoria;
use App\Models\UnidadeMedida;
use Livewire\Component;

class EditForm extends Component
{
    public $produto;

    public $componenteModal;

    public function mount()
    {
        $this->componenteModal = 'categorias.edit-form';
    }

    public function render()
    {
        $categorias = Categoria::all();
        $unidadeMedidas = UnidadeMedida::all();

        return view('livewire.produtos.edit-form', ['produto' => $this->produto, 'categorias' => $categorias, 'unidadeMedidas' => $unidadeMedidas]);
    }

    public function criarCategoria()
    {
        $this->componenteModal = 'categorias.edit-form';
        $this->dispatch('open-modal', 'criar-outro');
    }

    public function criarUnidadeMedida()
    {
        $this->componenteModal = 'unidade-medidas.edit-form';
        $this->dispatch('open-modal', 'criar-outro');
    }
}
