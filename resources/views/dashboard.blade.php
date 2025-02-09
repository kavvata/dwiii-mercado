<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="sm:p-4 flex gap-4 flex-wrap text-gray-900 dark:text-gray-100">
                    <livewire:report.retiradas-agrupadas-por-cliente />
                    <livewire:report.produtos-com-estoque />
                    <livewire:report.retiradas-agrupadas-por-periodo />
                    <livewire:report.produtos-sem-estoque />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
