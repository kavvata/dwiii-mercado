<?php

namespace App\Livewire\UnidadeMedidas;

use App\Models\UnidadeMedida;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditUnidadeMedida extends Component
{
    public ?UnidadeMedida $medida;

    #[Validate('required|max:255')]
    public $descricao = '';

    #[Validate('required|max:20')]
    public $sigla = '';

    public function mount()
    {
        if ($this->medida) {
            $this->descricao = $this->medida->descricao;
            $this->sigla = $this->medida->sigla;
        }
    }

    public function render()
    {
        return view('livewire.unidade-medidas.edit-unidade-medida');
    }

    public function save()
    {
        $this->resetValidation();
        if ($this->medida) {
            $this->update();
        } else {
            $this->store();
        }
    }

    private function store()
    {
        $this->validate();

        $this->medida = new UnidadeMedida;
        $this->medida->sigla = $this->sigla;
        $this->medida->descricao = $this->descricao;

        $this->medida->save();
        $this->dispatch('close');
        $this->dispatch('atualizar-categorias');
    }

    private function update()
    {
        $this->validate();

        $this->medida->sigla = $this->sigla;
        $this->medida->descricao = $this->descricao;

        $this->medida->save();
        $this->dispatch('close');
        $this->dispatch('atualizar-categorias');
    }
}
