@extends('layouts.master')
@section('title')
@lang('translation.editar-product')
@endsection
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
<link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
Proveedores
@endslot
@slot('title')
Editar insumos
@endslot
@endcomponent

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
                    <form action="{{ route('insumos.update', $insumo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Campos del formulario de edición -->
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
                                                <input type="text" class="form-control" id="imagen" name="nombre" value="{{ $insumo->nombre }}" required>
                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <label for="choices-publish-status-input" class="form-label">Categoría de insumos</label>
                                            </div>
                                            <div class="card-body">
                                                <select class="form-select" id="choices-publish-status-input" name="categ" data-choices data-choices-search-false>
                                                    @foreach($categorias as $categoria)
                                                        <option value="{{ $categoria->nombre_categoria }}" @if($insumo->categoria && $categoria->nombre_categoria == $insumo->categoria->nombre_categoria) selected @endif>{{ $categoria->nombre_categoria }}</option>
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
                                                <label for="choices-publish-status-input" class="form-label">Subcategoría</label>
                                            </div>
                                            <div class="card-body">
                                                <select class="form-select" id="choices-publish-status-input" name="subcateg" data-choices data-choices-search-false required>
                                                    <!-- Opciones de subcategorías -->
                                                    @foreach($subcategorias as $subcategoria)
                                                        <option value="{{ $subcategoria->id }}" @if($subcategoria->id == $insumo->subcateg) selected @endif>{{ $subcategoria->nombre_sub_categoria }}</option>
                                                    @endforeach
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
                                                <input type="text" class="form-control" id="tags-input" name="tags" value="{{ $insumo->tags }}">
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
                                                            <option value="{{ $subcategoria->nombre_sub_categoria }}" @if($subcategoria->nombre_sub_categoria == $insumo->color) selected @endif>{{ $subcategoria->nombre_sub_categoria }}</option>
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
                                                            <option value="{{ $subcategoria->nombre_sub_categoria }}" @if($subcategoria->nombre_sub_categoria == $insumo->unidad) selected @endif>{{ $subcategoria->nombre_sub_categoria }}</option>
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
                                            <textarea class="form-control" id="descripcion-input" name="descripcion" rows="3">{{ $insumo->descripcion }}</textarea>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                        <!-- Otros campos del formulario -->
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    // Obtener el valor actual de la categoría seleccionada
    var categoriaSeleccionada = '{{ $insumo->categ }}';

    // Filtrar las opciones de subcategoría basadas en la categoría seleccionada
    var subcategorias = @json($subcategorias);
    var opcionesSubcategoria = subcategorias.filter(function(subcategoria) {
        return subcategoria.id_categ === categoriaSeleccionada;
    });

    // Actualizar las opciones del select de subcategoría con las opciones filtradas
    var selectSubcategoria = document.getElementById('choices-publish-status-input');
    selectSubcategoria.innerHTML = ''; // Limpiar las opciones actuales
    opcionesSubcategoria.forEach(function(subcategoria) {
        var option = document.createElement('option');
        option.value = subcategoria.id;
        option.text = subcategoria.nombre_sub_categoria;
        if (subcategoria.id === '{{ $insumo->subcateg }}') {
            option.selected = true;
        }
        selectSubcategoria.appendChild(option);
    });
</script>
@endpush
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
