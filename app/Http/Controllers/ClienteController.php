<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $clientes = Cliente::orderBy('nome')->get();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cliente = new Cliente;

        $cliente->endereco = new Endereco;

        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cliente $cliente): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|max:255',
            'cpf' => 'required|max:15|unique:clientes',
            'email' => 'required|max:255|unique:clientes',
            'telefone' => 'required|max:50',
            'cep' => 'required|min:9',
            'uf' => 'required|max:2',
            'cidade' => 'required|max:255',
            'bairro' => 'required|max:255',
            'rua' => 'required|max:255',
            'numero' => 'required|max:20',
        ]);

        $cpf = $request->cpf;

        if (strlen($cpf) == 14) {
            $cpf = preg_replace('/[^0-9,]/', '', $cpf);
        }

        $cliente->nome = $request->nome;
        $cliente->cpf = $cpf;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;

        $cep = preg_replace('/[^0-9,]/', '', $request->cep);
        $endereco = Endereco::query()->firstOrCreate([
            'cep' => $cep,
            'uf' => $request->uf,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero' => $request->numero,
        ]);

        $cliente->endereco()->associate($endereco);
        $cliente->save();

        return to_route('clientes.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Cliente criado com sucesso!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente): View
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente): View
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|max:255',
            'cpf' => 'required|max:15',
            'email' => 'required|max:255',
            'telefone' => 'required|max:50',
        ]);

        $cpf = $request->cpf;
        $cpf = preg_replace('/[^0-9,]/', '', $cpf);

        if (strlen($cpf) != 11) {
            return back()->withErrors('CPF inválido.');
        }

        $cliente->nome = $request->nome;
        $cliente->cpf = $cpf;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;

        $cep = preg_replace('/[^0-9,]/', '', $request->cep);
        $endereco = Endereco::query()->firstOrCreate([
            'cep' => $cep,
            'uf' => $request->uf,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero' => $request->numero,
        ]);

        $cliente->endereco()->associate($endereco);
        $cliente->save();

        return to_route('clientes.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Cliente criado com sucesso!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente): RedirectResponse
    {
        $cliente->delete();

        return to_route('clientes.index')->with('resposta', [
            'status' => 'sucesso',
            'mensagem' => 'Cliente removido com sucesso!',
        ]);
    }
}
