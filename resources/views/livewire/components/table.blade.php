<div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
    {{-- Do your work, then step back. --}}
    <div class="overflow-hidden bg-white text-gray-800 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
        <table id="table-model" class="w-full table-fixed overflow-hidden">
            <tr class="bg-gray-200 dark:bg-gray-700">
                @foreach ($campos as $campo)
                    <th class="px-6 pb-2 text-start">{{ $campo }}</th>
                @endforeach
                <!-- <th class="w-24 px-6 pb-2 text-end">Qntd.</th> -->
                <!-- <th class="px-6 pb-2 text-start">Nome</th> -->
                <!-- <th class="px-6 pb-2 text-start">Categoria</th> -->
                <!-- <th class="w-28 px-6 pb-2 text-start">Preço</th> -->
                <th class="px-6 pb-2">Ações</th>
            </tr>
            @foreach ($modelList as $model)
                <tr class="border-b last:border-b-0 hover:bg-gray-300 dark:border-slate-600 dark:hover:bg-gray-900">
                    @foreach ($campos as $campo)
                        <td class="px-6 py-2"> {{ $model[$campo] }} </td>
                    @endforeach
                    <td class="px-6 py-2">
                        <div class="flex flex-col items-center justify-center gap-4 lg:flex-row">
                            <a class="w-20 rounded-md border border-slate-600 px-2 text-center shadow-lg hover:bg-slate-800 hover:text-gray-200 dark:bg-slate-800 dark:hover:bg-slate-900"
                                href="{{ route('produtos.edit', $model) }}">Detalhes</a>

                            <form method="POST" action="{{ route('produtos.destroy', $model) }}">
                                @method('DELETE')
                                @csrf
                                <button class="w-20 rounded-md bg-red-600 px-2 text-white hover:bg-red-900"
                                    type="">Remover</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
