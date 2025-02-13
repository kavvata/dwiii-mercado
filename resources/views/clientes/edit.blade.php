<x-app-layout>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @if ($cliente->id)
                Editar {{ $cliente->nome }}
            @else
                Novo Cliente
            @endif
        </h2>
    </x-slot>

    <section class="py-12 flex justify-center items-center">
        <div class="max-w-7xl">
            <livewire:clientes.edit-form :cliente="$cliente" key="{{ $cliente->id }}" />
        </div>
    </section>
</x-app-layout>
