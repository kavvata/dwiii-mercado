<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Auth;

class VendaController extends Controller
{
    // TODO: rota para filtro por dataInicio dataFim

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vendas = Venda::orderByDesc('data_venda')->get();
        $produtos = Produto::orderBy('nome')->get();
        $clientes = Cliente::orderBy('nome')->get();

        return view('vendas.index', compact('vendas', 'produtos', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'quantidade' => 'required',
            'produto_id' => 'required',
            'cliente_id' => 'required',
        ]);

        $produto = Produto::findOrFail($request->produto_id);
        $cliente = Cliente::findOrFail($request->cliente_id);

        if ($produto->quantidade < $request->quantidade) {
            return back()->withErrors('Estoque de ' . $produto->nome . ' menor que a quantidade solicitada.');
        }

        $venda = new Venda;
        $venda->quantidade = $request->quantidade;
        $venda->preco = $produto->preco;

        $venda->produto()->associate($produto);
        $venda->cliente()->associate($cliente);
        $venda->user()->associate(Auth::user());
        $venda->data_venda = Carbon::now();

        $venda->save();

        $produto->quantidade = $produto->quantidade - $venda->quantidade;
        $produto->save();

        return back()->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Venda realizada com sucesso!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Venda $venda): View
    {
        return view('vendas.show', compact('venda'));
    }

    public function ticket(Venda $venda): Response
    {
        $pdf = Pdf::loadView('vendas.pdf.ticket', compact('venda'));

        $pdf->setPaper('A7', 'portrait');

        return $pdf->stream($venda->data_venda . '_' . $venda->cliente->nome . '_' . $venda->produto->nome . '.pdf');
        // return $pdf->download($venda->data_venda . '_' . $venda->cliente->nome . '_' . $venda->produto->nome . '.pdf');
    }

    public function relatorioPorLucro()
    {
        $produtos = Venda::query()
            ->join('produtos', 'vendas.produto_id', '=', 'produtos.id')
            ->orderByRaw('SUM(vendas.preco * vendas.quantidade) DESC')
            ->selectRaw('produtos.nome as produto, SUM(vendas.preco * vendas.quantidade) as lucro_total')
            ->groupBy('produtos.id')
            ->get();

        dd($produtos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venda $venda): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venda $venda): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venda $venda): void
    {
        //
    }
}
