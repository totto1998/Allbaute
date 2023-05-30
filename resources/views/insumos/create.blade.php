<!DOCTYPE html>
<html>
<head>
    <title>Crear insumos</title>
</head>
<body>

@extends('layouts.master')
@section('title')
@lang('translation.create-product')
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
<link rel="stylesheet" href="{{ URL::asset('build/css/styledrop.css') }}">
<link rel="stylesheet" href="{{ URL::asset('build/css/style.css') }}">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
Insumos
@endslot
@slot('title')
Crear insumos
@endslot
@endcomponent

<div class="">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <form action="{{ route('insumos.store') }}" method="POST" enctype="multipart/form-data" id="createproduct-form" autocomplete="off" class="needs-validation" onsubmit="return validarCampos();">
                @csrf

                <div class="card">
                    <div class="card-body">
                        
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <label for="img" class="form-label">Imagen</label>
                                </div>
                                <div class="card-body">
                                    <input type="file" class="form-control" id="img" name="img" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <label for="nombre" class="form-label">Nombre</label>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" id="imagen" name="nombre" required oninput="bloquearComillas('imagen');">
                                    </div> 
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <label for="choices-publish-status-input" class="form-label">Categoria de insumos</label>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="choices-publish-status-input" name="categ" data-choices data-choices-search-false>
                                            <option value="">Selecciona una opción</option>
                                            @foreach($categorias as $categoria)
                                                @if($categoria->tipo === 1)
                                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <label for="subcategoria-input" class="form-label">Subcategoria</label>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="subcategoria-input" name="subcateg" data-choices data-choices-search-false required>
                                            <option value="">Selecciona una opción</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <label for="choices-publish-status-input" class="form-label">Tags</label>
                                    </div>
                                    <div class="card-body">
                                        <input type="text" class="form-control" id="tags-input" name="tags">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <label for="choices-publish-status-input" class="form-label">Color</label>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="color-input" name="color">
                                            @foreach($subcategorias as $subcategoria)
                                                @if($subcategoria->id_categ == 3) {{-- Filtrar por el id_categ de "Colores" --}}
                                                    <option value="{{ $subcategoria->nombre_sub_categoria }}">{{ $subcategoria->nombre_sub_categoria }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <label for="choices-publish-status-input" class="form-label">Unidad</label>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="unidad-input" name="unidad">
                                            @foreach($subcategorias as $subcategoria)
                                                @if($subcategoria->id_categ == 4) {{-- Filtrar por el id_categ de "Unidad" --}}
                                                    <option value="{{ $subcategoria->nombre_sub_categoria }}">{{ $subcategoria->nombre_sub_categoria }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="descripcion-input" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion-input" name="descripcion" rows="3" oninput="bloquearComillas('descripcion-input');"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Registrar producto</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script>
    function bloquearComillas(id) {
        var input = document.getElementById(id);
        input.value = input.value.replace(/['="]/g, '');
    }

    function validarCampos() {
        var tipoParametrizacion = document.getElementById("parametro").value;
        if (tipoParametrizacion === "1") {
            var texto = document.getElementById("nombre_categoria").value;
            var patron = /^[a-zA-Z\s]+$/;
            if (!patron.test(texto)) {
                document.getElementById("mensajeError_categoria").textContent = "El texto contiene caracteres no permitidos";
                return false;
            }
        } else if (tipoParametrizacion === "2") {
            var subCategoria = document.getElementById("nombre_sub_categoria").value;
            if (subCategoria.trim() === "") {
                document.getElementById("mensajeError").textContent = "Debe ingresar un nombre de subcategoría";
                return false;
            }
        }
        var comentario = document.getElementById("comentario").value;
        if (comentario.includes("'") || comentario.includes('"')) {
            document.getElementById("mensajeError_comentario").textContent = "El comentario contiene comillas";
            return false;
        }
        return true;
    }
</script>
@endsection

</body>
</html>
