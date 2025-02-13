<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Unidades de Medida') }}
        </h2>
    </x-slot>

    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->

    <livewire:unidade-medidas.table :medidas="$medidas" />
</x-app-layout>
