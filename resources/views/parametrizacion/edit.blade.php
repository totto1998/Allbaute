@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- edit.blade.php -->
                    <form action="{{ route('parametrizacion.update', $param->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Campos del formulario de edición -->
                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $param->nombre }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $param->descripcion }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_parametrizacion">Tipo de Parametrización</label>
                            <select class="form-control" id="tipo_parametrizacion" name="tipo_parametrizacion" required>
                                @foreach ($tiposParametrizacion as $tipo)
                                    <option value="{{ $tipo->id }}" {{ $param->tipoParametrizacion->id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado" required>
                                <option value="1" {{ $param->estado == 1 ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ $param->estado == 0 ? 'selected' : '' }}>Inactivo</option>
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
