@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- edit.blade.php -->
                    <form action="{{ route('insumos.update', $insumo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Campos del formulario de edición -->
                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $insumo->nombre }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control" id="tags" name="tags" value="{{ $insumo->tags }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" value="{{ $insumo->precio }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ $insumo->stock }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="descuento">Descuento</label>
                            <input type="number" class="form-control" id="descuento" name="descuento" value="{{ $insumo->descuento }}">
                        </div>
                        <div class="mb-3">
                            <label for="color">Color</label>
                            <input type="text" class="form-control" id="color" name="color" value="{{ $insumo->color }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="unidad">Unidad</label>
                            <input type="text" class="form-control" id="unidad" name="unidad" value="{{ $insumo->unidad }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="ancho">Ancho</label>
                            <input type="number" class="form-control" id="ancho" name="ancho" value="{{ $insumo->ancho }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="material">Material</label>
                            <input type="text" class="form-control" id="material" name="material" value="{{ $insumo->material }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado" required>
                                <option value="1" {{ $insumo->estado == 1 ? 'selected' : '' }}>Terminado</option>
                                <option value="0" {{ $insumo->estado == 0 ? 'selected' : '' }}>Producción</option>
                            </select>
                        </div>
                        <!-- Otros campos del formulario -->
                    
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                    
                    

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
