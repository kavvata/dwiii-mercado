<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\UnidadeMedida;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Storage;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $produtos = Produto::with('categoria')->orderByDesc('preco')->get()->sortByDesc(function (Produto $produto) {
            return $produto->preco * $produto->quantidade;
        });

        $categorias = Categoria::all();

        return view('produtos.index', compact('produtos', 'categorias'));
    }

    public function filtrar(Categoria $categoria): View
    {
        $produtos = Produto::with('categoria')
            ->where('categoria_id', $categoria->id)
            ->orderByDesc('preco')
            ->get()
            ->sortByDesc(function (Produto $produto) {
                return $produto->preco * $produto->quantidade;
            });

        $categorias = Categoria::all();

        return view('produtos.index', compact('produtos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categorias = Categoria::all();
        $unidadeMedidas = UnidadeMedida::all();

        $produto = new Produto;

        return view('produtos.edit', compact('produto', 'categorias', 'unidadeMedidas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Produto $produto): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|unique:produtos|max:255',
            'descricao' => 'required|max:255',
            'quantidade' => 'required',
            'preco' => 'required',
            'categoria_id' => 'required',
            'unidade_medida_id' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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

        $unidadeMedida = Categoria::findOrFail($request->unidade_medida_id);
        $produto->unidadeMedida()->associate($unidadeMedida);

        $imagem = $request->file('imagem');
        $imageName = time() . '.' . $imagem->extension();

        Storage::disk('produto-imagens')->putFileAs(
            '',
            $imagem,
            name: $imageName
        );

        $produto->imagem_src = 'storage/images' . $imageName;

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
        $categorias = Categoria::all();

        return view('produtos.edit', compact('produto', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto): View
    {
        $categorias = Categoria::all();
        $unidadeMedidas = UnidadeMedida::all();

        return view('produtos.edit', compact('produto', 'categorias', 'unidadeMedidas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'required|max:255',
            'quantidade' => 'required',
            'preco' => 'required',
            'categoria_id' => 'required',
            'unidade_medida_id' => 'required',
            'imagem' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagem = $request->file('imagem');
        if (isset($imagem)) {
            $imageName = time() . '.' . $imagem->extension();

            Storage::disk('produto-imagens')->putFileAs(
                '',
                $imagem,
                name: $imageName
            );
        }

        $preco = $request->preco;
        $preco = preg_replace('/[^0-9,]/', '', $preco);
        $preco = (float) str_replace(',', '.', $preco);

        $novosDados = [
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'medida' => $request->medida,
            'quantidade' => $request->quantidade,
            'preco' => $preco,
        ];

        if (isset($imagem)) {
            $novosDados['imagem_src'] = Storage::disk('produto-imagens')->url($imageName);
        }

        $produto->update($novosDados);

        if ($request->categoria_id != $produto->categoria->id) {
            $novaMedida = Categoria::findOrFail($request->categoria_id);
            $produto->categoria()->associate($novaMedida);
        }

        if ($request->unidade_medida_id != $produto->unidadeMedida->id) {
            $novaMedida = Categoria::findOrFail($request->unidade_medida_id);
            $produto->unidadeMedida()->associate($novaMedida);
        }

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
        foreach ($produto->vendas as $v) {
            $v->delete();
        }
        $produto->delete();

        return to_route('produtos.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Produto removido com sucesso!',
        ]);
    }
}
