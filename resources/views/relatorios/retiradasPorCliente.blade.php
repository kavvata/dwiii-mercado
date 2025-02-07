<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Retiradas agrupadas por cliente
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
                            href="{{ route('relatorios.pdf.retiradasPorCliente') }}">
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

                    @foreach ($clientes as $cliente)
                        <tr class="bg-gray-200 dark:bg-gray-600">
                            <th colspan="4" class="px-6 pb-2 text-start text-lg">
                                <a class="hover:underline" href="{{ route('clientes.edit', $cliente->id) }}">
                                    {{ $cliente->nome }}
                                </a>

                            </th>
                        </tr>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="px-6 pb-2 text-start">Data</th>
                            <th class="px-6 pb-2 text-start">Produto</th>
                            <th class="px-6 pb-2 text-start">Qntd.</th>
                            <th class="px-6 pb-2 text-start">Total</th>
                        </tr>
                        @foreach ($cliente->vendas as $venda)
                            <tr
                                class="border-b last:border-b-0 hover:bg-gray-300 dark:border-slate-600 dark:hover:bg-gray-900">
                                <td class="px-6 py-2 text-start text-gray-500 dark:text-gray-400">
                                    {{ $venda->data_venda->timezone('America/Sao_Paulo')->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-2">
                                    <div class="flex flex-col gap-4 lg:flex-row">
                                        <a class="hover:underline"
                                            href="{{ route('produtos.edit', $venda->produto->id) }}">
                                            {{ $venda->produto->nome }}
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
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
