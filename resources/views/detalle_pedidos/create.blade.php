@extends('adminlte::page')

@section('title', 'Nuevo Detalle del pedido')

@section('content_header')
    <h1>Nuevo Detalle del pedido</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('detalle_pedidos.index') }}" class="btn btn-secondary">⬅️Volver</a>
</div>

<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('detalle_pedidos.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad"
                       class="form-control @error('cantidad') is-invalid @enderror"
                       value="{{ old('cantidad') }}" required>
            </div>

            <div class="form-group">
                <label for="subtotal">Total</label>
                <input type="number" step="0.01" name="subtotal" id="subtotal"
                       class="form-control @error('subtotal') is-invalid @enderror"
                       value="{{ old('subtotal') }}">
            </div>


            <button type="submit" class="btn btn-success">💾Guardar</button>
            <a href="{{ route('detalle_pedidos.index') }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
    <script>console.log('Vista: detalle_pedidos create');</script>
@stop