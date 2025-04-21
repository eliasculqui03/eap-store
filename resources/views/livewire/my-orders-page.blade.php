<div class="w-full max-w-[85rem] min-h-[60vh] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-slate-500">Mis pedidos</h1>
    <div class="flex flex-col p-5 mt-4 bg-white rounded shadow-lg">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">Pedido</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">Fecha</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">Estado del
                                    pedido</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">Estado de
                                    pago </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start">Total</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end">Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($pedidos as $pedido)
                                <tr wire:key='{{ $pedido->id }}'
                                    class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                                    <td
                                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap dark:text-gray-200">
                                        {{ $pedido->id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                        {{ $pedido->created_at }}</td>

                                    <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                        @switch($pedido->estado)
                                            @case('Nuevo')
                                                <span
                                                    class="px-3 py-1 text-white bg-indigo-500 rounded shadow">{{ $pedido->estado }}</span>
                                            @break

                                            @case('Procesando')
                                                <span
                                                    class="px-3 py-1 text-white bg-yellow-500 rounded shadow">{{ $pedido->estado }}</span>
                                            @break

                                            @case('Enviado')
                                                <span
                                                    class="px-3 py-1 text-white bg-purple-500 rounded shadow">{{ $pedido->estado }}</span>
                                            @break

                                            @case('Entregado')
                                                <span
                                                    class="px-3 py-1 text-white bg-green-500 rounded shadow">{{ $pedido->estado }}</span>
                                            @break

                                            @case('Cancelado')
                                                <span
                                                    class="px-3 py-1 text-white bg-red-500 rounded shadow">{{ $pedido->estado }}</span>
                                            @break

                                            @default
                                                <span
                                                    class="px-3 py-1 text-white bg-orange-500 rounded shadow">{{ $pedido->estado }}</span>
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                        @switch($pedido->estado_pago)
                                            @case('Pendiente')
                                                <span
                                                    class="px-3 py-1 text-white bg-yellow-500 rounded shadow">{{ $pedido->estado_pago }}</span>
                                            @break

                                            @case('Pagado')
                                                <span
                                                    class="px-3 py-1 text-white bg-green-500 rounded shadow">{{ $pedido->estado_pago }}</span>
                                            @break

                                            @case('Fallido')
                                                <span
                                                    class="px-3 py-1 text-white bg-red-500 rounded shadow">{{ $pedido->estado_pago }}</span>
                                            @break

                                            @default
                                                <span
                                                    class="px-3 py-1 text-white bg-gray-500 rounded shadow">{{ $pedido->estado_pago }}</span>
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap dark:text-gray-200">
                                        S/. {{ number_format($pedido->total, 2) }}</td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-end">
                                        <a href="{{ route('orders.show', $pedido->id) }}"
                                            class="px-4 py-2 text-white rounded-md bg-slate-600 hover:bg-slate-500">Ver
                                            detalles</a>
                                    </td>
                                </tr>
                            @endforeach




                        </tbody>
                    </table>
                </div>
            </div>

            {{ $pedidos->links() }}
        </div>
    </div>
</div>
