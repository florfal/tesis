@extends('layouts.main')

@section('title', 'Compra - ' . $evento->titulo)

@section('content')
<div class="container" style="padding: 20px; max-width: 650px;">

    <a href="{{ route('event', ['id' => $evento->evento_id]) }}" style="text-decoration:none;">
        <div class="back-button">&#8592;</div>
    </a>

    <h2 style="margin-top: 10px;">Finalizar compra</h2>

    <div style="margin: 15px 0; padding: 12px; border-radius: 12px; background: #f2f2f2;">
        <div style="font-weight:600;">{{ $evento->titulo }}</div>
        <div style="opacity:.8;">📍 {{ $evento->ubicacion }}</div>

        @php
            $precio = $evento->precio;
            $precioTexto = is_null($precio) ? 'A confirmar' : ((int)$precio === 0 ? 'Gratis' : '$' . number_format($precio, 0, ',', '.'));
        @endphp

        <div style="margin-top:6px;">Precio: <strong>{{ $precioTexto }}</strong></div>
    </div>

    @if(session('success'))
        <div style="background:#e8ffe8; border:1px solid #b9f1b9; padding:12px; border-radius:12px; margin-bottom:12px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background:#ffe8e8; border:1px solid #f1b9b9; padding:12px; border-radius:12px; margin-bottom:12px;">
            <strong>Revisá estos campos:</strong>
            <ul style="margin:8px 0 0 18px;">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('checkout.store', ['id' => $evento->evento_id]) }}">
        @csrf

        <div style="margin-bottom: 12px;">
            <label style="display:block; margin-bottom:6px;">Nombre y apellido</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" required>
        </div>

        <div style="margin-bottom: 12px;">
            <label style="display:block; margin-bottom:6px;">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>

        <div style="margin-bottom: 12px;">
            <label style="display:block; margin-bottom:6px;">Teléfono (opcional)</label>
            <input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control">
        </div>

        <div style="margin-bottom: 16px;">
            <label style="display:block; margin-bottom:6px;">Cantidad</label>
            <input type="number" name="cantidad" value="{{ old('cantidad', 1) }}" min="1" max="10" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%; border-radius: 12px; padding: 12px;">
            Confirmar
        </button>

        <div style="text-align:center; margin-top:10px; opacity:.7; font-size: 13px;">
            Esto es un formulario base. Después lo conectamos con pago real (MercadoPago, etc.).
        </div>
    </form>

</div>
@endsection
