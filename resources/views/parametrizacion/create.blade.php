@extends('layouts.master')
@section('title')
@lang('translation.create-product')
@endsection
@section('css')
<link href="{{ asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('build/css/style.css') }}">
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

<form action="{{ route('parametrizacion.store') }}" method="POST" enctype="multipart/form-data" id="createproduct-form" autocomplete="off" class="needs-validation">
    @csrf
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentario</label>
                        <textarea required class="form-control" id="comentario" name="comentario" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="parametro" class="form-label">Tipo de Parámetro</label>
                        <select class="form-select" id="parametro" name="parametro" required onchange="mostrarCampo()">
                            <option value="">Seleccionar tipo de parámetro</option>
                            <option value="1">Nuevo parámetro</option>
                            <option value="2">Nueva categoría</option>
                        </select>
                    </div>

                    <div id="campo_nombre" style="display:none;">
                        <label for="nombre_categoria" class="form-label">Nombre del parámetro</label>
                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" pattern="[a-zA-Z\s]+" oninput="bloquearComillas('nombre_categoria')">
                        <p id="mensajeError_categoria" class="error"></p>
                    </div>

                    <div id="campo_nombre2" style="display:none;">
                        <label for="nombre_sub_categoria" class="form-label">Nombre de la subcategoría</label>
                        <input type="text" class="form-control" id="nombre_sub_categoria" name="nombre_sub_categoria" pattern="[a-zA-Z\s]+" oninput="bloquearComillas('nombre_sub_categoria')">
                        <p id="mensajeError" class="error"></p>
                    </div>

                    <div id="campo_categoria" style="display:none;">
                        <label for="categoria" class="form-label">Categorías</label>
                        <select class="form-select" id="categoria" name="categoria">
                            <option value="">Seleccionar categoría</option>
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="campo_estado" style="display:none;">
                        <label for="estado_categoria" class="form-label">Estado</label>
                        <select class="form-select" id="estado_categoria" name="estado_categoria">
                            <option value="">Seleccionar estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="user-details">
            <div class="button">
                <input onclick="return validarCampoNombre()" type="submit" name="submit" value="Enviar">
            </div>
        </div>
    </div>
</form>

<script>
    function bloquearComillas(id) {
        var input = document.getElementById(id);
        input.value = input.value.replace(/['="]/g, '');
    }

    function validarCampoNombre() {
        var texto = document.getElementById("nombre_categoria").value;
        var patron = /^[a-zA-Z\s]+$/;

        if (!patron.test(texto)) {
            document.getElementById("mensajeError_categoria").textContent = "El texto contiene caracteres no permitidos";
            return false;
        }

        var comentario = document.getElementById("comentario").value;

        if (comentario.includes("'") || comentario.includes('"')) {
            document.getElementById("mensajeError_comentario").textContent = "El comentario contiene comillas";
            return false;
        }

        return true;
    }

    function mostrarCampo() {
        var tipoParametrizacion = document.getElementById("parametro").value;
        var campoNombre = document.getElementById("campo_nombre");
        var campoNombre2 = document.getElementById("campo_nombre2");
        var campoCategoria = document.getElementById("campo_categoria");
        var campoEstado = document.getElementById("campo_estado");

        if (tipoParametrizacion === "1") {
            campoNombre.style.display = "block";
            campoNombre2.style.display = "none";
            campoCategoria.style.display = "none";
            campoEstado.style.display = "none";
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

@endsection

@section('script')
<script src="{{ asset('build/js/app.js') }}"></script>
@endsection
