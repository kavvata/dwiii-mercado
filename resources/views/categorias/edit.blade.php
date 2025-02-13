<x-app-layout>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @if ($categoria->id)
                Editar {{ $categoria->nome }}
            @else
                Nova Categoria
            @endif
        </h2>
    </x-slot>

    <section class="py-12 flex justify-center items-center">
            <div class="max-w-md">
                <livewire:categorias.edit-form :categoria="$categoria" key="{{ $categoria->id }}" />
            </div>
        </section>
</x-app-layout>
