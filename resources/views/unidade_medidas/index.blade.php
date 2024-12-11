<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Unidades de Medida') }}
        </h2>
    </x-slot>

    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->

    <div class="py-12">
        <div class="mx-auto max-w-5xl pb-12 sm:px-6 lg:px-8">
            <div
                class="flex flex-col gap-6 overflow-hidden bg-white  p-6 text-gray-800 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
                <div class="align-center flex h-8 justify-between">
                    <input id="search" class="rounded-lg border border-slate-600 dark:bg-slate-900"
                        placeholder="Procure um nome..." type="text">
                    <a class="flex items-center justify-items-center rounded-md border border-gray-600 bg-slate-600 p-2 hover:bg-slate-700"
                        href="{{ route('unidade_medidas.create') }}">
                        Nova Unidade de Medida
                    </a>
                </div>
                <div class="justify-center">
                    @if ($errors->any())
                        <div class="py-6 alert alert-danger font-bold text-red-600">
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
                    <tr class="bg-gray-700">
                        <th class="w-20 px-6 pb-2 text-end">Sigla</th>
                        <th class="px-6 pb-2 text-start">Descrição</th>
                        <th class="px-6 pb-2">Ações</th>
                    </tr>
                    @foreach ($medidas as $medida)
                        <tr class=" border-b last:border-b-0 border-slate-600 dark:hover:bg-gray-900">
                            <td class="px-6 py-2 text-end dark:text-gray-400"> {{ $medida->sigla }} </td>
                            <td class="px-6 py-2"> {{ $medida->descricao }} </td>

                            <td class="px-6 py-2">
                                <div class="flex flex-col items-center justify-center gap-4 md:flex-row">
                                    <a class="w-20 rounded-md border border-slate-600 px-2 text-center hover:bg-slate-800 shadow-lg"
                                        href="{{ route('unidade_medidas.edit', $medida) }}">Detalhes</a>

                                    <form method="POST" action="{{ route('unidade_medidas.destroy', $medida) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="w-20 rounded-md bg-red-600 px-2 hover:bg-red-900"
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
