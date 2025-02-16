<?php

namespace App\Livewire\Produtos;

use App\Livewire\Forms\ProdutoForm;
use App\Models\Categoria;
use App\Models\UnidadeMedida;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduto extends Component
{
    use WithFileUploads;

    public ProdutoForm $form;

    public $componenteModal;

    public $imagemUrl;

    public function mount($produto)
    {
        $this->componenteModal = 'categorias.edit-categoria';

        if ($produto->id) {
            $this->form->setProduto($produto);
            $this->imagemUrl = $produto->imagem();
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

    public function save()
    {
        $this->form->save();
        $this->dispatch('close');
        $this->dispatch('atualizar-produtos');
    }

    public function destroy()
    {
        foreach ($this->form->produto->vendas() as $v) {
            $v->delete();
        }

        $this->form->produto->delete();

        $this->dispatch('close');
        $this->dispatch('atualizar-produtos');
    }
}
