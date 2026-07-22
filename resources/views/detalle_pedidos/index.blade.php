@extends('adminlte::page')

@section('title', 'Detalles de Pedidos')

@section('content_header')
    <h1>Gestión de Detalles de Pedidos</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('detalle_pedidos.create') }}" class="btn btn-success">➕Nuevo Detalle de Pedido</a>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Cantidad</th>
                    <th>Sub total</th>
                    <th>Acciones</th>
                   
        
                </tr>
            </thead>
            <tbody>
                @foreach ($detalle_pedidos as $detalle)
                <tr>
                    <td>{{ $detalle->id }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->subtotal }}</td>
                    
                    <td>
                        <a href="{{ route('detalle_pedidos.show', $detalle) }}" class="btn btn-info btn-sm">👁️Ver</a>
                        <a href="{{ route('detalle_pedidos.edit', $detalle) }}" class="btn btn-warning btn-sm">📝Editar</a>
                        <form action="{{ route('detalle_pedidos.destroy', $detalle) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Esta seguro de eliminar este detalle de pedido')">🗑️Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
    <script>console.log('Vista: detalle_pedidos index');</script>
@stop