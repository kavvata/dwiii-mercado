<?php

namespace App\Livewire\Produtos;

use App\Livewire\Forms\ProdutoForm;
use App\Models\Categoria;
use App\Models\UnidadeMedida;
use Livewire\Component;

class EditProduto extends Component
{
    public ProdutoForm $form;

    public $componenteModal;

    public function mount($produto)
    {
        $this->componenteModal = 'categorias.edit-categoria';

        if ($produto->id) {
            $this->form->setProduto($produto);
        }
    }

    public function render()
    {
        $categorias = Categoria::all();
        $unidadeMedidas = UnidadeMedida::all();

        $this->form->categoria_id = $categorias->get(0)->id;
        $this->form->unidade_medida_id = $unidadeMedidas->get(0)->id;

        return view('livewire.produtos.edit-produto', ['categorias' => $categorias, 'unidadeMedidas' => $unidadeMedidas]);
    }

    public function criarCategoria()
    {
        $this->componenteModal = 'categorias.edit-categoria';
        $this->dispatch('open-modal', 'criar-outro');
    }

    public function criarUnidadeMedida()
    {
        $this->componenteModal = 'unidade-medidas.edit-unidade-medida';
        $this->dispatch('open-modal', 'criar-outro');
    }

    public function diminuirQuantidade()
    {
        if ($this->form->quantidade <= 1) {
            $this->form->quantidade = 1;

            return;
        }

        $this->form->quantidade -= 1;
    }

    public function aumentarQuantidade()
    {
        $this->form->quantidade += 1;
    }

    public function validarQuantidade()
    {
        if ($this->form->quantidade <= 1) {
            $this->form->quantidade = 1;
        }
    }

    public function save()
    {
        $this->form->save();
        $this->dispatch('close-modal');
    }
}
