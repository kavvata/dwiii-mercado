<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <!-- Be present above all else. - Naval Ravikant -->
    <div class="py-12">
        <div class="mx-auto max-w-5xl pb-12 sm:px-6 lg:px-8">
            <div
                class="flex flex-col gap-6 overflow-hidden bg-white  p-6 text-gray-800 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
                <div class="align-center flex h-8 justify-between">
                    <input id="search" class="rounded-lg border border-slate-600 dark:bg-slate-900"
                        placeholder="Procure um nome..." type="text">
                    <a class="flex items-center justify-items-center rounded-md border border-gray-600 bg-slate-600 p-2 hover:bg-slate-700"
                        href="{{ route('clientes.create') }}">
                        Novo Cliente
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
                <table id="table-produto" class="w-full table-fixed overflow-hidden">
                    <tr class="bg-gray-700">
                        <th class="px-6 pb-2 text-start">Nome</th>
                        <th class="px-6 pb-2 text-start">CPF</th>
                        <th class="px-6 pb-2 text-start">Email</th>
                        <th class="px-6 pb-2">Ações</th>
                    </tr>
                    @foreach ($clientes as $cliente)
                        <tr class=" border-b last:border-b-0 border-slate-600 dark:hover:bg-gray-900">
                            <td class="px-6 py-2"> {{ $cliente->nome }} </td>
                            <td class="px-6 py-2 text-wrap">
                                {{ substr($cliente->cpf, 0, 3) . '.' . substr($cliente->cpf, 3, 3) . '.' . substr($cliente->cpf, 6, 3) . '-' . substr($cliente->cpf, 9) }}
                            </td>
                            <td class="px-6 py-2"> {{ $cliente->email }} </td>
                            <td class="flex flex-col items-center justify-center gap-4 px-6 py-2 lg:flex-row">

                                <a class="w-20 rounded-md border border-slate-600 px-2 text-center hover:bg-slate-800 shadow-lg"
                                    href="{{ route('clientes.edit', $cliente) }}">Editar</a>

                                <form method="POST" action="{{ route('clientes.destroy', $cliente) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="w-20 rounded-md bg-red-600 px-2 hover:bg-red-900"
                                        type="">Remover</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/produtos/index.js') }}"></script>
</x-app-layout>
