@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Gestión de Empleados</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('empleados.create') }}" class="btn btn-success">➕Nuevo Empleado</a>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>CI</th>
                    <th>Rol</th>
                    <th>Turno</th>
                    <th>Sueldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $emple)
                <tr>
                    <td>{{ $emple->id }}</td>
                    <td>{{ $emple->nombre }}</td>
                    <td>{{ $emple->ci }}</td>
                    <td>{{ $emple->rol }}</td>
                    <td>{{ $emple->turno }}</td>
                    <td>{{ $emple->sueldo }}</td>
                    <td>
                        <a href="{{ route('empleados.show', $emple) }}" class="btn btn-info btn-sm">👁️Ver</a>
                        <a href="{{ route('empleados.edit', $emple) }}" class="btn btn-warning btn-sm">📝Editar</a>
                        <form action="{{ route('empleados.destroy', $emple) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Esta seguro de eliminar este empleado:?')">🗑️Eliminar</button>
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
    <script>console.log('Vista: empleados index');</script>
@stop
