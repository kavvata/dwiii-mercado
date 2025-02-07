<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

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

    protected function getProdutosSemEstoque(): Collection
    {
        $produtos = Produto::query()
            ->join('vendas', 'vendas.produto_id', '=', 'produtos.id')
            ->where('produtos.quantidade', '=', '0')
            ->selectRaw('produtos.*, vendas.updated_at as data_findou')
            ->orderByDesc('vendas.updated_at')
            ->get();

        foreach ($produtos as $produto) {
            // TODO: registrar um provider para exibir datas corretamente.
            $produto->data_findou = Carbon::parse($produto->data_findou)->timezone('America/Sao_Paulo')->format('d/m/Y');
        }

        return $produtos;
    }

    protected function getProdutosComEstoque()
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

    protected function getRetiradasPorPeriodo(): Collection
    {
        /** @var Collection<Venda> $vendas */
        $vendas = Venda::orderByDesc('data_venda')->get();

        $periodos = $vendas->groupBy(function ($venda) {
            return $venda->data_venda->timezone('America/Sao_Paulo')->format('d/m/Y');
        });

        return $periodos;
    }

    protected function getRetiradasPorCliente(): Collection
    {
        $clientes = Cliente::whereHas('vendas')->get();

        foreach ($clientes as $cliente) {
            $cliente->vendas = $cliente->vendas->sortByDesc('data_venda');
        }

        return $clientes;
    }

    /* --- */

    public function produtosPorLucro(): View
    {
        $produtos = $this->getProdutosPorLucro();

        return view('relatorios.produtosPorLucro', compact('produtos'));
    }

    public function retiradasPorPeriodo(): View
    {
        $periodos = $this->getRetiradasPorPeriodo();

        return view('relatorios.retiradasPorPeriodo', compact('periodos'));
    }

    public function retiradasPorCliente(): View
    {
        $clientes = $this->getRetiradasPorCliente();

        return view('relatorios.retiradasPorCliente', compact('clientes'));
    }

    public function produtosSemEstoque(): View
    {
        $produtos = $this->getProdutosSemEstoque();

        return view('relatorios.produtosSemEstoque', compact('produtos'));
    }

    public function produtosComEstoque(): View
    {
        return view('relatorios.produtosComEstoque', ['produtos' => $this->getProdutosComEstoque()]);
    }

    public function produtosPorLucroPdf(): Response
    {
        $produtos = $this->getProdutosPorLucro();

        $total = 0;
        foreach ($produtos as $produto) {
            $total += $produto->lucro_total;
        }

        $pdf = Pdf::loadView('relatorios.pdf.produtosPorLucro', compact('produtos', 'total'));

        return $pdf->stream();
    }

    public function retiradasPorPeriodoPdf(): Response
    {
        $periodos = $this->getRetiradasPorPeriodo();

        $pdf = Pdf::loadView('relatorios.pdf.retiradasPorPeriodo', compact('periodos'));

        return $pdf->stream('retiradas_por_periodo_' . now(tz: 'America/Sao_Paulo')->format('y-m-d_H:i:s') . '.pdf');
    }

    public function retiradasPorClientePdf(): Response
    {
        $clientes = $this->getRetiradasPorCliente();

        $pdf = Pdf::loadView('relatorios.pdf.retiradasPorCliente', compact('clientes'));

        return $pdf->stream('retiradas_por_cliente_' . now(tz: 'America/Sao_Paulo')->format('y-m-d_H:i:s') . '.pdf');
    }

    public function produtosSemEstoquePdf(): Response
    {
        $produtos = $this->getProdutosSemEstoque();
        $pdf = Pdf::loadView('relatorios.pdf.produtosSemEstoque', compact('produtos'));

        return $pdf->stream('produtos_sem_estoque_' . now(tz: 'America/Sao_Paulo')->format('y-m-d_H:i:s') . '.pdf');
    }

    public function produtosComEstoquePdf(): Response
    {
        $produtos = $this->getProdutosComEstoque();

        $pdf = Pdf::loadView('relatorios.pdf.produtosComEstoque', compact('produtos'));

        return $pdf->stream('produtos_com_estoque_' . now(tz: 'America/Sao_Paulo')->format('y-m-d_H:i:s') . '.pdf');
    }
}
