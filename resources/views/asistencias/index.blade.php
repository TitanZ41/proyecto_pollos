@extends('adminlte::page')

@section('title', 'Asistencias')

@section('content_header')
    <h1>Gestión de Asistencias</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('asistencias.create') }}" class="btn btn-success">➕Nueva Asistencia</a>
</div>

<div class="card">
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Empleado</th>
                    <th>Fecha</th>
                    <th>Hora Entrada</th>
                    <th>Hora Salida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asistencias as $asis)
                <tr>
                    <td>{{ $asis->id }}</td>
                    <td>{{ $asis->empleado->nombre ?? 'N/A' }}</td>
                    <td>{{ $asis->fecha_hora }}</td>
                    <td>{{ $asis->hora_entrada }}</td>
                    <td>{{ $asis->hora_salida }}</td>
                    <td>
                        <a href="{{ route('asistencias.show', $asis) }}" class="btn btn-info btn-sm">👁️Ver</a>
                        <a href="{{ route('asistencias.edit', $asis) }}" class="btn btn-warning btn-sm">📝Editar</a>
                        <form action="{{ route('asistencias.destroy', $asis) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Esta seguro de eliminar esta asistencia?')">🗑️Eliminar</button>
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
    <script>console.log('Vista: asistencias index');</script>
@stop