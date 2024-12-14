<x-app-layout>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @if ($cliente->id)
                Editar {{ $cliente->nome }}
            @else
                Novo Cliente
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            <form method="POST"
                action="{{ $cliente->id ? route('clientes.update', $cliente) : route('clientes.store', $cliente) }}"
                class="flex-col gap-6 overflow-hidden rounded-lg bg-white p-6 text-gray-800 shadow-sm dark:bg-gray-800 dark:text-gray-200">

                @csrf
                @if ($cliente->id)
                    @method('PUT')
                @else
                    @method('POST')
                @endif

                <div class="grid grid-cols-2 items-center gap-2">
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="nome">Nome:</label>
                        <input class="h-10 w-64 rounded-lg dark:bg-gray-900" type="text" name="nome"
                            value="{{ $cliente->nome }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="cpf">CPF:</label>
                        <input id="cpf" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="cpf" value="{{ $cliente->cpf }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="telefone">Telefone:</label>
                        <input id="telefone" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="telefone" value="{{ $cliente->telefone }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="email">E-mail:</label>
                        <input id="email" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="email" value="{{ $cliente->email }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="cep">CEP:</label>
                        <div class="inline-flex h-full w-64 gap-2">
                            <input id="cep" class="w-3/4 rounded-lg dark:bg-gray-900" type="text"
                                name="cep" value="{{ $cliente->endereco->cep }}">

                            <button id="buscarCep"
                                class="mx-auto rounded-lg border text-white bg-sky-500 border-gray-400 dark:text-gray-200 dark:border-gray-600 dark:bg-sky-600 p-2 dark:hover:bg-sky-800">
                                Buscar
                            </button>
                        </div>
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="uf">UF:</label>
                        <input id="uf" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="uf" value="{{ $cliente->endereco->uf }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="cidade">Cidade:</label>
                        <input id="cidade" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="cidade" value="{{ $cliente->endereco->cidade }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="bairro">Bairro:</label>
                        <input id="bairro" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="bairro" value="{{ $cliente->endereco->bairro }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="rua">Rua:</label>
                        <input id="rua" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="rua" value="{{ $cliente->endereco->rua }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="numero">Número:</label>
                        <input id="numero" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="numero" value="{{ $cliente->endereco->numero }}">
                    </div>
                </div>
                <div class="justify-center">
                    @if ($errors->any())
                        <div class="alert alert-danger font-bold text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <a class="items-center justify-items-center rounded-md border border-gray-600 bg-slate-600 p-2 text-white hover:bg-slate-800 dark:bg-slate-600 dark:hover:bg-slate-700"
                        href="{{ route('clientes.index') }}">Voltar</a>

                    <button type="submit"
                        class="h-10 rounded-lg border-gray-200 bg-green-600 p-2 px-2 text-white dark:text-gray-200">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/clientes/create.js') }}"></script>
</x-app-layout>
