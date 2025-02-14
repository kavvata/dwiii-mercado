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
        } else {
            $this->form->categoria_id = Categoria::all()->first()->id;
            $this->form->unidade_medida_id = UnidadeMedida::all()->first()->id;
        }
    }

    public function render()
    {
        $categorias = Categoria::all();
        $unidadeMedidas = UnidadeMedida::all();

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

    public function selecionarCategoria()
    {
        $this->form->categoria_id = $this->categoria_id;
    }

    public function save()
    {
        $this->form->save();
        $this->dispatch('close-modal');
    }
}
