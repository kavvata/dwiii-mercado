<?php

namespace App\Livewire\Produtos;

use App\Models\Categoria;
use App\Models\UnidadeMedida;
use Livewire\Component;

class EditForm extends Component
{
    public $produto;

    public function render()
    {
        $categorias = Categoria::all();
        $unidadeMedidas = UnidadeMedida::all();

        return view('livewire.produtos.edit-form', ['produto' => $this->produto, 'categorias' => $categorias, 'unidadeMedidas' => $unidadeMedidas]);
    }
}
