<x-app-layout>
    <!-- It is never too late to be what you might have been. - George Eliot -->

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Novo Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            <form method="POST" action="{{ route('produtos.store') }}"
                class="flex-col gap-6 overflow-hidden bg-white p-6 text-gray-800 shadow-sm rounded-lg dark:bg-gray-800 dark:text-gray-200">

                @csrf
                @method('POST')

                <div class="grid grid-cols-2 items-center">
                    <div
                        class="flex border-0 form-input bg-white text-gray-800 rounded-lg dark:bg-gray-800 dark:text-gray-200 justify-between">
                        <label for="nome">Nome:</label>
                        <input class="h-8 rounded-lg dark:bg-gray-900" type="text" name="nome">
                    </div>
                    <div
                        class="flex border-0 form-input bg-white text-gray-800 rounded-lg dark:bg-gray-800 dark:text-gray-200 justify-between">
                        <label for="nome">Descricao:</label>
                        <input class="h-8 rounded-lg dark:bg-gray-900" type="text" name="descricao">
                    </div>
                    <div
                        class="flex border-0 form-input bg-white text-gray-800 rounded-lg dark:bg-gray-800 dark:text-gray-200 justify-between">
                        <label for="nome">Medida:</label>
                        <input class="h-8 rounded-lg dark:bg-gray-900" type="text" name="medida">
                    </div>
                    <div
                        class="flex border-0 form-input bg-white text-gray-800 rounded-lg dark:bg-gray-800 dark:text-gray-200 justify-between">
                        <label for="nome">Quantidade:</label>
                        <input id="quantidade" class="h-8 rounded-lg dark:bg-gray-900" type="text" name="quantidade"
                            value="0">
                    </div>
                    <div
                        class="flex border-0 form-input bg-white text-gray-800 rounded-lg dark:bg-gray-800 dark:text-gray-200 justify-between">
                        <label for="nome">Preco:</label>
                        <input id="preco" class="h-8 rounded-lg dark:bg-gray-900" type="text" name="preco"
                            value="R$ 0,00">
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
                    <a class="h-10 p-2 border border-gray-600 bg-slate-600 hover:bg-slate-700 rounded-md"
                        href="{{ route('produtos.index') }}">Voltar</a>

                    <button type="submit"
                        class="p-2 border-gray-200 bg-green-600 px-2 text-gray-200 rounded-lg h-10">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/produtos/create.js') }}"></script>
</x-app-layout>
