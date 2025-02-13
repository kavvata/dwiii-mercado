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
            <div class="group relative rounded-lg">
                <label for="imageUpload" class="relative block cursor-pointer">
                    <img id="previewImage" src="{{ $produto->imagem() }}" alt="Imagem do produto"
                        class="h-96 w-full rounded-lg object-cover transition-opacity flex justify-center items-center duration-200 group-hover:opacity-80">

                    <div
                        class="absolute inset-0 flex items-center justify-center rounded-lg bg-black/50 opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                        <svg class="h-12 w-12 text-white" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor"
                                d="m464 64h-416c-26.51 0-48 21.49-48 48v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48v-288c0-26.51-21.49-48-48-48zm-6 336h-404a6 6 0 0 1 -6-6v-276a6 6 0 0 1 6-6h404a6 6 0 0 1 6 6v276a6 6 0 0 1 -6 6zm-330-248c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm-32 200h320v-80l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0l-119.514 119.515-39.515-39.515c-4.686-4.686-12.284-4.686-16.971 0l-39.514 39.515z" />
                        </svg>
                    </div>
                </label>

                <input type="file" id="imageUpload" name="imagem" accept="image/*" class="hidden">
            </div>

            <div
                class="group absolute bottom-0 left-0 w-full rounded-b-lg bg-gradient-to-t from-white dark:from-gray-800 to-transparent p-3">
                <div
                    class="relative flex items-center border-b border-gray-300 dark:border-gray-400 focus:border-gray-800 dark:focus:border-gray-400">
                    <input name="nome" type="text" placeholder="Digite o nome do produto..."
                        value="{{ $produto->nome }}"
                        class="w-full border-0  bg-transparent py-1 text-center text-gray-800 placeholder-gray-500 dark:placeholder-gray-300 outline-none  focus:ring-0 dark:text-white">
                    <div
                        class="absolute right-2 flex items-center justify-center rounded-lg bg-transparent opacity-0 transition-opacity duration-200 group-hover:opacity-100">
                        <svg class="h-6 w-6 text-gray-800 dark:text-white" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.83617 2.61744L9.82025 1.63277C10.0254 1.42763 10.3036 1.31238 10.5938 1.31238C10.8839 1.31238 11.1621 1.42763 11.3673 1.63277C11.5724 1.83792 11.6876 2.11615 11.6876 2.40627C11.6876 2.69639 11.5724 2.97463 11.3673 3.17977L5.17283 9.37419C4.86444 9.6824 4.48413 9.90894 4.06625 10.0334L2.5 10.5L2.96667 8.93377C3.09108 8.51589 3.31762 8.13558 3.62583 7.82719L8.83617 2.61744ZM8.83617 2.61744L10.375 4.15627M9.5 8.16669V10.9375C9.5 11.2856 9.36172 11.6195 9.11558 11.8656C8.86944 12.1117 8.5356 12.25 8.1875 12.25H2.0625C1.7144 12.25 1.38056 12.1117 1.13442 11.8656C0.888281 11.6195 0.75 11.2856 0.75 10.9375V4.81252C0.75 4.46443 0.888281 4.13059 1.13442 3.88444C1.38056 3.6383 1.7144 3.50002 2.0625 3.50002H4.83333"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 space-y-3">
            <div class="relative">
                <textarea name="descricao" placeholder="Descrição do produto..."
                    class="w-full rounded-md border-gray-300 py-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">{{ $produto->descricao }}</textarea>
            </div>

            <div class="flex gap-3">
                <select name="categoria_id"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
                    @foreach ($categorias as $categoria)
                        <option @if ($categoria == $produto->categoria) selected="selected" @endif
                            value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
                <button wire:click.prevent="criarCategoria"
                    class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:focus:ring-offset-gray-800 dark:active:bg-gray-300">
                    Novo
                </button>
            </div>

            <div class="flex gap-3">
                <div class="relative flex items-center">
                    <button type="button" id="decrement-button"
                        class="bg-gray-100 dark:bg-gray-900 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-md p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h16" />
                        </svg>
                    </button>
                    <input type="text" id="quantidade" name="quantidade"
                        class="bg-gray-50 border-x-0 border-gray-300 h-11 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" value="{{ $produto->quantidade ?? 1 }}" />
                    <div
                        class="absolute bottom-1 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                        <span>Qntd.</span>
                    </div>
                    <button type="button" id="increment-button"
                        class="bg-gray-100 dark:bg-gray-900 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-md p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </button>
                </div>
                <select name="unidade_medida_id"
                    class="w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
                    @foreach ($unidadeMedidas as $unidadeMedida)
                        <option @if ($unidadeMedida == $produto->unidadeMedida) selected="selected" @endif
                            value="{{ $unidadeMedida->id }}">
                            {{ $unidadeMedida->sigla }}.
                        </option>
                    @endforeach
                </select>
                <button wire:click.prevent="criarUnidadeMedida"
                    class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:focus:ring-offset-gray-800 dark:active:bg-gray-300">
                    Novo
                </button>
            </div>
            <div class="relative">
                <input name="preco" id="preco" type="text" placeholder="Preço"
                    value="R$ {{ number_format($produto->preco, 2, ',') }}"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600">
            </div>


        </div>

        <div class="flex w-full justify-between gap-2 pt-12">
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
        <div class="flex w-full justify-center gap-2 pt-2">
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

    <x-modal name="criar-outro" focusable>
        <livewire:dynamic-component :is="$componenteModal" :key="$componenteModal" />
    </x-modal>

    @assets
        <script src="{{ asset('js/produtos/create.js') }}"></script>
    @endassets
    @script
        <script>
            $wire.dispatch('edit-form-loaded');
        </script>
    @endscript
</div>
