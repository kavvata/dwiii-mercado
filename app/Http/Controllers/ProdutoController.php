<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::orderByDesc("quantidade")->get();

        return view("produtos.index", ["produtos" => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("produtos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nome" => "required|unique:produtos|max:255",
            "descricao" => "required|max:255",
            "medida" => "max:255",
            "preco" => "required",
        ]);

        Produto::create($request->all());

        return back()->with("resposta", [
            "status" => "sucesso",
            "mensagem" => "Produto criado com sucesso!",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return $produto;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return $produto;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return to_route("produtos.index")->with("resposta", [
            "status" => "sucesso",
            "mensagem" => "Produto removido com sucesso!",
        ]);
    }
}
