@extends('adminlte::page')

@section('title', 'detalle pedido')

@section('content_header')
    <h1>Detalle del Pedido</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('detalle_pedidos.index') }}" class="btn btn-secondary">⬅️Volver</a>
    <a href="{{ route('detalle_pedidos.edit', $detalle_pedido) }}" class="btn btn-warning">📝Editar</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 200px;">ID</th>
                <td>{{ $detalle_pedido->id }}</td>
            </tr>
            <tr>
                <th>pedido</th>
                <td>{{ $detalle_pedido->empleado->nombre ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>inventario</th>
                <td>{{ $detalle_pedido->inventario->nombre ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Cantidad</th>
                <td>{{ $detalle_pedido->cantidad }}</td>
            </tr>
            <tr>
                <th>Subtotal</th>
                <td>{{ $detalle_pedido->subtotal }}</td>
            </tr>
        </table>
    </div>
</div>

@stop

@section('css')
@stop
@section('js')
    <script>console.log('Vista: detalle_pedidos show');</script>
@stop