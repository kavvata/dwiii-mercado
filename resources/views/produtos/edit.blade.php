<x-app-layout>
    <!-- It is never too late to be what you might have been. - George Eliot -->

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Novo Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            <form method="POST" action="{{ route('produtos.update', $produto) }}"
                class="flex-col gap-6 overflow-hidden rounded-lg bg-white p-6 text-gray-800 shadow-sm dark:bg-gray-800 dark:text-gray-200">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 items-center">
                    <div
                        class="form-input flex justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label for="nome">Nome:</label>
                        <input class="h-8 rounded-lg dark:bg-gray-900" type="text" name="nome"
                            value="{{ $produto->nome }}">
                    </div>
                    <div
                        class="form-input flex justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label for="descricao">Descricao:</label>
                        <input id="descricao" class="h-8 rounded-lg dark:bg-gray-900" type="text" name="descricao"
                            value="{{ $produto->nome }}">
                    </div>
                    <div
                        class="form-input flex justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label for="medida">Medida:</label>
                        <input id="medida" class="h-8 rounded-lg dark:bg-gray-900" type="text" name="medida"
                            value="{{ $produto->medida }}">
                    </div>
                    <div
                        class="form-input flex justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label for="nome">Quantidade:</label>
                        <input id="quantidade" class="h-8 rounded-lg dark:bg-gray-900" type="text" name="quantidade"
                            value="{{ $produto->quantidade }}">
                    </div>
                    <div
                        class="form-input flex justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label for="preco">Preco:</label>
                        <input id="preco" class="h-8 rounded-lg dark:bg-gray-900" type="text" name="preco"
                            value="R$ {{ number_format($produto->preco, 2, ',') }}">
                    </div>
                    <div
                        class="form-input flex justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label for="categoria">Categoria:</label>
                        <select class="block dark:bg-gray-900 rounded-lg bg-white text-gray-800 dark:text-gray-200">
                            <option selected>Choose a country</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
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
                    <a class="h-10 rounded-md border border-gray-600 bg-slate-600 p-2 hover:bg-slate-700"
                        href="{{ route('produtos.index') }}">Voltar</a>

                    <button type="submit"
                        class="h-10 rounded-lg border-gray-200 bg-green-600 p-2 px-2 text-gray-200">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/produtos/create.js') }}"></script>
</x-app-layout>
