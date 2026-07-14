@extends('adminlte::page')

@section('title', 'Editar Asistencia')

@section('content_header')
    <h1>Editar Asistencia</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">⬅️Volver</a>
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

        <form action="{{ route('asistencias.update', $asistencia) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id_empleado">Empleado</label>
                <select name="id_empleado" id="id_empleado"
                        class="form-control @error('id_empleado') is-invalid @enderror" required>
                    @foreach ($empleados as $emp)
                        <option value="{{ $emp->id }}" {{ old('id_empleado', $asistencia->id_empleado) == $emp->id ? 'selected' : '' }}>
                            {{ $emp->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_hora">Fecha</label>
                <input type="date" name="fecha_hora" id="fecha_hora"
                       class="form-control @error('fecha_hora') is-invalid @enderror"
                       value="{{ old('fecha_hora', $asistencia->fecha_hora) }}" required>
            </div>

            <div class="form-group">
                <label for="hora_entrada">Hora Entrada</label>
                <input type="time" step="1" name="hora_entrada" id="hora_entrada"
                       class="form-control @error('hora_entrada') is-invalid @enderror"
                       value="{{ old('hora_entrada', $asistencia->hora_entrada) }}">
            </div>

            <div class="form-group">
                <label for="hora_salida">Hora Salida</label>
                <input type="time" step="1" name="hora_salida" id="hora_salida"
                       class="form-control @error('hora_salida') is-invalid @enderror"
                       value="{{ old('hora_salida', $asistencia->hora_salida) }}">
            </div>

            <button type="submit" class="btn btn-warning">💾Actualizar</button>
            <a href="{{ route('asistencias.index') }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
</div>

@stop

@section('css')
@stop
@section('js')
    <script>console.log('Vista: asistencias edit');</script>
@stop