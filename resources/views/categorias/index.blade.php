<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-5xl pb-12 sm:px-6 lg:px-8">
            <div
                class="flex flex-col overflow-hidden bg-white  p-6 text-gray-800 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
                <div class="align-center flex h-10 justify-between">
                    <input id="search" class="rounded-lg border border-slate-600 dark:bg-slate-900"
                        placeholder="Procure um nome..." type="text">
                    <a class="flex items-center justify-items-center rounded-md border border-gray-600 bg-slate-600 p-2 text-gray-200 hover:bg-slate-800 dark:bg-slate-600 dark:hover:bg-slate-700"
                        href="{{ route('categorias.create') }}">
                        Nova Categoria
                    </a>
                </div>
                <div class="justify-center">
                    @if ($errors->any())
                        <div class="alert alert-danger py-6 font-bold text-red-600">
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
                <table id="table-categoria" class="w-full table-fixed overflow-hidden">
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class=" w-32 px-6 pb-2 text-start">Nome</th>
                        <th class="px-6 pb-2 text-start">Descrição</th>
                        <th class="px-6 pb-2">Ações</th>
                    </tr>
                    @foreach ($categorias as $categoria)
                        <tr
                            class=" border-b last:border-b-0 hover:bg-gray-300 dark:border-slate-600 dark:hover:bg-gray-900">
                            <td class="px-6 py-2"> {{ $categoria->nome }} </td>
                            <td class="px-6 py-2"> {{ $categoria->descricao }} </td>

                            <td class="px-6 py-2">
                                <div class="flex flex-col items-center justify-center gap-4 md:flex-row">
                                    <a class="w-20 rounded-md border border-slate-600 px-2 text-center shadow-lg hover:bg-slate-800 hover:text-gray-200 dark:bg-slate-800 dark:hover:bg-slate-900"
                                        href="{{ route('categorias.edit', $categoria) }}">Detalhes</a>

                                    <a class="w-20 rounded-md border border-slate-600 px-2 text-center shadow-lg hover:bg-slate-800 hover:text-gray-200 dark:bg-slate-800 dark:hover:bg-slate-900"
                                        href="{{ route('produtos.filtrar', $categoria) }}">Produtos</a>

                                    <form method="POST" action="{{ route('categorias.destroy', $categoria) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="w-20 rounded-md bg-red-600 px-2 text-white hover:bg-red-900"
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
</x-app-layout>
