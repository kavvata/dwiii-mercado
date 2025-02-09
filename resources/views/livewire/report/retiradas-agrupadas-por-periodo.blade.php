<div class="border dark:border-slate-700 rounded-lg w-full lg:w-[calc(50%-0.5rem)] min-w-max">
    {{-- Do your work, then step back. --}}
    <div class="dark:bg-slate-700 rounded-t-md flex justify-between p-2">
        <p class="font-bold text-center">
            Retiradas agrupadas por período
        </p>
        <a class="h-8 max-w-36 flex items-center justify-center rounded-md border border-gray-600 dark:border-slate-700 bg-slate-600 p-2 text-white hover:bg-slate-800 dark:bg-slate-600 dark:hover:bg-slate-800"
            href="{{ route('relatorios.pdf.retiradasPorPeriodo') }}">
            Exportar em PDF
        </a>
    </div>
    <div class="overflow-x-auto overflow-y-auto max-h-96">
        <table id="table-produto" class="w-full table-auto min-w-max">
            <thead>
                <tr class="bg-gray-200 dark:bg-slate-700">
                    <th class="px-6 pb-2 text-start">Cliente</th>
                    <th class="px-6 pb-2 text-start">Produto</th>
                    <th class="px-6 pb-2 text-start">Categoria</th>
                    <th class="px-6 pb-2 text-start">Qntd.</th>
                    <th class="px-6 pb-2 text-start">Total</th>
                </tr>
            </thead>
            @foreach ($periodos as $periodo => $vendas)
                <tbody>
                    <tr class="bg-slate-200 dark:bg-slate-600">
                        <th colspan="5" class="px-6 pb-2 text-start">
                            {{ $periodo }}
                        </th>
                    </tr>
                    @foreach ($vendas as $venda)
                        <tr
                            class="border-b last:border-b-0 hover:bg-gray-300 dark:border-slate-600 dark:hover:bg-gray-900">
                            <td class="px-6 py-2">
                                <div class="flex flex-col gap-4 lg:flex-row">
                                    <a class="hover:underline" href="{{ route('clientes.edit', $venda->cliente->id) }}">
                                        {{ $venda->cliente->nome }}
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-2">
                                <div class="flex flex-col gap-4 lg:flex-row">
                                    <a class="hover:underline" href="{{ route('produtos.edit', $venda->produto->id) }}">
                                        {{ $venda->produto->nome }}
                                    </a>
                                </div>
                            </td>

                            <td class="px-6 py-2">
                                <div class="flex flex-col gap-4 lg:flex-row">
                                    <a class="hover:underline"
                                        href="{{ route('categorias.edit', $venda->produto->categoria->id) }}">
                                        {{ $venda->produto->categoria->nome }}
                                    </a>
                                </div>
                            </td>

                            <td class="px-6 py-2 text-start">
                                {{ $venda->quantidade }} {{ $venda->produto->unidadeMedida->sigla }}.
                            </td>

                            <td class="px-6 py-2 text-start">
                                R${{ number_format($venda->preco * $venda->quantidade, 2, ',') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endforeach
        </table>
    </div>
</div>
