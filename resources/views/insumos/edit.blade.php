@extends('layouts.master')
@section('title')
@lang('translation.edit-product')
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
<link rel="stylesheet" href="{{ asset('build/css/styledrop.css') }}">
<link rel="stylesheet" href="{{ asset('build/css/style.css') }}">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
Insumos
@endslot
@slot('title')
Editar insumo
@endslot
@endcomponent

<div class="">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <form action="{{ route('insumos.update', $insumo->id) }}" method="POST" enctype="multipart/form-data" id="editproduct-form" autocomplete="off" class="needs-validation">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-body">
                        
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <label for="img" class="form-label">Imagen</label>
                                </div>
                                <div class="card-body">
                                    @if ($insumo->img)
                                        <img src="{{ asset('storage/images/'.$insumo->img) }}" alt="Imagen actual" width="150">
                                    @endif
                                    <input type="file" class="form-control" id="img" name="img">
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
                                        <label for="choices-publish-status-input" class="form-label">Categoria de insumos</label>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="choices-publish-status-input" name="categ" data-choices data-choices-search-false>
                                            @foreach($categorias as $categoria)
                                                @if($categoria->tipo === 1)
                                                    <option value="{{ $categoria->id }}" {{ $categoriaSeleccionada == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre_categoria }}</option>
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
                                        <label for="subcategoria-input" class="form-label">Subcategoría</label>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="subcategoria-input" name="subcateg" data-choices data-choices-search-false required>
                                            @foreach($subcategorias as $subcategoria)
                                                @if($subcategoria->categoria->id === $insumo->categ)
                                                    <option value="{{ $subcategoria->id }}" {{ $insumo->subcategoria_id == $subcategoria->id ? 'selected' : '' }}>{{ $subcategoria->nombre_sub_categoria }}</option>
                                                @endif
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
                                                    <option value="{{ $subcategoria->nombre_sub_categoria }}" {{ $insumo->color == $subcategoria->nombre_sub_categoria ? 'selected' : '' }}>{{ $subcategoria->nombre_sub_categoria }}</option>
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
                                                    <option value="{{ $subcategoria->nombre_sub_categoria }}" {{ $insumo->unidad == $subcategoria->nombre_sub_categoria ? 'selected' : '' }}>{{ $subcategoria->nombre_sub_categoria }}</option>
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
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('build/js/app.js') }}"></script>
<script>
    // Obtener el elemento del select de categoría
    var selectCategoria = document.getElementById('choices-publish-status-input');

    // Obtener el elemento del select de subcategoría
    var selectSubcategoria = document.getElementById('subcategoria-input');

    // Obtener la subcategoría seleccionada actualmente
    var subcategoriaSeleccionada = {!! json_encode($insumo->subcategoria_id) !!};

    // Manejar el evento de cambio en el select de categoría
    selectCategoria.addEventListener('change', function() {
        var categoriaSeleccionada = selectCategoria.value;

        // Limpiar las opciones anteriores del select de subcategoría
        selectSubcategoria.innerHTML = '';

        // Filtrar y agregar las opciones de subcategoría correspondientes
        @foreach($subcategorias as $subcategoria)
            if('{{ $subcategoria->categoria->id }}' === categoriaSeleccionada) {
                var option = document.createElement('option');
                option.value = '{{ $subcategoria->id }}';
                option.textContent = '{{ $subcategoria->nombre_sub_categoria }}';
                if('{{ $subcategoria->id }}' === subcategoriaSeleccionada) {
                    option.selected = true;
                }
                selectSubcategoria.appendChild(option);
            }
        @endforeach
    });
</script>
@endsection
