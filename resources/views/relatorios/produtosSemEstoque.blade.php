<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Produtos sem estoque
        </h2>
    </x-slot>

    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->

    <div class="py-12">
        <div class="mx-auto max-w-5xl pb-12 sm:px-6 lg:px-8">
            <div
                class="flex flex-col overflow-hidden bg-white  p-6 text-gray-800 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
                <div class="align-center flex justify-between">
                    <div>
                        <a class="h-10 flex items-center justify-items-center rounded-md border border-gray-600 bg-slate-600 p-2 text-white hover:bg-slate-800 dark:bg-slate-600 dark:hover:bg-slate-700"
                            href="{{ route('relatorios.pdf.produtosSemEstoque') }}">
                            Exportar em PDF
                        </a>
                    </div>
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
                <table id="table-produto" class="w-full table-fixed overflow-hidden">
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="w-24 px-6 pb-2 text-start">#</th>
                        <th class="px-6 pb-2 text-start">Nome</th>
                        <th class="px-6 pb-2 text-start">Categoria</th>
                        <th class="px-6 pb-2 text-start">Un. de medida</th>
                        <th class="px-6 pb-2 text-start">Data em que findou</th>
                    </tr>
                    @foreach ($produtos as $i => $produto)
                        <tr
                            class="border-b last:border-b-0 hover:bg-gray-300 dark:border-slate-600 dark:hover:bg-gray-900">
                            <td class="px-6 py-2 text-start text-gray-500 dark:text-gray-400">
                                {{ $i + 1 }}.
                            </td>
                            <td class="px-6 py-2">
                                <div class="flex flex-col gap-4 lg:flex-row">
                                    <a class="hover:underline" href="{{ route('produtos.edit', $produto->id) }}">
                                        {{ $produto->nome }}
                                    </a>
                                </div>
                            </td>

                            <td class="px-6 py-2 text-start">
                                {{ $produto->categoria->nome }}
                            </td>

                            <td class="px-6 py-2 text-start">
                                {{ $produto->unidadeMedida->descricao }}
                            </td>

                            <td class="px-6 py-2 text-start">
                                {{ $produto->data_findou }}
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
