<div class="w-full rounded-xl border border-gray-200 bg-white p-4 shadow-md dark:border-gray-700 dark:bg-gray-800">
    {{-- The whole world belongs to you. --}}
    <form method="POST" enctype="multipart/form-data"
        action="{{ $cliente->id ? route('clientes.update', $cliente) : route('clientes.store', $cliente) }}"
        class="flex-row gap-6 overflow-hidden rounded-lg bg-white p-6 text-gray-800 shadow-sm dark:bg-gray-800 dark:text-gray-200">

        @csrf
        @if ($cliente->id)
            @method('PUT')
        @else
            @method('POST')
        @endif
        <div class="flex flex-row gap-6">
            <div class="flex-col">
                <div class="relative">
                    <div class="relative flex items-center">
                        <input name="nome" type="text" placeholder="Digite o nome do cliente..."
                            value="{{ $cliente->nome }}"
                            class="w-full border-0 border-b border-gray-400 bg-transparent py-1 text-center text-gray-900 placeholder-gray-300 outline-none focus:border-gray-400 focus:ring-0 dark:text-white dark:focus:border-gray-400">
                    </div>
                </div>

                <div class="mt-6 space-y-3">
                    <div class="relative">
                        <input id="cpf" name="cpf" type="text" placeholder="Digite o CPF do cliente..."
                            value="{{ $cliente->cpf }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
                    </div>
                    <div class="relative">
                        <input id="telefone" name="telefone" type="text"
                            placeholder="Digite o telefone do cliente..." value="{{ $cliente->telefone }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
                    </div>
                    <div class="relative">
                        <input name="email" type="text" placeholder="Digite o email do cliente..."
                            value="{{ $cliente->email }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-3">
                <div class="flex gap-2">
                    <input id="cep" name="cep" type="text" placeholder="Digite o CEP do cliente..."
                        value="{{ $cliente->endereco->cep }}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">

                    <x-primary-button class="w-1/3 justify-center items-center" id="buscarCep">
                        Buscar
                    </x-primary-button>
                </div>
                <div class="relative">
                    <input id="uf" name="uf" type="text" placeholder="Digite o uf do cliente..."
                        value="{{ $cliente->endereco->uf }}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
                </div>
                <div class="relative">
                    <input id="cidade" name="cidade" type="text" placeholder="Digite o cidade do cliente..."
                        value="{{ $cliente->endereco->cidade }}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
                </div>
                <div class="relative">
                    <input id="bairro" name="bairro" type="text" placeholder="Digite o bairro do cliente..."
                        value="{{ $cliente->endereco->bairro }}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
                </div>
                <div class="flex gap-2">
                    <input id="rua" name="rua" type="text" placeholder="Digite o rua do cliente..."
                        value="{{ $cliente->endereco->rua }}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">

                    <input id="numero" name="numero" type="text" placeholder="Numero..."
                        value="{{ $cliente->endereco->numero }}"
                        class="w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">

                </div>
            </div>

        </div>
        <div class="flex w-full justify-between gap-2 pt-12">
            @if ($cliente->id)
                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirmar-remocao-cliente')">
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

    @if ($cliente->id)
        <x-modal name="confirmar-remocao-cliente" focusable>
            <form method="POST" action="{{ route('clientes.destroy', $cliente) }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Tem certeza que quer remover esse cliente?') }}
                </h2>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Remover cliente') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    @endif


    @assets
        <script src="{{ asset('js/clientes/create.js') }}"></script>
    @endassets
    @script
        <script>
            $wire.dispatch('edit-form-loaded');
        </script>
    @endscript
</div>
