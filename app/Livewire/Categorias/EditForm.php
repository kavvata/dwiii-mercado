<?php

namespace App\Livewire\Categorias;

use App\Models\Categoria;
use Livewire\Component;

class EditForm extends Component
{
    public $categoria;

    public function mount($categoria = new Categoria)
    {
        $this->categoria = $categoria;
    }

    public function render()
    {
        return view('livewire.categorias.edit-form');
    }
}
