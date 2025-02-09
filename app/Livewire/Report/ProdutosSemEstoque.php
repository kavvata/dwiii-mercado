<?php

namespace App\Livewire\Report;

use App\Models\Produto;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ProdutosSemEstoque extends Component
{
    public $produtos;

    public function mount()
    {
        $produtos = Produto::query()
            ->join('vendas', 'vendas.produto_id', '=', 'produtos.id')
            ->where('produtos.quantidade', '=', '0')
            ->whereRaw('vendas.updated_at = (SELECT MAX(v2.updated_at) FROM vendas v2 WHERE v2.produto_id = produtos.id)')
            ->selectRaw('produtos.*, vendas.updated_at as data_findou')
            ->orderByDesc('vendas.updated_at')
            ->get();

        foreach ($produtos as $produto) {
            // TODO: registrar um provider para exibir datas corretamente.
            $produto->data_findou = Carbon::parse($produto->data_findou)->timezone('America/Sao_Paulo')->format('d/m/Y');
        }

        $this->produtos = $produtos;
    }

    public function render()
    {
        return view('livewire.report.produtos-sem-estoque');
    }
}
