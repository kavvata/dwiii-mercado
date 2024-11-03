<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $produtos = Produto::orderByDesc("quantidade")->get();

        return view("produtos.index", compact("produtos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("produtos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "nome" => "required|unique:produtos|max:255",
            "descricao" => "max:255",
            "medida" => "max:255",
            "quantidade" => "required",
            "preco" => "required",
        ]);

        /* TODO: formatar antes de enviar para a controller */
        $preco = $request->input("preco");
        $preco = preg_replace("/[^0-9,]/", "", $preco);
        $preco = (float) str_replace(",", ".", $preco);

        Produto::create([
            "nome" => $request->input("nome"),
            "descricao" => $request->input("descricao"),
            "medida" => $request->input("medida"),
            "quantidade" => $request->input("quantidade"),
            "preco" => $preco,
        ]);

        return to_route("produtos.index")->with("resposta", [
            "status" => "sucesso",
            "mensagem" => "Produto criado com sucesso!",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto): View
    {
        return view("produtos.edit", compact("produto"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto): View
    {
        return view("produtos.edit", compact("produto"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto): RedirectResponse
    {
        $request->validate([
            "nome" => "required|max:255",
            "descricao" => "max:255",
            "medida" => "max:255",
            "quantidade" => "required",
            "preco" => "required",
        ]);

        /* TODO: formatar antes de enviar para a controller */
        $preco = $request->input("preco");
        $preco = preg_replace("/[^0-9,]/", "", $preco);
        $preco = (float) str_replace(",", ".", $preco);

        $produto->update([
            "nome" => $request->input("nome"),
            "descricao" => $request->input("descricao"),
            "medida" => $request->input("medida"),
            "quantidade" => $request->input("quantidade"),
            "preco" => $preco,
        ]);

        return to_route("produtos.index")->with("resposta", [
            "status" => "sucesso",
            "mensagem" => "Produto criado com sucesso!",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto): RedirectResponse
    {
        $produto->delete();

        return to_route("produtos.index")->with("resposta", [
            "status" => "sucesso",
            "mensagem" => "Produto removido com sucesso!",
        ]);
    }
}
