<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Vendas') }}
        </h2>
    </x-slot>
    <!-- Order your soul. Reduce your wants. - Augustine -->

    <div class="py-12">
        <div class="mx-auto max-w-5xl pb-12 sm:px-6 lg:px-8">
            <div
                class="flex flex-col overflow-hidden bg-white  p-6 text-gray-800 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
                <form method="POST" action="{{ route('vendas.store') }}">
                    <div class="grid grid-cols-2 items-center gap-2">
                        @csrf
                        @method('POST')
                        <div
                            class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                            <label class="flex items-center" for="nome">Quantidade:</label>
                            <input id="quantidade" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                                name="quantidade">
                        </div>
                        <div
                            class="form-input flex items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                            <label class="flex items-center" for="produto">Produto:</label>
                            <div class="inline-flex h-full w-64 gap-2">
                                <select name="produto_id"
                                    class="block w-full rounded-lg bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                    @foreach ($produtos as $produto)
                                        <option value="{{ $produto->id }}">
                                            {{ $produto->nome }}
                                            ({{ $produto->quantidade }} {{ $produto->unidadeMedida->sigla }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div
                            class="form-input flex items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                            <label class="flex items-center" for="cliente">Cliente:</label>
                            <div class="inline-flex h-full w-64 gap-2">
                                <select name="cliente_id"
                                    class="block w-full rounded-lg bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div>
                        <button type="submit"
                            class="h-10 rounded-lg border-gray-200 bg-green-600 p-2 px-2 text-white dark:text-gray-200">
                            Realizar Venda
                        </button>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="justify-center alert alert-danger py-6 font-bold text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-center">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
            <div
                class="overflow-hidden bg-white text-gray-800 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
                <table id="table-produto" class="w-full table-fixed overflow-hidden">
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="px-6 pb-2 text-start">Data</th>
                        <th class="px-6 pb-2 text-start">Cliente</th>
                        <th class="px-6 pb-2 text-start">Produto</th>
                        <th class="w-28 px-6 pb-2 text-start">Qntd.</th>
                        <th class="w-28 px-6 pb-2 text-end">Total.</th>
                        <th class="px-6 pb-2">Ações</th>
                    </tr>
                    @foreach ($vendas as $venda)
                        <tr
                            class="border-b last:border-b-0 hover:bg-gray-300 dark:border-slate-600 dark:hover:bg-gray-900">
                            <td class="px-6 py-2 text-start text-gray-500 dark:text-gray-400"> {{ $venda->data_venda }}
                            </td>
                            <td class="px-6 py-2"> {{ $venda->cliente->nome }} </td>
                            <td class="px-6 py-2"> {{ $venda->produto->nome }} </td>
                            <td class="px-6 py-2 text-start"> {{ $venda->quantidade }} </td>
                            <td class="px-6 py-2 text-end">
                                R${{ number_format($venda->preco * $venda->quantidade, 2, ',') }}
                            </td>

                            <td class="px-6 py-2">
                                <div class="flex flex-col items-center justify-center lg:flex-row">
                                    <a class="w-20 rounded-md border border-slate-600 px-2 text-center shadow-sm dark:shadow-lg hover:bg-slate-800 hover:text-gray-200 dark:bg-slate-800 dark:hover:bg-slate-900"
                                        href="{{ route('vendas.show', $venda) }}">Detalhes</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
