<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-slate-500">Order Details</h1>

    <!-- Grid -->
    <div class="grid gap-4 mt-5 sm:grid-cols-2 lg:grid-cols-4 sm:gap-6">
        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <div class="flex p-4 md:p-5 gap-x-4">
                <div
                    class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                    <svg class="flex-shrink-0 text-gray-600 size-5 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs tracking-wide text-gray-500 uppercase">
                            Cliente
                        </p>
                    </div>
                    <div class="flex items-center mt-1 gap-x-2">
                        <div>{{ $direccion->nombre . ' ' . $direccion->apellidos }}</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <div class="flex p-4 md:p-5 gap-x-4">
                <div
                    class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                    <svg class="flex-shrink-0 text-gray-600 size-5 dark:text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M5 22h14" />
                        <path d="M5 2h14" />
                        <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                        <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                    </svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs tracking-wide text-gray-500 uppercase">
                            Fecha del pedido
                        </p>
                    </div>
                    <div class="flex items-center mt-1 gap-x-2">
                        <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                            {{ $pedido->created_at->format('d-m-Y') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <div class="flex p-4 md:p-5 gap-x-4">
                <div
                    class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                    <svg class="flex-shrink-0 text-gray-600 size-5 dark:text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6" />
                        <path d="m12 12 4 10 1.7-4.3L22 16Z" />
                    </svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs tracking-wide text-gray-500 uppercase">
                            Estado del pedido
                        </p>
                    </div>
                    <div class="flex items-center mt-1 gap-x-2">
                        @switch($pedido->estado)
                            @case('Nuevo')
                                <span class="px-3 py-1 text-white bg-blue-500 rounded shadow">{{ $pedido->estado }}</span>
                            @break

                            @case('Procesando')
                                <span class="px-3 py-1 text-white bg-yellow-500 rounded shadow">{{ $pedido->estado }}</span>
                            @break

                            @case('Enviado')
                                <span class="px-3 py-1 text-white bg-purple-500 rounded shadow">{{ $pedido->estado }}</span>
                            @break

                            @case('Entregado')
                                <span class="px-3 py-1 text-white bg-green-500 rounded shadow">{{ $pedido->estado }}</span>
                            @break

                            @case('Cancelado')
                                <span class="px-3 py-1 text-white bg-red-500 rounded shadow">{{ $pedido->estado }}</span>
                            @break

                            @default
                                <span class="px-3 py-1 text-white bg-orange-500 rounded shadow">{{ $pedido->estado }}</span>
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
            <div class="flex p-4 md:p-5 gap-x-4">
                <div
                    class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
                    <svg class="flex-shrink-0 text-gray-600 size-5 dark:text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z" />
                        <path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        <path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2" />
                        <path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2" />
                    </svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs tracking-wide text-gray-500 uppercase">
                            Estado de pago
                        </p>
                    </div>
                    <div class="flex items-center mt-1 gap-x-2">
                        @switch($pedido->estado_pago)
                            @case('Pendiente')
                                <span
                                    class="px-3 py-1 text-white bg-yellow-500 rounded shadow">{{ $pedido->estado_pago }}</span>
                            @break

                            @case('Pagado')
                                <span class="px-3 py-1 text-white bg-green-500 rounded shadow">{{ $pedido->estado_pago }}</span>
                            @break

                            @case('Fallido')
                                <span class="px-3 py-1 text-white bg-red-500 rounded shadow">{{ $pedido->estado_pago }}</span>
                            @break

                            @default
                                <span class="px-3 py-1 text-white bg-gray-500 rounded shadow">{{ $pedido->estado_pago }}</span>
                        @endswitch
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Grid -->


    <div class="flex flex-col gap-4 mt-4 md:flex-row">
        <div class="space-y-4 md:w-3/4">
            <!-- Product Table Card -->
            <div class="p-4 overflow-x-auto bg-white rounded-lg shadow-md md:p-6">
                <!-- Tabla para pantallas medianas y grandes -->
                <table class="hidden w-full md:table">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2 font-semibold text-left text-slate-700">Producto</th>
                            <th class="py-2 font-semibold text-left text-slate-700">Precio</th>
                            <th class="py-2 font-semibold text-left text-slate-700">Cantidad</th>
                            <th class="py-2 font-semibold text-left text-slate-700">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido_items as $item)
                            <tr class="border-b last:border-b-0">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img class="object-cover w-16 h-16 mr-4 rounded"
                                            src="{{ Storage::url($item->producto->images[0]) }}"
                                            alt="{{ $item->producto->nombre }}">
                                        <span class="font-semibold text-slate-800">{{ $item->producto->nombre }}</span>
                                    </div>
                                </td>
                                <td class="py-4 text-slate-600">S/. {{ number_format($item->producto->precio, 2) }}
                                </td>
                                <td class="py-4 text-slate-600">
                                    <span class="block w-8 text-center">{{ $item->cantidad }}</span>
                                </td>
                                <td class="py-4 font-semibold text-slate-800">S/.
                                    {{ number_format($item->subtotal, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Vista de tarjetas para dispositivos móviles -->
                <div class="space-y-4 md:hidden">
                    @foreach ($pedido_items as $item)
                        <div class="p-4 border rounded-lg shadow-sm">
                            <div class="flex items-center mb-3">
                                <img class="object-cover w-16 h-16 mr-3 rounded"
                                    src="{{ Storage::url($item->producto->images[0]) }}"
                                    alt="{{ $item->producto->nombre }}">
                                <span class="font-semibold text-slate-800">{{ $item->producto->nombre }}</span>
                            </div>
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div class="text-slate-500">Precio:</div>
                                <div class="font-medium text-slate-700">S/.
                                    {{ number_format($item->producto->precio, 2) }}</div>

                                <div class="text-slate-500">Cantidad:</div>
                                <div class="font-medium text-slate-700">{{ $item->cantidad }}</div>

                                <div class="text-slate-500">Total:</div>
                                <div class="font-semibold text-slate-800">S/. {{ number_format($item->subtotal, 2) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Shipping Address Card -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h1 class="mb-4 text-xl font-bold text-slate-700">Dirección de envio</h1>
                <div class="flex flex-col justify-between space-y-4 sm:flex-row sm:space-y-0">
                    <div class="flex-grow pr-4">
                        <p class="text-slate-600">
                            {{ $direccion->departamento . ', ' . $direccion->provincia . ', ' . $direccion->distrito . ', ' . $direccion->ciudad . ', ' . $direccion->direccion_calle }}
                        </p>
                    </div>
                    <div class="sm:text-right">
                        <p class="font-semibold text-slate-700">Telefono:</p>
                        <p class="text-slate-600">{{ $direccion->telefono }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Summary Card -->
        <div class="md:w-1/4">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="mb-4 text-lg font-semibold text-slate-700">Resumen</h2>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-slate-600">Subtotal</span>
                        <span class="text-slate-800">S/ {{ number_format($pedido->total, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-600">IGV (18%)</span>
                        <span class="text-slate-800">S/. 0.00</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-600">Envío</span>
                        <span class="text-slate-800">S/. 0.00</span>
                    </div>
                    <hr class="my-2 border-t border-slate-200">
                    <div class="flex justify-between">
                        <span class="font-bold text-slate-800">Total General</span>
                        <span class="font-bold text-slate-800">S/ {{ number_format($pedido->total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ```
</div>
