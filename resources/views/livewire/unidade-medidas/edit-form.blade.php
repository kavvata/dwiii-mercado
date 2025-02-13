<div class="w-full rounded-xl border border-gray-200 bg-white p-4 shadow-md dark:border-gray-700 dark:bg-gray-800">
    {{-- Be like water. --}}
    <form method="POST" enctype="multipart/form-data"
        action="{{ $medida->id ? route('unidade_medidas.update', $medida) : route('unidade_medidas.store', $medida) }}"
        class="flex-col gap-6 overflow-hidden rounded-lg bg-white p-6 text-gray-800 shadow-sm dark:bg-gray-800 dark:text-gray-200">

        @csrf
        @if ($medida->id)
            @method('PUT')
        @else
            @method('POST')
        @endif
        <div class="relative">
            <div class="relative flex items-center">
                <input name="descricao" type="text" placeholder="Digite o nome da unidade de medida..."
                    value="{{ $medida->descricao }}"
                    class="w-full border-0 border-b border-gray-400 bg-transparent py-1 text-center text-gray-900 placeholder-gray-300 outline-none focus:border-gray-400 focus:ring-0 dark:text-white dark:focus:border-gray-400">
            </div>
        </div>
        <div class="mt-4 space-y-3">
            <div class="relative">
                <input name="sigla" type="text" placeholder="Digite a sigla da unidade de medida..."
                    value="{{ $medida->sigla }}"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
            </div>
        </div>

        <div class="flex w-full justify-between gap-2 pt-12">
            @if ($medida->id)
                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirmar-remocao-medida')">
                    {{ __('Remover') }}
                </x-danger-button>
            @endif
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancelar') }}
            </x-secondary-button>
            <x-primary-button>Salvar</x-primary-button>
        </div>
        <div class="flex w-full justify-center gap-2 pt-2">
        </div>
    </form>

    @if ($medida->id)
        <x-modal name="confirmar-remocao-medida" focusable>
            <form method="POST" action="{{ route('unidade_medidas.destroy', $medida) }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Tem certeza que quer remover esse medida?') }}
                </h2>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Remover medida') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    @endif


    @assets
        <script src="{{ asset('js/unidade_medidas/create.js') }}"></script>
    @endassets
    @script
        <script>
            $wire.dispatch('edit-form-loaded');
        </script>
    @endscript
</div>
