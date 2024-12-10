<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
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
        $produtos = Produto::with('categoria')->orderByDesc('quantidade')->get()->sortBy(function (Produto $produto) {
            return $produto->categoria->nome;
        });

        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categorias = Categoria::all();

        $produto = new Produto;

        return view('produtos.edit', compact('produto', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Produto $produto): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|unique:produtos|max:255',
            'descricao' => 'required|max:255',
            'medida' => 'max:255',
            'quantidade' => 'required',
            'preco' => 'required',
            'categoria_id' => 'required',
        ]);

        /* TODO: formatar antes de enviar para a controller */
        $preco = $request->preco;
        $preco = preg_replace('/[^0-9,]/', '', $preco);
        $preco = (float) str_replace(',', '.', $preco);

        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->medida = $request->medida;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $preco;

        $categoria = Categoria::findOrFail($request->categoria_id);
        $produto->categoria()->associate($categoria);

        $produto->save();

        return to_route('produtos.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Produto criado com sucesso!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto): View
    {
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto): View
    {
        $categorias = Categoria::all();

        return view('produtos.edit', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'required|max:255',
            'medida' => 'max:255',
            'quantidade' => 'required',
            'preco' => 'required',
            'categoria_id' => 'required',
        ]);

        /* TODO: formatar antes de enviar para a controller */
        $preco = $request->preco;
        $preco = preg_replace('/[^0-9,]/', '', $preco);
        $preco = (float) str_replace(',', '.', $preco);

        $produto->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'medida' => $request->medida,
            'quantidade' => $request->quantidade,
            'preco' => $preco,
        ]);

        $novaCategoria = Categoria::findOrFail($request->categoria_id);
        $produto->categoria()->associate($novaCategoria);
        $produto->save();

        return to_route('produtos.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Produto criado com sucesso!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto): RedirectResponse
    {
        $produto->delete();

        return to_route('produtos.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Produto removido com sucesso!',
        ]);
    }
}
