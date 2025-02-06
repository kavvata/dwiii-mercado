<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Traits\Date;
use Illuminate\Contracts\View\View;
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

    protected function getProdutosSemEstoque()
    {
        return Produto::query()->where('quantidade', '=', '0')->orderBy('nome')->get();
    }

    protected function getProdutosComEstoque(): Collection
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

        return $produtos->sortByDesc('percentAtual')->values();
    }

    protected function getRetiradasPorPeriodo(Date $inicio, Date $fim)
    {
        // TODO: como receber datas?
    }

    protected function getRetiradasPorCliente(Cliente $cliente): Collection {}

    /* --- */

    public function produtosPorLucro(): View
    {
        $produtos = $this->getProdutosPorLucro();

        return view('relatorios.produtosPorLucro', compact('produtos'));
    }

    public function produtosPorLucroPdf()
    {
        $produtos = $this->getProdutosPorLucro();

        $total = 0;
        foreach ($produtos as $produto) {
            $total += $produto->lucro_total;
        }

        $pdf = Pdf::loadView('relatorios.pdf.produtosPorLucro', compact('produtos', 'total'));

        return $pdf->stream();
    }

    public function retiradasPorPeriodo() {}

    public function retiradasPorPeriodoPdf() {}

    public function retiradasPorCliente() {}

    public function retiradasPorClientePdf() {}

    public function produtosSemEstoque()
    {
        return $this->getProdutosSemEstoque();
    }

    public function produtosSemEstoquePdf() {}

    public function produtosComEstoque()
    {
        $produtos = $this->getProdutosComEstoque();

        $pdf = Pdf::loadView('relatorios.pdf.produtosComEstoque', compact('produtos'));

        return $pdf->stream();
    }

    public function produtosComEstoquePdf() {}
}
