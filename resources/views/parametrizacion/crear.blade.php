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
@slot('title')Datatables @endslot
@endcomponent



<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-2">
                            <h5 class="text-primary"></h5>
                            <p class="text-muted">PARAMETRIZACION</p>
                        </div>
                        <div class="p-2 mt-4">
                            <form method="POST" action="{{ route('parametrizacion.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="name">Tipo de parametrización:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="id_tipo">
                                        <option selected></option>
                                        @foreach($parametrizacion as $param)
                                        <option value="{{ $param->id_tipo }}">{{ $param->id_tipo }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br/>
                                </div>

                                <div class="form-group">
                                    <label for="description">Descripción:</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <br/>
                                </div>

                                <div class="form-group">
                                    <label for="estado">Estado:</label>
                                    <div>
                                        <input type="radio" id="activo" name="estado" value="0" checked>
                                        <label for="activo">Activo</label>
                                    </div>
                            
                                    <div>
                                        <input type="radio" id="inactivo" name="estado" value="1">
                                        <label for="inactivo">Inactivo</label>
                                    </div>
                                </div>
                                <br/>



                              
                                <button type="submit" class="btn btn-primary">Crear Parametrizacion</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection
