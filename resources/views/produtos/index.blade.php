<x-app-layout x-data="{ produto: @json($produtos[0]) }">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @if (Request::route()->getName() == 'produtos.filtrar')
                Produtos em {{ $produtos[0]->categoria->nome }}
            @else
                {{ __('Produtos') }}
            @endif
        </h2>
    </x-slot>

    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    <livewire:produtos.table :produtos="$produtos" :categorias="$categorias" />
</x-app-layout>
