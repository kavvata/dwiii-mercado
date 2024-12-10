<x-app-layout>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Nova Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            <form method="POST"
                action="{{ $categoria->id ? route('categorias.update', $categoria) : route('categorias.store', $categoria) }}"
                class="flex-col gap-6 overflow-hidden rounded-lg bg-white p-6 text-gray-800 shadow-sm dark:bg-gray-800 dark:text-gray-200">

                @csrf
                @if ($categoria->id)
                    )
                    @method('PUT')
                @else
                    @method('POST')
                @endif

                <div class="grid grid-cols-2 items-center">
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="nome">Nome:</label>
                        <input class="h-10 w-64 rounded-lg dark:bg-gray-900" type="text" name="nome"
                            value="{{ $categoria->nome }}">
                    </div>
                    <div
                        class="form-input flex h-14 items-center justify-between rounded-lg border-0 bg-white text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        <label class="flex items-center" for="descricao">Descrição:</label>
                        <input id="descricao" class="h-full w-64 rounded-lg dark:bg-gray-900" type="text"
                            name="descricao" value="{{ $categoria->descricao }}">
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
                        href="{{ route('categorias.index') }}">Voltar</a>

                    <button type="submit"
                        class="p-2 border-gray-200 bg-green-600 px-2 text-gray-200 rounded-lg h-10">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>