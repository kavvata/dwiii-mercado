<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @if (Request::route()->getName() == 'produtos.filtrar')
                Produtos em {{ $produtos[0]->categoria->nome }}
            @else
                {{ __('Produtos') }}
            @endif
        </h2>
    </x-slot>

    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->

    <div class="py-12">
        <div class="mx-auto max-w-5xl pb-12 sm:px-6 lg:px-8">
            <div
                class="flex flex-col overflow-hidden bg-white  p-6 text-gray-800 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
                <div class="align-center flex justify-between">
                    <div class="flex gap-2">

                        <input id="search" class="rounded-lg border border-slate-600 dark:bg-slate-900"
                            placeholder="Procure um nome..." type="text">

                        <select x-data="{}" @change="window.location = $event.target.value"
                            class="block w-full rounded-lg bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-200">

                            @if (Request::route()->getName() == 'produtos.filtrar')

                                <option value="{{ route('produtos.index') }}">Todos</option>

                                @foreach ($categorias as $categoria)
                                    <option @if ($categoria == $produtos[0]->categoria) selected="selected" @endif
                                        value="{{ route('produtos.filtrar', $categoria) }}">
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            @else
                                <option selected="selected" value="{{ route('produtos.index') }}">Todos</option>

                                @foreach ($categorias as $categoria)
                                    <option value="{{ route('produtos.filtrar', $categoria) }}">
                                        {{ $categoria->nome }}
                                    </option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                    <div>
                        <a class="flex items-center justify-items-center rounded-md border text-gray-200 bg-slate-600 hover:bg-slate-800 border-gray-600 dark:bg-slate-600 p-2 dark:hover:bg-slate-700"
                            href="{{ route('produtos.create') }}">
                            Novo Produto
                        </a>
                    </div>
                </div>
                <div class="justify-center">
                    @if ($errors->any())
                        <div class="py-6 alert alert-danger font-bold text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-center">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div
                class="overflow-hidden bg-white text-gray-800 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
                <table id="table-produto" class="w-full table-fixed overflow-hidden">
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="w-24 px-6 pb-2 text-end">Qntd.</th>
                        <th class="px-6 pb-2 text-start">Nome</th>
                        <th class="px-6 pb-2 text-start">Categoria</th>
                        <th class="w-28 px-6 pb-2 text-start">Preço</th>
                        <th class="px-6 pb-2">Ações</th>
                    </tr>
                    @foreach ($produtos as $produto)
                        <tr
                            class=" border-b last:border-b-0 dark:border-slate-600 hover:bg-gray-300 dark:hover:bg-gray-900">
                            <td class="text-end px-6 py-2 text-gray-500 dark:text-gray-400">
                                {{ $produto->quantidade }} {{ $produto->unidadeMedida->sigla }}
                            </td>
                            <td class="px-6 py-2"> {{ $produto->nome }} </td>
                            <td class="px-6 py-2">
                                <div class="flex flex-col gap-4 lg:flex-row">
                                    <a class="hover:underline"
                                        href="{{ route('produtos.filtrar', $produto->categoria) }}">
                                        {{ $produto->categoria->nome }}
                                    </a>
                                </div>
                            </td>

                            <td class="px-6 py-2 text-start">
                                R${{ number_format($produto->preco, 2, ',') }}
                            </td>

                            <td class="px-6 py-2">
                                <div class="flex flex-col items-center justify-center gap-4 lg:flex-row">
                                    <a class="w-20 rounded-md border border-slate-600 px-2 text-center hover:bg-slate-800 shadow-lg hover:text-gray-200"
                                        href="{{ route('produtos.edit', $produto) }}">Detalhes</a>

                                    <form method="POST" action="{{ route('produtos.destroy', $produto) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="w-20 rounded-md bg-red-600 px-2 hover:bg-red-900 text-white"
                                            type="">Remover</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/produtos/index.js') }}"></script>
</x-app-layout>
