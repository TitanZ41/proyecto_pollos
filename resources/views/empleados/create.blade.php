@extends('adminlte::page')

@section('title', 'Nuevo Empleado')

@section('content_header')
    <h1>Nuevo Empleado</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">⬅️Volver</a>
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

        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" maxlength="50"
                       class="form-control @error('nombre') is-invalid @enderror"
                       value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="ci">CI</label>
                <input type="text" name="ci" id="ci" maxlength="8"
                       class="form-control @error('ci') is-invalid @enderror"
                       value="{{ old('ci') }}" required>
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <input type="text" name="rol" id="rol" maxlength="15"
                       class="form-control @error('rol') is-invalid @enderror"
                       value="{{ old('rol') }}" required>
            </div>

            <div class="form-group">
                <label for="turno">Turno</label>
                <input type="text" name="turno" id="turno" maxlength="10"
                       class="form-control @error('turno') is-invalid @enderror"
                       value="{{ old('turno') }}" required>
            </div>

            <div class="form-group">
                <label for="sueldo">Sueldo</label>
                <input type="number" step="0.01" min="0" name="sueldo" id="sueldo"
                       class="form-control @error('sueldo') is-invalid @enderror"
                       value="{{ old('sueldo') }}" required>
            </div>

            <button type="submit" class="btn btn-success">💾Guardar</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
</div>

@stop
@section('css')
@stop

@section('js')
    <script>console.log('Vista: empleados create');</script>
@stop