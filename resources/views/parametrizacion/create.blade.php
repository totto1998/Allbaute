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
                <select class="form-select" id="tipo_parametrizacion" name="tipo_parametrizacion" required onchange="mostrarCampo()">
                    <option value="">Seleccionar tipo de parámetro</option>
                    <option value="1">Nuevo parámetro</option>
                    <option value="2">Nueva categoría</option>
                </select>
            </div>

            <div id="campo_nombre" style="display:none;">
                <label for="nombre" class="form-label">Nombre del parámetro</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required pattern="[a-zA-Z]+">
            </div>

            <div id="campo_nombre2" style="display:none;">
                <label for="nombre_categoria" class="form-label">Nombre de la categoría</label>
                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" required pattern="[a-zA-Z]+">
            </div>

            <div id="campo_categoria" style="display:none;">
                <label for="categoria" class="form-label">Parámetros</label>
                <select class="form-select" id="categoria" name="categoria">
                    <option value="">Seleccionar parámetros</option>
                    <option value="opcion1">Tela</option>
                    <option value="opcion2">Botón</option>
                    <option value="opcion3">Cremallera</option>
                    <option value="opcion4">Metodo de pago</option>
                    <option value="opcion5">Unidad de medida</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>
            </div>

            <div id="campo_estado" style="display:none;">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado">
                    <option value="">Seleccionar estado</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
        </div>
    </div>
</div>

<script>
    function mostrarCampo() {
        var tipoParametrizacion = document.getElementById("tipo_parametrizacion").value;
        var campoNombre = document.getElementById("campo_nombre");
        var campoNombre2 = document.getElementById("campo_nombre2");
        var campoCategoria = document.getElementById("campo_categoria");
        var campoEstado = document.getElementById("campo_estado");

        if (tipoParametrizacion === "1") {
            campoNombre.style.display = "block";
            campoNombre2.style.display = "none";
            campoCategoria.style.display = "none";
            campoEstado.style.display = "block";
        } else if (tipoParametrizacion === "2") {
            campoNombre.style.display = "none";
            campoNombre2.style.display = "block";
            campoCategoria.style.display = "block";
            campoEstado.style.display = "block";
        } else {
            campoNombre.style.display = "none";
            campoNombre2.style.display = "none";
            campoCategoria.style.display = "none";
            campoEstado.style.display = "none";
        }
    }
</script>


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