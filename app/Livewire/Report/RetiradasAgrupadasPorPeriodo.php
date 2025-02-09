<?php

namespace App\Livewire\Report;

use App\Models\Venda;
use Livewire\Component;

class RetiradasAgrupadasPorPeriodo extends Component
{
    public $periodos;

    public function mount()
    {
        /** @var Collection<Venda> $vendas */
        $vendas = Venda::orderByDesc('data_venda')->get();

        $periodos = $vendas->groupBy(function ($venda) {
            return $venda->data_venda->timezone('America/Sao_Paulo')->format('d/m/Y');
        })->all();

        $this->periodos = $periodos;
    }

    public function render()
    {
        return view('livewire.report.retiradas-agrupadas-por-periodo');
    }
}
