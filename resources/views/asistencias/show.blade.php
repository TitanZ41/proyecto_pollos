@extends('adminlte::page')

@section('title', 'Asistencia')

@section('content_header')
    <h1>Detalle de la Asistencia</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">⬅️Volver</a>
    <a href="{{ route('asistencias.edit', $asistencia) }}" class="btn btn-warning">📝Editar</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 200px;">ID</th>
                <td>{{ $asistencia->id }}</td>
            </tr>
            <tr>
                <th>Empleado</th>
                <td>{{ $asistencia->empleado->nombre ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Fecha</th>
                <td>{{ $asistencia->fecha_hora }}</td>
            </tr>
            <tr>
                <th>Hora Entrada</th>
                <td>{{ $asistencia->hora_entrada }}</td>
            </tr>
            <tr>
                <th>Hora Salida</th>
                <td>{{ $asistencia->hora_salida }}</td>
            </tr>
        </table>
    </div>
</div>

@stop

@section('css')
@stop
@section('js')
    <script>console.log('Vista: asistencias show');</script>
@stop