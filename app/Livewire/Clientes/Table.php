<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use App\Models\Endereco;
use Livewire\Component;

class Table extends Component
{
    public $clienteSelecionado;

    public $clientes;

    public function mount()
    {
        $this->clienteSelecionado = new Cliente;
        $this->clienteSelecionado->endereco = new Endereco;
    }

    public function render()
    {
        return view('livewire.clientes.table');
    }

    public function criarCliente()
    {
        $this->clienteSelecionado = new Cliente;
        $this->clienteSelecionado->endereco = new Endereco;
        $this->dispatch('open-modal', 'editar-cliente');
    }

    public function editarCliente($clienteId)
    {
        $this->clienteSelecionado = Cliente::findOrFail($clienteId);
        $this->dispatch('open-modal', 'editar-cliente');
    }
}
