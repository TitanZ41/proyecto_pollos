@extends('adminlte::page')

@section('title', 'inventarios')

@section('content_header')
    <h1>Gestión de Inventarios</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('inventarios.create') }}" class="btn btn-success">➕Nuevo Inventario</a>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Stock Actual</th>
                    <th>Stock minimo</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventarios as $inventario)
                <tr>
                    <td>{{ $inventario->id }}</td>
                    <td>{{ $inventario->producto }}</td>
                    <td>{{ $inventario->stock_actual }}</td>
                    <td>{{ $inventario->stock_minimo }}</td>
                    <td>{{ $inventario->precio }}</td>
                    <td>
                        <a href="{{ route('inventarios.show', $inventario) }}" class="btn btn-info btn-sm">👁️Ver</a>
                        <a href="{{ route('inventarios.edit', $inventario) }}" class="btn btn-warning btn-sm">📝Editar</a>
                        <form action="{{ route('inventarios.destroy', $inventario) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Esta seguro de eliminar el inventario')">🗑️Eliminar</button>
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
    <script>console.log('Vista: inventarios index');</script>
@stop   