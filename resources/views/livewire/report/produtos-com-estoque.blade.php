<div class="border dark:border-slate-700 rounded-lg w-full lg:w-[calc(50%-0.5rem)] min-w-64 min-w-max">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="dark:bg-slate-700 rounded-t-md flex justify-between p-2 border-b dark:border-b-slate-600">
        <p class="font-bold text-center">
            Produtos com estoque
        </p>
        <a class="h-8 max-w-36 flex items-center justify-center rounded-md border border-gray-600 dark:border-slate-700 bg-slate-600 p-2 text-white hover:bg-slate-800 dark:bg-slate-600 dark:hover:bg-slate-800"
            href="{{ route('relatorios.pdf.produtosComEstoque') }}">
            Exportar em PDF
        </a>
    </div>
    <div class="overflow-x-auto overflow-y-auto max-h-96">
        <table id="table-produto" class="w-full table-auto min-w-max">
            <thead>
                <tr class="bg-gray-200 dark:bg-slate-700 border-b dark:border-b-slate-600">
                    <th class="w-6 px-4 pb-2 text-end">#</th>
                    <th class="px-4 pb-2 text-start">Nome</th>
                    <th class="px-4 pb-2 text-start">Categoria</th>
                    <th class="px-4 pb-2 text-start">Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $i => $produto)
                    <tr class="border-b last:border-b-0 hover:bg-gray-300 dark:border-slate-600 dark:hover:bg-gray-900">
                        <td class="px-4 py-2 text-end text-gray-500 dark:text-gray-400">
                            {{ $i + 1 }}.
                        </td>
                        <td class="px-4 py-2 truncate max-w-xs">
                            <a class="hover:underline" href="{{ route('produtos.edit', $produto->id) }}">
                                {{ $produto->nome }}
                            </a>
                        </td>
                        <td class="px-4 py-2 truncate max-w-xs">
                            <a class="hover:underline" href="{{ route('categorias.edit', $produto->categoria->id) }}">
                                {{ $produto->categoria->nome }}
                            </a>
                        </td>
                        <td class="px-4 py-2 text-start flex flex-row gap-1">
                            <p>
                                {{ $produto->quantidade }} {{ $produto->unidadeMedida->descricao }}
                            </p>
                            <p class="text-gray-500 dark:text-gray-400">
                                ({{ $produto->percentAtual }}%)
                            </p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
