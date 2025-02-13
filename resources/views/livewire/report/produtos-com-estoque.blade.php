<div x-data="{ open: false }" class="border dark:border-slate-700 rounded-lg w-full min-w-64">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div :class="{ 'rounded-b-none border-b dark:border-b-slate-600': open }"
        class="dark:bg-slate-700 rounded-md flex justify-between p-2 ">
        <div>
            <button @click="open ? open = null : open = 1"
                class="w-full text-left px-4 py-2 flex justify-between items-center">
                <p class="font-bold text-center">
                    Produtos com estoque
                </p>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>

            </button>
        </div>
        <a class="h-8 max-w-36 flex items-center justify-center rounded-md border border-gray-600 dark:border-slate-700 bg-slate-600 p-2 text-white hover:bg-slate-800 dark:bg-slate-600 dark:hover:bg-slate-800"
            href="{{ route('relatorios.pdf.produtosComEstoque') }}">
            Exportar em PDF
        </a>
    </div>
    <div x-show="open" x-collapse class="overflow-x-auto overflow-y-auto max-h-96">
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
