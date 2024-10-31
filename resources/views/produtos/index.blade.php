<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="flex flex-col gap-6 overflow-hidden bg-white p-6 text-gray-800 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
                <div>
                    TODO: filtro
                </div>
                <table class="w-full table-fixed">
                    <tr class="border border-slate-600">
                        <th class="border border-slate-600">Nome</th>
                        <th class="border border-slate-600">Quantidade</th>
                        <th class="border border-slate-600">Preço</th>
                        <th class="border border-slate-600">Ações</th>
                    </tr>
                    @foreach ($produtos as $produto)
                        <tr class ="border border-slate-600 dark:hover:bg-gray-900">
                            <td class="border border-slate-600 py-2 text-center"> {{ $produto->nome }} </td>
                            <td class="border border-slate-600 py-2 text-center"> {{ $produto->quantidade }} </td>

                            <td class="border border-slate-600 py-2 text-center">
                                R${{ number_format($produto->preco, 2) }}
                            </td>

                            <td class="flex flex-row justify-center gap-2 py-2">

                                <a class="border border-slate-600 px-2 hover:bg-slate-800 sm:rounded-md"
                                    href="{{ route('produtos.show', $produto) }}">Mostrar</a>

                                <a class="border border-slate-600 px-2 hover:bg-slate-800 sm:rounded-md"
                                    href="{{ route('produtos.edit', $produto) }}">Editar</a>

                                <form method="POST" action="{{ route('produtos.destroy', $produto) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="bg-red-600 px-2 hover:bg-red-900 sm:rounded-md "
                                        type="">Remover</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
