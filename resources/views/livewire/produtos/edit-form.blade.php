<div class="w-full rounded-xl border border-gray-200 bg-white p-4 shadow-md dark:border-gray-700 dark:bg-gray-800">
    <form method="POST" enctype="multipart/form-data"
        action="{{ $produto->id ? route('produtos.update', $produto) : route('produtos.store', $produto) }}"
        class="flex-col gap-6 overflow-hidden rounded-lg bg-white p-6 text-gray-800 shadow-sm dark:bg-gray-800 dark:text-gray-200">

        @csrf
        @if ($produto->id)
            @method('PUT')
        @else
            @method('POST')
        @endif
        <div class="relative">
            <div class="rounded-lg relative group">
                <label for="imageUpload" class="cursor-pointer relative block">
                    <img id="previewImage" src="{{ $produto->imagem() }}" alt="Product Image"
                        class="w-full h-96 rounded-lg object-cover transition-opacity duration-200 group-hover:opacity-80">

                    <div
                        class="rounded-lg absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <svg class="h-12 w-12 text-white" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.83617 2.61744L9.82025 1.63277C10.0254 1.42763 10.3036 1.31238 10.5938 1.31238C10.8839 1.31238 11.1621 1.42763 11.3673 1.63277C11.5724 1.83792 11.6876 2.11615 11.6876 2.40627C11.6876 2.69639 11.5724 2.97463 11.3673 3.17977L5.17283 9.37419C4.86444 9.6824 4.48413 9.90894 4.06625 10.0334L2.5 10.5L2.96667 8.93377C3.09108 8.51589 3.31762 8.13558 3.62583 7.82719L8.83617 2.61744ZM8.83617 2.61744L10.375 4.15627M9.5 8.16669V10.9375C9.5 11.2856 9.36172 11.6195 9.11558 11.8656C8.86944 12.1117 8.5356 12.25 8.1875 12.25H2.0625C1.7144 12.25 1.38056 12.1117 1.13442 11.8656C0.888281 11.6195 0.75 11.2856 0.75 10.9375V4.81252C0.75 4.46443 0.888281 4.13059 1.13442 3.88444C1.38056 3.6383 1.7144 3.50002 2.0625 3.50002H4.83333"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </label>

                <input type="file" id="imageUpload" name="imagem" accept="image/*" class="hidden">
            </div>

            <div class="absolute bottom-0 rounded-b-lg left-0 w-full p-3 bg-gradient-to-t from-gray-700 to-transparent">
                <div class="relative flex items-center">
                    <input name="nome" type="text" placeholder="Digite o nome do produto..."
                        value="{{ $produto->nome }}"
                        class="text-lg w-full border-0 border-b border-gray-400 bg-transparent py-1 text-center text-gray-900 outline-none placeholder-gray-300 focus:border-gray-400 focus:ring-0 dark:text-white dark:focus:border-gray-400">
                </div>
            </div>
        </div>
        <div class="mt-4 space-y-3">
            <div class="relative">
                <textarea name="descricao" placeholder="Descrição do produto..."
                    class=" w-full py-4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ $produto->descricao }}</textarea>
            </div>

            <div class="flex items-center gap-2">
                <div class="relative flex-1">
                    <select name="categoria_id"
                        class="w-full border-0 border-b border-gray-400 bg-transparent py-1 text-center text-gray-900 outline-none placeholder-gray-500 focus:border-gray-400 focus:ring-0 dark:text-white dark:focus:border-gray-400">
                        @foreach ($categorias as $categoria)
                            <option @if ($categoria == $produto->categoria) selected="selected" @endif
                                value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('categorias.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Novo
                </a>
            </div>

            <div class="relative">
                <input name="preco" id="preco" type="text" placeholder="Preço"
                    value="R$ {{ number_format($produto->preco, 2, ',') }}"
                    class="w-full border-0 border-b border-gray-400 bg-transparent py-1 text-center text-gray-900 outline-none placeholder-gray-500 focus:border-gray-400 focus:ring-0 dark:text-white dark:focus:border-gray-400">
            </div>

            <div class="flex gap-3">
                <div class="relative flex-1">
                    <input name="quantidade" type="text" placeholder="Quantidade" value="{{ $produto->quantidade }}"
                        class="w-full border-0 border-b border-gray-400 bg-transparent py-1 text-center text-gray-900 outline-none placeholder-gray-500 focus:border-gray-400 focus:ring-0 dark:text-white dark:focus:border-gray-400">
                </div>
                <div class="relative flex-1">
                    <select name="unidade_medida_id"
                        class="w-full border-0 border-b border-gray-400 bg-transparent py-1 text-center text-gray-900 outline-none placeholder-gray-500 focus:border-gray-400 focus:ring-0 dark:text-white dark:focus:border-gray-400">
                        @foreach ($unidadeMedidas as $unidadeMedida)
                            <option @if ($unidadeMedida == $produto->unidadeMedida) selected="selected" @endif
                                value="{{ $unidadeMedida->id }}">
                                {{ $unidadeMedida->sigla }}.
                            </option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('unidade_medidas.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Novo
                </a>
            </div>

        </div>

        <div class="w-full flex justify-between pt-12 gap-2">
            @if ($produto->id)
                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirmar-remocao-produto')">
                    {{ __('Remover') }}
                </x-danger-button>
            @endif
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancelar') }}
            </x-secondary-button>
            <x-primary-button>Salvar</x-primary-button>
        </div>
        <div class="w-full flex justify-center pt-2 gap-2">
        </div>
    </form>

    @if ($produto->id)
        <x-modal name="confirmar-remocao-produto" focusable>
            <form method="POST" action="{{ route('produtos.destroy', $produto) }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Tem certeza que quer remover esse produto?') }}
                </h2>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Remover produto') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    @endif


    @assets
        <script src="{{ asset('js/produtos/create.js') }}"></script>
    @endassets
    @script
        <script>
            $wire.dispatch('edit-form-loaded');
        </script>
    @endscript
</div>
