<x-mail::message>
    # Pedido realizado satisfactoriamente

    Gracias por tu compra. Tu numero de pedido es: {{ $pedido->id }}.

    <x-mail::button :url="$url">
        Ver pedido
    </x-mail::button>

    Gracias, <br>
    {{ config('app.name') }}
</x-mail::message>
