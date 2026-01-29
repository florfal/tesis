<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.5;">
    <h2>¡Gracias por tu compra!</h2>

    <p>Hola <strong>{{ $compra->nombre }}</strong>,</p>

    <p>Recibimos tu pedido para el evento:</p>

    <div style="padding:12px; border:1px solid #ddd; border-radius:10px;">
        <p style="margin:0;"><strong>{{ $evento->titulo }}</strong></p>
        <p style="margin:6px 0 0 0;">📍 {{ $evento->ubicacion }}</p>
        <p style="margin:6px 0 0 0;">Cantidad: <strong>{{ $compra->cantidad }}</strong></p>

        @php
            $precioUnit = $compra->precio_unitario;
        @endphp

        <p style="margin:6px 0 0 0;">
            Precio:
            @if(is_null($precioUnit))
                <strong>A confirmar</strong>
            @elseif((int)$precioUnit === 0)
                <strong>Gratis</strong>
            @else
                <strong>${{ number_format($precioUnit, 0, ',', '.') }}</strong> por persona
            @endif
        </p>

        @if(!is_null($compra->total))
            <p style="margin:6px 0 0 0;">
                Total: <strong>${{ number_format($compra->total, 0, ',', '.') }}</strong>
            </p>
        @endif

        <p style="margin:10px 0 0 0;">
            Estado: <strong>{{ $compra->estado }}</strong>
        </p>
    </div>

    <p style="margin-top:16px;">
        Te vamos a contactar al mail <strong>{{ $compra->email }}</strong> con los próximos pasos.
    </p>

    <p>— Vivra</p>
</body>
</html>
