@extends('layouts.master')
@section('title')
@lang('translation.create-product')
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('build/css/style.css') }}">
@endsection
@section('content')
    @component('components.breadcrumb')
    @slot('li_1')
    Ecommerce
    @endslot
    @slot('title')
    Crear nueva parametrizacion
    @endslot
    @endcomponent

<form action="{{ route('parametrizacion.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea required pattern="[a-zA-Z]+" class="form-control" id="descripcion" name="descripcion" rows="10"></textarea>
                    </div>
                </div>
            </div>

        </div>


        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="tipo_parametrizacion" class="form-label">Tipo de Parámetro</label>
                        <select class="form-select" id="tipo_parametrizacion" name="tipo_parametrizacion" required>
                            <option value="">Seleccionar tipo de parámetro</option>
                            @foreach ($parametrizacion as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="estado">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="">Seleccionar estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
 
            </div>


            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Nombre del parametro</h5>
                </div>

                <div class="card-body">
                    <div>
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required pattern="[a-zA-Z]+">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="content">
        <form action="#">
            <div class="user-details">
                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </div>
        </form>
    </div>
</form>


@endsection

@section('script')
<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection