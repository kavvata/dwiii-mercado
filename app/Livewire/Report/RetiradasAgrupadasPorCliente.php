<?php

namespace App\Livewire\Report;

use App\Models\Cliente;
use Livewire\Component;

class RetiradasAgrupadasPorCliente extends Component
{
    public $clientes;

    public function mount()
    {
        $clientes = Cliente::whereHas('vendas')->get();

        foreach ($clientes as $cliente) {
            $cliente->vendas = $cliente->vendas->sortByDesc('data_venda');
        }

        $this->clientes = $clientes;
    }

    public function render()
    {
        return view('livewire.report.retiradas-agrupadas-por-cliente');
    }
}
