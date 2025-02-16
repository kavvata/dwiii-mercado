<?php

namespace App\Livewire\Forms;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\UnidadeMedida;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProdutoForm extends Form
{
    use WithFileUploads;

    public ?Produto $produto;

    #[Validate('required|max:255')]
    public $nome = '';

    #[Validate('required|max:255')]
    public $descricao = '';

    #[Validate('required')]
    public $quantidade = 1;

    #[Validate('required')]
    public $categoria_id;

    #[Validate('required')]
    public $unidade_medida_id;

    #[Validate('required')]
    public $preco = 'R$ 00,00';

    #[Validate('image|mimes:jpeg,png,jpg,gif|max:2048')]
    public $imagem;

    public function setProduto(Produto $produto)
    {
        $this->produto = $produto;

        $this->nome = $produto->nome;
        $this->descricao = $produto->descricao;
        $this->quantidade = $produto->quantidade;
        $this->categoria_id = $produto->categoria->id;
        $this->unidade_medida_id = $produto->unidadeMedida->id;
        $this->preco = 'R$ ' . number_format($produto->preco, 2, ',');
    }

    private function store()
    {
        $this->validate();

        $preco = $this->preco;
        $preco = preg_replace('/[^0-9,]/', '', $preco);
        $preco = (float) str_replace(',', '.', $preco);
        $this->preco = $preco;

        if ($this->preco <= 0) {
            $this->addError('form.preco', 'Preco invalido.');
        }

        if ($this->quantidade < 0) {
            $this->addError('form.quantidade', 'Quantidade invalida.');
        }

        if (!isset($this->produto)) {
            $this->produto = new Produto;
        }

        $this->produto->nome = $this->nome;
        $this->produto->descricao = $this->descricao;
        $this->produto->quantidade = $this->quantidade;
        $this->produto->preco = $this->preco;

        $categoria = Categoria::findOrFail($this->categoria_id);
        $this->produto->categoria()->associate($categoria);

        $unidadeMedida = UnidadeMedida::findOrFail($this->unidade_medida_id);
        $this->produto->unidadeMedida()->associate($unidadeMedida);

        $imageName = time() . '.' . $this->imagem->extension();

        $imagem_src = $this->imagem->storeAs('produto-imagens', $imageName, 'public');

        $this->produto->imagem_src = Storage::url($imagem_src);

        $this->produto->save();
    }

    private function update()
    {
        $this->validate([
            'nome' => 'required|max:255',
            'descricao' => 'required|max:255',
            'quantidade' => 'required',
            'preco' => 'required',
            'categoria_id' => 'required',
            'unidade_medida_id' => 'required',
        ]);

        $preco = $this->preco;
        $preco = preg_replace('/[^0-9,]/', '', $preco);
        $preco = (float) str_replace(',', '.', $preco);
        $this->preco = $preco;

        if ($this->preco < 0) {
            $this->addError('preco', 'Preco invalido.');
        }

        if ($this->quantidade < 0) {
            $this->addError('quantidade', 'Quantidade invalida.');
        }

        $this->produto->nome = $this->nome;
        $this->produto->descricao = $this->descricao;
        $this->produto->quantidade = $this->quantidade;
        $this->produto->preco = $this->preco;

        $categoria = Categoria::findOrFail($this->categoria_id);
        $this->produto->categoria()->associate($categoria);

        $unidadeMedida = UnidadeMedida::findOrFail($this->unidade_medida_id);
        $this->produto->unidadeMedida()->associate($unidadeMedida);

        if (isset($this->imagem)) {
            $imageName = time() . '.' . $this->imagem->extension();

            $imagem_src = $this->imagem->storeAs('', $imageName, 'produto-imagens');
            $this->produto->imagem_src = Storage::disk('produto-imagens')->url($imagem_src);
        }

        $this->produto->save();
    }

    public function save()
    {
        $this->resetValidation();
        if (!isset($this->produto)) {
            $this->store();
        } else {
            $this->update();
        }
    }
}
