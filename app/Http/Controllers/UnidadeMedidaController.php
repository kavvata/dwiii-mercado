<?php

namespace App\Http\Controllers;

use App\Models\UnidadeMedida;
use Illuminate\Http\Request;

class UnidadeMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medidas = UnidadeMedida::all();

        return view('unidade_medidas.index', compact('medidas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medida = new UnidadeMedida;

        return view('unidade_medidas.edit', compact('medida'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, UnidadeMedida $medida)
    {
        $request->validate([
            'sigla' => 'required|unique:unidade_medidas|max:16',
            'descricao' => 'required|unique:unidade_medidas|max:255',
        ]);

        $medida->sigla = $request->sigla;
        $medida->descricao = $request->descricao;

        $medida->save();

        return to_route('categorias.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Categoria criada com sucesso!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(UnidadeMedida $medida)
    {
        return view('unidade_medidas.edit', compact('medida'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnidadeMedida $unidadeMedida)
    {
        return view('unidade_medidas.edit')->with('medida', $unidadeMedida);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnidadeMedida $medida)
    {
        $request->validate([
            'sigla' => 'required|unique:unidade_medidas|max:16',
            'descricao' => 'required|unique:unidade_medidas|max:255',
        ]);

        $medida->sigla = $request->sigla;
        $medida->descricao = $request->descricao;

        $medida->save();

        return to_route('categorias.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Categoria criada com sucesso!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnidadeMedida $unidadeMedida)
    {
        $countProdutos = $unidadeMedida->produtos()->count();
        if ($countProdutos > 0) {
            return back()->withErrors('Erro ao remover. Unidade de Medida possui ' . $countProdutos . ' produtos vinculados.');
        }

        $unidadeMedida->delete();

        return to_route('unidade_medidas.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Unidade de medida removida com sucesso!',
        ]);
    }
}
