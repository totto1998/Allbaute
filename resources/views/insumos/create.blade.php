@extends('layouts.master')
@section('title') @lang('translation.dashboards')
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
@component('components.breadcrumb')
@slot('li_1') Tables @endslot
@slot('title')Crear Insumos @endslot
@endcomponent



<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-2">
                            <h5 class="text-primary"></h5>
                            <p class="text-muted">INSUMOS</p>
                        </div>
                        <div class="p-2 mt-4">
                            <form method="POST" action="{{ route('insumos.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Categoria:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="id_categ">
                                        <option selected></option>
                                        @foreach($insumos as $insum)
                                        <option value="{{ $insum->id_categ }}">{{ $insum->id_categ }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Sub Categoria:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="id_subcateg">
                                        <option selected></option>
                                        @foreach($insumos as $insum)
                                        <option value="{{ $insum->id_subcateg }}">{{ $insum->id_subcateg }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="nombre">
                                        <option selected></option>
                                        @foreach($insumos as $insum)
                                        <option value="{{ $insum->nombre }}">{{ $insum->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Color:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="color">
                                        <option selected></option>
                                        @foreach($insumos as $insum)
                                        <option value="{{ $insum->color }}">{{ $insum->color }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Unidad:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="unidad">
                                        <option selected></option>
                                        @foreach($insumos as $insum)
                                        <option value="{{ $insum->unidad }}">{{ $insum->unidad }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tipo de Insumo:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="t_insumo">
                                        <option selected></option>
                                        @foreach($insumos as $insum)
                                        <option value="{{ $insum->t_insumo }}">{{ $insum->t_insumo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Ancho de la tela:</label>
                                    <input type="text" class="form-control @error('ancho_tela') is-invalid @enderror" name="ancho_tela" value="{{ old('ancho_tela') }}" required>
                                    @error('ancho_tela')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br/>
                                </div>
                                <div class="form-group">
                                    <label for="avatar">Imagen:</label>
                                    <input type="file" class="form-control-file @error('img') is-invalid @enderror" name="img" accept="image/*">
                                    @error('img')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                  </div>
                                

                                
                                <br/>



                              
                                <button type="submit" class="btn btn-primary">Crear Insumos</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection
