<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Realizado - {{ config('app.name') }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .email-header {
            background-color: #2d3748;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .email-body {
            padding: 30px;
        }

        .email-footer {
            background-color: #f4f4f4;
            color: #666;
            text-align: center;
            padding: 15px;
            font-size: 12px;
        }

        .order-details {
            background-color: #f9f9f9;
            border-left: 4px solid #2d3748;
            padding: 15px;
            margin: 20px 0;
        }

        .cta-button {
            display: inline-block;
            background-color: #2d3748;
            color: #ffffff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 15px;
        }

        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100%;
                border-radius: 0;
            }

            .email-body {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            {{-- <img src="{{ public_path('logo.png') }}" alt="{{ config('app.name') }} Logo" class="logo"> --}}
            <h1>Pedido Realizado</h1>
        </div>

        <div class="email-body">
            <h2>¡Gracias por tu compra!</h2>

            <div class="order-details">
                <h3>Detalles del Pedido</h3>
                <p>Número de Pedido: <strong>{{ $pedido->id }}</strong></p>
                <p>Fecha de Pedido: <strong>{{ now()->format('d/m/Y H:i') }}</strong></p>
            </div>

            <p>Hemos recibido tu pedido y lo estamos procesando. Puedes ver los detalles completos haciendo clic en el
                siguiente botón:</p>

            <a href="{{ $url }}" class="cta-button">Ver Detalles del Pedido</a>

            <p>Si tienes alguna pregunta sobre tu pedido, no dudes en contactarnos.</p>

            <p>Gracias por elegir {{ config('app.name') }}.</p>
        </div>

        <div class="email-footer">
            <p>&copy; {{ now()->year }} {{ config('app.name') }}. Todos los derechos reservados.</p>
            <p>Dirección de contacto | Teléfono | Correo electrónico</p>
        </div>
    </div>
</body>

</html>
