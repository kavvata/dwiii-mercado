<div class="border dark:border-slate-700 rounded-lg w-full lg:w-[calc(50%-0.5rem)] min-w-64">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="dark:bg-slate-700 rounded-t-md flex justify-between p-2">
        <p class="font-bold align-middle text-center">
            Produtos sem estoque
        </p>
        <a class="h-8 max-w-36 flex items-center justify-center rounded-md border border-gray-600 dark:border-slate-700 bg-slate-600 p-2 text-white hover:bg-slate-800 dark:bg-slate-600 dark:hover:bg-slate-800"
            href="{{ route('relatorios.pdf.produtosSemEstoque') }}">
            Exportar em PDF
        </a>
    </div>
    <div class="overflow-x-auto overflow-y-auto max-h-96">
        <table id="table-produto" class="table-auto w-full min-w-max">
            <thead>
                <tr class="bg-gray-200 dark:bg-slate-700">
                    <th class="w-12 px-4 pb-2 text-end whitespace-nowrap">#</th>
                    <th class="px-4 pb-2 text-start whitespace-nowrap">Nome</th>
                    <th class="px-4 pb-2 text-start whitespace-nowrap">Categoria</th>
                    <th class="px-4 pb-2 text-start whitespace-nowrap">Un. de medida</th>
                    <th class="px-4 pb-2 text-start whitespace-nowrap">Data em que findou</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $i => $produto)
                    <tr class="border-b last:border-b-0 hover:bg-gray-300 dark:border-slate-600 dark:hover:bg-gray-900">
                        <td class="px-4 py-2 text-end text-gray-500 dark:text-gray-400 whitespace-nowrap">
                            {{ $i + 1 }}.
                        </td>
                        <td class="px-4 py-2 max-w-xs truncate">
                            <a class="hover:underline" href="{{ route('produtos.edit', $produto->id) }}">
                                {{ $produto->nome }}
                            </a>
                        </td>
                        <td class="px-4 py-2 max-w-xs truncate">
                            <a class="hover:underline" href="{{ route('categorias.edit', $produto->categoria->id) }}">
                                {{ $produto->categoria->nome }}
                            </a>
                        </td>
                        <td class="px-4 py-2 max-w-xs truncate">
                            <a class="hover:underline"
                                href="{{ route('unidade_medidas.edit', $produto->unidadeMedida->id) }}">
                                {{ $produto->unidadeMedida->descricao }}
                            </a>
                        </td>
                        <td class="px-4 py-2 text-start max-w-xs truncate">
                            {{ $produto->data_findou }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
