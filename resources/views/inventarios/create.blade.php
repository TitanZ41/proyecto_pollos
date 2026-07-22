@extends('adminlte::page')

@section('title', 'Nuevo Detalle del pedido')

@section('content_header')
    <h1>Nuevo Detalle del pedido</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="{{ route('inventarios.index') }}" class="btn btn-secondary">⬅️Volver</a>
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

        <form action="{{ route('inventarios.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="producto">Producto</label>
                <input type="text" name="producto" id="producto"
                       class="form-control @error('producto') is-invalid @enderror"
                       value="{{ old('producto') }}" required>
            </div>

            <div class="form-group">
                <label for="stock_actual">Stock Actual</label>
                <input type="number" step="0.01" name="stock_actual" id="stock_actual"
                       class="form-control @error('stock_actual') is-invalid @enderror"
                       value="{{ old('stock_actual') }}">
            </div>
            <div class="form-group">
                <label for="stock_minimo">Stock Minimo</label>
                <input type="number" step="0.01" name="stock_minimo" id="stock_minimo"
                       class="form-control @error('stock_minimo') is-invalid @enderror"
                       value="{{ old('stock_minimo') }}">
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" name="precio" id="precio"
                       class="form-control @error('precio') is-invalid @enderror"
                       value="{{ old('precio') }}">
            </div>


            <button type="submit" class="btn btn-success">💾Guardar</button>
            <a href="{{ route('inventarios.index') }}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
    <script>console.log('Vista: inventarios create');</script>
@stop