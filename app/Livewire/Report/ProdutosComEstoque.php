<?php

namespace App\Livewire\Report;

use App\Models\Produto;
use Livewire\Component;

class ProdutosComEstoque extends Component
{
    public $produtos;

    public function mount()
    {
        $produtos = Produto::query()->where('quantidade', '!=', '0')->get();

        foreach ($produtos as $produto) {
            $quantidadeTotal = $produto->vendas->sum('quantidade');
            $quantidadeTotal += $produto->quantidade;
            $percentAtual = number_format(($produto->quantidade / $quantidadeTotal) * 100, 0);

            // NOTE: incrivel/assustador:
            // eu posso simplesmente adicionar um atributo
            // que nunca existiu na classe original
            $produto->percentAtual = $percentAtual;
        }

        $this->produtos = $produtos->sortByDesc('percentAtual')->values();
    }

    public function render()
    {
        return view('livewire.report.produtos-com-estoque');
    }
}
