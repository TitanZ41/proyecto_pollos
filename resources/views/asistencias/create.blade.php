@extends('adminlte::page')

@section('title', 'Nueva Asistencia')

@section('content_header')
    <h1>Nueva Asistencia</h1>
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

        <form action="{{ route('asistencias.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="id_empleado">Empleado</label>
                <select name="id_empleado" id="id_empleado"
                        class="form-control @error('id_empleado') is-invalid @enderror" required>
                    <option value=""> Seleccione </option>
                    @foreach ($empleados as $emp)
                        <option value="{{ $emp->id }}" {{ old('id_empleado') == $emp->id ? 'selected' : '' }}>
                            {{ $emp->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_hora">Fecha</label>
                <input type="date" name="fecha_hora" id="fecha_hora"
                       class="form-control @error('fecha_hora') is-invalid @enderror"
                       value="{{ old('fecha_hora') }}" required>
            </div>

            <div class="form-group">
                <label for="hora_entrada">Hora Entrada</label>
                <input type="time" step="1" name="hora_entrada" id="hora_entrada"
                       class="form-control @error('hora_entrada') is-invalid @enderror"
                       value="{{ old('hora_entrada') }}">
            </div>

            <div class="form-group">
                <label for="hora_salida">Hora Salida</label>
                <input type="time" step="1" name="hora_salida" id="hora_salida"
                       class="form-control @error('hora_salida') is-invalid @enderror"
                       value="{{ old('hora_salida') }}">
            </div>

            <button type="submit" class="btn btn-success">💾Guardar</button>
            <a href="{{ route('asistencias.index') }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
    <script>console.log('Vista: asistencias create');</script>
@stop