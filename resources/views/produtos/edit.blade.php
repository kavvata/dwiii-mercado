<x-app-layout>
    <!-- It is never too late to be what you might have been. - George Eliot -->

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @if ($produto->id)
                Editar {{ $produto->nome }}
            @else
                Novo Produto
            @endif
        </h2>
    </x-slot>

    <section class="py-12 flex justify-center items-center">
        <div class="max-w-md">
            <livewire:produtos.edit-form :produto="$produto" key="{{ $produto->id }}" />
        </div>
    </section>
</x-app-layout>
