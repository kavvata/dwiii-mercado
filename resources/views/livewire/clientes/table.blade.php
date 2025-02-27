<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="py-12">
        <div class="mx-auto max-w-5xl pb-12 sm:px-6 lg:px-8">
            <div
                class="flex flex-col overflow-hidden bg-white  p-6 text-gray-800 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:text-gray-200">
                <div class="align-center flex h-10 justify-between">
                    <input id="search" class="rounded-lg border border-slate-600 dark:bg-slate-900"
                        placeholder="Procure um nome..." type="text">
                    <x-primary-button wire:click="criarCliente()">
                        Novo Cliente
                    </x-primary-button>
                </div>
                <div class="justify-center">
                    @if ($errors->any())
                        <div class="alert alert-danger py-6 font-bold text-red-600">
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
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="px-6 pb-2 text-start">Nome</th>
                        <th class="px-6 pb-2 text-start">CPF</th>
                        <th class="px-6 pb-2 text-start">Email</th>
                    </tr>
                    @foreach ($clientes as $cliente)
                        <tr
                            class=" border-b last:border-b-0 hover:bg-gray-300 dark:border-slate-600 dark:hover:bg-gray-900">
                            <td class="px-6 py-2">
                                <button wire:click="editarCliente({{ $cliente->id }})"
                                    class="hover:underline group flex items-center gap-x-2">
                                    {{ $cliente->nome }}

                                    <div
                                        class="flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <svg class="h-5 w-5 text-gray-800 dark:text-white" viewBox="0 0 20 20"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.83617 2.61744L9.82025 1.63277C10.0254 1.42763 10.3036 1.31238 10.5938 1.31238C10.8839 1.31238 11.1621 1.42763 11.3673 1.63277C11.5724 1.83792 11.6876 2.11615 11.6876 2.40627C11.6876 2.69639 11.5724 2.97463 11.3673 3.17977L5.17283 9.37419C4.86444 9.6824 4.48413 9.90894 4.06625 10.0334L2.5 10.5L2.96667 8.93377C3.09108 8.51589 3.31762 8.13558 3.62583 7.82719L8.83617 2.61744ZM8.83617 2.61744L10.375 4.15627M9.5 8.16669V10.9375C9.5 11.2856 9.36172 11.6195 9.11558 11.8656C8.86944 12.1117 8.5356 12.25 8.1875 12.25H2.0625C1.7144 12.25 1.38056 12.1117 1.13442 11.8656C0.888281 11.6195 0.75 11.2856 0.75 10.9375V4.81252C0.75 4.46443 0.888281 4.13059 1.13442 3.88444C1.38056 3.6383 1.7144 3.50002 2.0625 3.50002H4.83333"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </button>
                            </td>
                            <td class="text-wrap px-6 py-2">
                                {{ substr($cliente->cpf, 0, 3) . '.' . substr($cliente->cpf, 3, 3) . '.' . substr($cliente->cpf, 6, 3) . '-' . substr($cliente->cpf, 9) }}
                            </td>
                            <td class="px-6 py-2"> {{ $cliente->email }} </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <x-modal name="editar-cliente" focusable>
        <livewire:clientes.edit-cliente :cliente="$clienteSelecionado" key="{{ $clienteSelecionado->id }}" />
    </x-modal>
</div>
