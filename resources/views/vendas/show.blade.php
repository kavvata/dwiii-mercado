<x-app-layout>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Detalhes da venda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            <div
                class="flex-col gap-6 overflow-hidden rounded-lg bg-white p-6 text-gray-800 shadow-sm dark:bg-gray-800 dark:text-gray-200">


                <div class="grid grid-cols-2 items-center gap-4">
                    <div
                        class="flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="nome">Data de Venda:</label>
                        <p>{{ $venda->data_venda }}</p>
                    </div>
                    <div
                        class="flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="nome">Produto:</label>
                        <p>{{ $venda->produto->nome }}</p>
                    </div>
                    <div
                        class="flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="nome">Vendedor:</label>
                        <p>{{ $venda->user->name }}</p>
                    </div>
                    <div
                        class="flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="nome">Cliente:</label>
                        <a class="hover:underline"
                            href="{{ route('clientes.edit', $venda->cliente) }}">{{ $venda->cliente->nome }}</a>
                    </div>
                    <div
                        class="flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="nome">
                            Preço por {{ $venda->produto->unidadeMedida->sigla }}:
                        </label>
                        <p>R${{ number_format($venda->preco, 2, ',') }}</p>
                    </div>
                    <div
                        class="flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="nome">Quantidade:</label>
                        <p>{{ $venda->quantidade }} {{ $venda->produto->unidadeMedida->sigla }}</p>
                    </div>
                    <div
                        class="flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="nome">Valor total:</label>
                        <p>R${{ number_format($venda->quantidade * $venda->preco, 2, ',') }}</p>
                    </div>
                </div>
                <div class="flex pt-4 justify-between">
                    <div>
                        <a class="mx-auto items-center rounded-md border border-gray-600 bg-slate-600 p-2 hover:bg-slate-700"
                            href="{{ route('vendas.index') }}">Voltar</a>
                    </div>

                    <div>
                        <!-- TODO: implentar geração de ticket com QRcode -->
                        <a class="mx-auto items-center rounded-md border border-gray-600 bg-slate-700 p-2 hover:bg-slate-800"
                            href="">Gerar ticket</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/produtos/create.js') }}"></script>
</x-app-layout>
