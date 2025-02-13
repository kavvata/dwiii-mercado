<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <!-- Be present above all else. - Naval Ravikant -->
    <livewire:clientes.table :clientes="$clientes" />
</x-app-layout>
