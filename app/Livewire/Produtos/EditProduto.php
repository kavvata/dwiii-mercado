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

    public function save()
    {
        $this->form->save();
        $this->dispatch('close');
    }

    public function formatarPreco()
    {
        $precoFormatado = preg_replace('/\D/', '', $this->form->preco);
        if (empty($precoFormatado)) {
            $precoFormatado = 0;
        }

        $precoFormatado = (float) $precoFormatado / 100;
        $this->form->preco = 'R$ ' . number_format($precoFormatado, 2, ',', '.');
    }
}
