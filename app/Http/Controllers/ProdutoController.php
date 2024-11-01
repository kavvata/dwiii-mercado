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
        $produtos = Produto::orderByDesc('quantidade')->get();

        return view('produtos.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:produtos|max:255',
            'descricao' => 'max:255',
            'medida' => 'max:255',
            'quantidade' => 'required',
            'preco' => 'required',
        ]);

        /* TODO: formatar antes de enviar para a controller */
        $preco = $request->input('preco');
        $preco = str_replace(search: '.', replace: '', subject: $preco);
        $preco = str_replace(search: ',', replace: '.', subject: $preco);
        $preco = (float) str_replace(search: 'R$ ', replace: '', subject: $preco);

        Produto::create([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'medida' => $request->input('medida'),
            'quantidade' => $request->input('quantidade'),
            'preco' => $preco,
        ]);

        return to_route('produtos.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Produto criado com sucesso!',
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

        return to_route('produtos.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Produto removido com sucesso!',
        ]);
    }
}
