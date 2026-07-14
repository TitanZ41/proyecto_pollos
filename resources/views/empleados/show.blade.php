@extends('adminlte::page')

@section('title', 'Empleado')

@section('content_header')
    <h1>Detalle del Empleado</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">⬅️Volver</a>
    <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning">📝Editar</a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $empleado->nombre }}</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 200px;">ID</th>
                <td>{{ $empleado->id }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $empleado->nombre }}</td>
            </tr>
            <tr>
                <th>CI</th>
                <td>{{ $empleado->ci }}</td>
            </tr>
            <tr>
                <th>Rol</th>
                <td>{{ $empleado->rol }}</td>
            </tr>
            <tr>
                <th>Turno</th>
                <td>{{ $empleado->turno }}</td>
            </tr>
            <tr>
                <th>Sueldo</th>
                <td>{{ number_format($empleado->sueldo, 2) }}</td>
            </tr>
        </table>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
    <script>console.log('Vista: empleados show');</script>
@stop