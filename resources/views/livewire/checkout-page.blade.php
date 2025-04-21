<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="mb-4 text-2xl font-bold text-gray-800 dark:text-white">
        Verificación
    </h1>

    <form wire:submit.prevent="realizarPedido">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-12 lg:col-span-8">
                <!-- Card -->
                <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-900">
                    <!-- Shipping Address -->
                    <div class="mb-6">
                        <h2 class="mb-2 text-xl font-bold text-gray-700 underline dark:text-white">
                            Dirección de envío
                        </h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 text-gray-700 dark:text-white" for="first_name">
                                    Nombre
                                </label>
                                <input wire:model='nombre'
                                    class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-none @error('nombre') border-red-500 @enderror"
                                    id="first_name" type="text">
                                </input>
                                @error('nombre')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-1 text-gray-700 dark:text-white" for="last_name">
                                    Apellidos
                                </label>
                                <input wire:model='apellido'
                                    class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-none @error('apellido') border-red-500 @enderror"
                                    id="last_name" type="text">
                                </input>
                                @error('apellido')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block mb-1 text-gray-700 dark:text-white" for="phone">
                                Telefono
                            </label>
                            <input wire:model='telefono'
                                class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-none @error('telefono') border-red-500 @enderror"
                                id="phone" type="text">
                            </input>
                            @error('telefono')
                                <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block mb-1 text-gray-700 dark:text-white" for="address">
                                Dirección
                            </label>
                            <input wire:model='direccion'
                                class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-none @error('direccion') border-red-500 @enderror"
                                id="address" type="text">
                            </input>
                            @error('direccion')
                                <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block mb-1 text-gray-700 dark:text-white" for="city">
                                Ciudad
                            </label>
                            <input wire:model='ciudad'
                                class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-none @error('ciudad') border-red-500 @enderror"
                                id="city" type="text">
                            </input>
                            @error('ciudad')
                                <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block mb-1 text-gray-700 dark:text-white" for="distrit">
                                    Distrito
                                </label>
                                <input wire:model='distrito'
                                    class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-none @error('distrito') border-red-500 @enderror"
                                    id="distrit" type="text">
                                </input>
                                @error('distrito')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-1 text-gray-700 dark:text-white" for="distrit">
                                    Provincia
                                </label>
                                <input wire:model='provincia'
                                    class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-none @error('provincia') border-red-500 @enderror"
                                    id="distrit" type="text">
                                </input>
                                @error('provincia')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block mb-1 text-gray-700 dark:text-white" for="state">
                                    Departamento
                                </label>
                                <input wire:model='departamento'
                                    class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-none @error('departamento') border-red-500 @enderror"
                                    id="state" type="text">
                                </input>
                                @error('departamento')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-1 text-gray-700 dark:text-white" for="zip">
                                    Codigo Postal
                                </label>
                                <input wire:model='codigo_postal'
                                    class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-white dark:border-none @error('codigo_postal') border-red-500 @enderror"
                                    id="zip" type="text">
                                </input>
                                @error('codigo_postal')
                                    <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 text-lg font-semibold">
                        Seleccione el método de pago
                    </div>
                    <ul class="grid w-full gap-6 md:grid-cols-2">
                        <li>
                            <input wire:model='metodo_pago' class="hidden peer" id="hosting-small" required=""
                                type="radio" value="COD" />
                            <label
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                                for="hosting-small">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        Pago contra reembolso
                                    </div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                    viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </label>
                        </li>
                        {{-- <li>
                            <input wire:model='metodo_pago' class="hidden peer" id="hosting-big" type="radio"
                                value="Yape">
                            <label
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                                for="hosting-big">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        Yape
                                    </div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                    viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </label>
                            </input>
                        </li> --}}
                    </ul>
                    @error('metodo_pago')
                        <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <!-- End Card -->
            </div>
            <div class="col-span-12 md:col-span-12 lg:col-span-4">
                <div class="p-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-900">
                    <div class="mb-2 text-xl font-bold text-gray-700 underline dark:text-white">
                        RESUMEN DEL PEDIDO
                    </div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Subtotal
                        </span>
                        <span>
                            S/. {{ number_format($total_general, 2) }}
                        </span>
                    </div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            IGV (18%)
                        </span>
                        <span>
                            S/. 0.00
                        </span>
                    </div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Costo de envío
                        </span>
                        <span>
                            S/. 0.00
                        </span>
                    </div>
                    <hr class="h-1 my-4 rounded bg-slate-400">
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Total
                        </span>
                        <span>
                            S/. {{ number_format($total_general, 2) }}
                        </span>
                    </div>
                    </hr>
                </div>
                <button type="submit"
                    class="w-full p-3 mt-4 text-lg text-white bg-green-500 rounded-lg hover:bg-green-600">
                    <span wire:loading.remove> Realizar pedido</span> <span wire:loading> Procesando...</span>
                </button>
                <div class="p-4 mt-4 bg-white shadow rounded-xl sm:p-7 dark:bg-slate-900">
                    <div class="mb-2 text-xl font-bold text-gray-700 underline dark:text-white">
                        RESUMEN DE SU PEDIDO
                    </div>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">


                        @foreach ($cart_items as $ci)
                            <li class="py-3 sm:py-4" wire:model='{{ $ci['product_id'] }}'>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img alt="Neil image" class="w-12 h-12 rounded-full"
                                            src="{{ Storage::url($ci['image']) }}" alt="{{ $ci['name'] }}">
                                        </img>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $ci['name'] }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            Cantidad: {{ $ci['quantity'] }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        S/. {{ number_format($ci['total_amount'], 2) }}
                                    </div>
                                </div>
                            </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
