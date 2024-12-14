<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Auth;

class VendaController extends Controller
{
    // TODO: rota para filtro por dataInicio dataFim

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas = Venda::orderByDesc('data_venda')->get();
        $produtos = Produto::orderBy('nome')->get();
        $clientes = Cliente::orderBy('nome')->get();

        return view('vendas.index', compact('vendas', 'produtos', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
    public function show(Venda $venda)
    {
        return view('vendas.show', compact('venda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venda $venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venda $venda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venda $venda)
    {
        //
    }
}
