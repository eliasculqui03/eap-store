<div class="w-full max-w-[100rem] min-h-[60vh] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container px-4 mx-auto">
        <h1 class="mb-4 text-2xl font-semibold">Carrito de compras</h1>
        <div class="flex flex-col gap-4 md:flex-row">
            <!-- Contenedor principal con ancho responsivo -->
            <div class="w-full md:w-3/4">
                <!-- En pantallas móviles, cambiamos a un diseño de tarjetas -->
                <div class="p-4 mb-4 overflow-x-auto bg-white rounded-lg shadow-md">
                    <!-- Tabla visible solo en tabletas y escritorio -->
                    <table class="hidden w-full md:table">
                        <thead>
                            <tr>
                                <th class="font-semibold text-left">Producto</th>
                                <th class="font-semibold text-left">Precio</th>
                                <th class="font-semibold text-left">Cantidad</th>
                                <th class="font-semibold text-left">Total</th>
                                <th class="font-semibold text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carrito_items as $item)
                                <tr wire:key='{{ $item['product_id'] }}'>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <img class="w-16 h-16 mr-4" src="{{ Storage::url($item['image']) }}"
                                                alt="{{ $item['name'] }}">
                                            <span class="font-semibold">{{ $item['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4">S/. {{ number_format($item['unit_amount'], 2) }}</td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <button wire:click="decrementarItem({{ $item['product_id'] }})"
                                                class="px-4 py-2 mr-2 border rounded-md">-</button>
                                            <span class="w-8 text-center">{{ $item['quantity'] }}</span>
                                            <button wire:click="incrementarItem({{ $item['product_id'] }})"
                                                class="px-4 py-2 ml-2 border rounded-md">+</button>
                                        </div>
                                    </td>
                                    <td class="py-4">S/. {{ number_format($item['total_amount'], 2) }}</td>
                                    <td><button wire:click="eliminarItem({{ $item['product_id'] }})"
                                            class="px-3 py-1 border-2 rounded-lg bg-slate-300 border-slate-400 hover:bg-red-500 hover:text-white hover:border-red-700">Eliminar</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="px-10 py-20 text-4xl font-semibold text-center text-slate-500">
                                        No hay productos en el carrito
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Vista de tarjetas para móviles -->
                    <div class="md:hidden">
                        @forelse ($carrito_items as $item)
                            <div wire:key='{{ $item['product_id'] }}' class="p-4 mb-4 border rounded-lg">
                                <div class="flex items-center mb-3">
                                    <img class="w-16 h-16 mr-3" src="{{ Storage::url($item['image']) }}"
                                        alt="{{ $item['name'] }}">
                                    <span class="text-lg font-semibold">{{ $item['name'] }}</span>
                                </div>

                                <div class="grid grid-cols-2 gap-2 mb-3">
                                    <div>
                                        <p class="text-sm text-gray-500">Precio:</p>
                                        <p>S/. {{ number_format($item['unit_amount'], 2) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Total:</p>
                                        <p>S/. {{ number_format($item['total_amount'], 2) }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="mb-1 text-sm text-gray-500">Cantidad:</p>
                                        <div class="flex items-center">
                                            <button wire:click="decrementarItem({{ $item['product_id'] }})"
                                                class="px-3 py-1 mr-2 border rounded-md">-</button>
                                            <span class="w-6 text-center">{{ $item['quantity'] }}</span>
                                            <button wire:click="incrementarItem({{ $item['product_id'] }})"
                                                class="px-3 py-1 ml-2 border rounded-md">+</button>
                                        </div>
                                    </div>
                                    <button wire:click="eliminarItem({{ $item['product_id'] }})"
                                        class="px-3 py-2 text-sm border-2 rounded-lg bg-slate-300 border-slate-400 hover:bg-red-500 hover:text-white hover:border-red-700">
                                        <span wire:loading.remove
                                            wire:target='eliminarItem({{ $item['product_id'] }})'>Eliminar</span><span
                                            wire:target='eliminarItem({{ $item['product_id'] }})'
                                            wire:loading>Eliminando...</span>
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="px-4 py-10 text-2xl font-semibold text-center text-slate-500">
                                No hay productos en el carrito
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h2 class="mb-4 text-lg font-semibold">Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>S/. {{ number_format($this->total_general, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>IGV (18%)</span>
                        <span>S/. 0.00</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Envio</span>
                        <span>S/. 0.00</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Total</span>
                        <span class="font-semibold">S/. {{ number_format($this->total_general, 2) }}</span>
                    </div>

                    @if ($carrito_items)
                        <button class="w-full px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg">Checkout</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
