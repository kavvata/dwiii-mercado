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

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            <form method="POST" enctype="multipart/form-data"
                action="{{ $produto->id ? route('produtos.update', $produto) : route('produtos.store', $produto) }}"
                class="flex-col gap-6 overflow-hidden rounded-lg bg-white p-6 text-gray-800 shadow-sm dark:bg-gray-800 dark:text-gray-200">

                @csrf
                @if ($produto->id)
                    @method('PUT')
                @else
                    @method('POST')
                @endif

                <div class="grid grid-cols-2 items-center gap-2">
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="nome">Nome:</label>
                        <input class="h-10 w-64 rounded-lg dark:bg-gray-900" type="text" name="nome"
                            value="{{ $produto->nome }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="descricao">Descrição:</label>
                        <input id="descricao" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="descricao" value="{{ $produto->descricao }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="nome">Quantidade:</label>
                        <input id="quantidade" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="quantidade" value="{{ $produto->quantidade }}">
                    </div>
                    <div
                        class="form-input flex items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="unidade_medida">Unidade de Medida:</label>
                        <div class="inline-flex h-full w-64 gap-2">
                            <select name="unidade_medida_id"
                                class="block w-full rounded-lg bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                @foreach ($unidadeMedidas as $unidadeMedida)
                                    <option @if ($unidadeMedida == $produto->unidadeMedida) selected="selected" @endif
                                        value="{{ $unidadeMedida->id }}">
                                        {{ $unidadeMedida->descricao }} ({{ $unidadeMedida->sigla }})
                                    </option>
                                @endforeach
                            </select>
                            <a class="mx-auto rounded-lg border text-white bg-sky-500 border-gray-400 dark:text-gray-200 dark:border-gray-600 dark:bg-sky-600 p-2 dark:hover:bg-sky-800"
                                href="{{ route('unidade_medidas.create') }}">Nova</a>
                        </div>
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="preco">Preco:</label>
                        <input id="preco" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="preco" value="R$ {{ number_format($produto->preco, 2, ',') }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-start justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="imagem">Imagem:</label>
                        <div class="flex flex-col">
                            <div class="flex justify-center">
                                <img class="h-32" src="{{ $produto->imagem() }}" alt="{{ $produto->nome }}">
                            </div>
                            <input type="file" id="imagem" name="imagem">
                        </div>
                    </div>
                    <div
                        class="form-input flex items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="categoria">Categoria:</label>
                        <div class="inline-flex h-full w-64 gap-2">
                            <select name="categoria_id"
                                class="block w-full rounded-lg bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                @foreach ($categorias as $categoria)
                                    <option @if ($categoria == $produto->categoria) selected="selected" @endif
                                        value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                            <a class="mx-auto rounded-lg border text-white bg-sky-500 border-gray-400 dark:text-gray-200 dark:border-gray-600 dark:bg-sky-600 p-2 dark:hover:bg-sky-800"
                                href="{{ route('categorias.create') }}">Nova</a>
                        </div>
                    </div>
                </div>
                <div class="justify-center">
                    @if ($errors->any())
                        <div class="alert alert-danger font-bold text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <a class="items-center justify-items-center rounded-md border border-gray-600 bg-slate-600 p-2 text-white hover:bg-slate-800 dark:bg-slate-600 dark:hover:bg-slate-700"
                        href="{{ route('produtos.index') }}">Voltar</a>

                    <button type="submit"
                        class="h-10 rounded-lg border-gray-200 bg-green-600 p-2 px-2 text-white dark:text-gray-200">Salvar</button>
                </div>
            </form>

            <div class="mt-10">
                <!-- TODO: tabela com historico de venda -->
            </div>
        </div>
    </div>
    <script src="{{ asset('js/produtos/create.js') }}"></script>
</x-app-layout>
