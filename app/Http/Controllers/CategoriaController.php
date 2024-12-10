<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categoria = new Categoria;

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Categoria $categoria): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|unique:categorias|max:255',
            'descricao' => 'required|max:255',
        ]);

        $categoria->nome = $request->nome;
        $categoria->descricao = $request->descricao;

        $categoria->save();

        return to_route('categorias.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Categoria criada com sucesso!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria): View
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria): View
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'required|max:255',
        ]);

        $categoria->nome = $request->nome;
        $categoria->descricao = $request->descricao;

        $categoria->save();

        return to_route('categorias.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Categoria atualizada com sucesso!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria): RedirectResponse
    {
        $countProdutos = $categoria->produtos()->count();
        if ($countProdutos > 0) {
            return back()->withErrors('Erro ao remover. Categoria contém ' . $countProdutos . ' produtos vinculados.');
        }

        $categoria->delete();

        return to_route('categorias.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Categoria removida com sucesso!',
        ]);
    }
}
