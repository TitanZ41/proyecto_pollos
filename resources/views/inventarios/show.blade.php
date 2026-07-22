@extends('adminlte::page')

@section('title', 'detalle inventario')

@section('content_header')
    <h1>Detalle del Inventario</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('inventarios.index') }}" class="btn btn-secondary">⬅️Volver</a>
    <a href="{{ route('inventarios.edit', $inventario) }}" class="btn btn-warning">📝Editar</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 200px;">ID</th>
                <td>{{ $inventario->id }}</td>
            </tr>
            <tr>
                <th>Producto</th>
                <td>{{ $inventario->producto }}</td>
            </tr>
            <tr>
                <th>Stock Actual</th>
                <td>{{ $inventario->stock_actual }}</td>
            </tr>
            <tr>
                <th>Stock Mínimo</th>
                <td>{{ $inventario->stock_minimo }}</td>
            </tr>
            <tr>
                <th>Precio</th>
                <td>{{ $inventario->precio }}</td>
            </tr>
        </table>
    </div>
</div>

@stop

@section('css')
@stop
@section('js')
    <script>console.log('Vista: inventarios show');</script>
@stop