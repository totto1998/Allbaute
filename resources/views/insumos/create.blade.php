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
            <form action="{{ route('insumos.store') }}" method="POST" enctype="multipart/form-data" id="createproduct-form" autocomplete="off" class="needs-validation">
                @csrf

                <div class="card">
                    <div class="card-body">
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="img" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="img" required>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <label for="choices-publish-status-input" class="form-label">Categoria de insumos</label>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="choices-publish-status-input" name="categ" data-choices data-choices-search-false>
                                            <option value="">Selecciona una opción</option>
                                            @foreach($paramcateg as $param)
                                            @if($param->id_tipo == 1)
                                            <option value="{{ $param->nombre }}">{{ $param->nombre }}</option>
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
                                        <label for="choices-publish-status-input" class="form-label">Subcategoria</label>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="choices-publish-status-input" name="subcateg" data-choices data-choices-search-false required>
                                            @foreach($paramcateg as $param)
                                            @if($param->id_tipo == 2)
                                            <option value="{{ $param->nombre }}">{{ $param->nombre }}</option>
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
                                            <option value="">Selecciona una opción</option>
                                            <option value="Rojo">Rojo</option>
                                            <option value="Azul">Azul</option>
                                            <option value="Verde">Verde</option>
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
                                            <option value="">Selecciona una opción</option>
                                            <option value="Metro">Metro</option>
                                            <option value="Kilogramo">Kilogramo</option>
                                            <option value="Litro">Litro</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="descripcion-input" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion-input" name="descripcion" rows="3"></textarea>
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
