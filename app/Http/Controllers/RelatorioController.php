<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Support\Collection;

class RelatorioController extends Controller
{
    /**
     * Retorna id, nome, quantidade e lucro total de produtos vendidos
     *
     * @return Collection<int,array>
     */
    protected function getProdutosPorLucro(): Collection
    {
        return Venda::query()
            ->join('produtos', 'vendas.produto_id', '=', 'produtos.id')
            ->orderByRaw('SUM(vendas.preco * vendas.quantidade) DESC')
            ->selectRaw('produtos.id as id, produtos.nome as nome, SUM(vendas.quantidade) as quantidade, SUM(vendas.preco * vendas.quantidade) as lucro_total')
            ->groupBy('produtos.id')
            ->get();
    }

    public function produtosPorLucro()
    {
        $produtos = $this->getProdutosPorLucro();

        return view('relatorios.produtosPorLucro', compact('produtos'));
    }

    public function produtosPorLucroPdf()
    {
        $produtos = $this->getProdutosPorLucro();

        dd($produtos);
    }
}
