<x-app-layout>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @if ($medida->id)
                Editar {{ $medida->descricao }}
            @else
                Nova Unidade de Medida
            @endif
        </h2>
    </x-slot>

    <section class="py-12 flex justify-center items-center">
        <div class="max-w-md">
            <livewire:unidade-medidas.edit-form :medida="$medida" key="{{ $medida->id }}" />
        </div>
    </section>
</x-app-layout>
