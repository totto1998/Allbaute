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
@slot('title')LISTA DE INSUMOS @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-warning" href="{{route('insumos.create')}}">prueba</a>
            </div>
            <div class="card-body">
                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            {{--  <th scope="col" style="width: 10px;">
                                <div class="form-check">
                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                </div>
                            </th>  --}}
                            {{--  <th></th>  --}}
                            <th>ID</th>
                            <th>Categoria</th>
                            <th>Sub Categoria</th>
                            <th>Nombre</th>
                            <th>Color</th>
                            <th>unidad</th>
                            <th>img</th>
                            <th>Tipo Insumo</th>
                            <th>Ancho Tela</th>
                            <th>Acciones</th>
                            {{--  <th>Status</th>
                            <th>Priority</th>
                            <th>Action</th>  --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($insumos as $insumos)
                        <tr>
                            <td>{{$insumos->id}}</td>
                            <td>{{$insumos->id_categ}}</td>
                            <td>{{$insumos->id_subcateg}}</td>
                            <td>{{$insumos->nombre}}</td>
                            <td>{{$insumos->color}}</td>
                            <td>{{$insumos->unidad}}</td>
                            <td>{{$insumos->img}}</td>
                            <td>{{$insumos->t_insumo}}</td>
                            <td>{{$insumos->ancho_tela}}</td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        {{--  <li><a href="{{route('user.view')}}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>  --}}
                                        <li><a href="{{ route('insumos.edit', $insumos->id) }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>
                                            <form action="{{ route('insumos.destroy', $insumos->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item remove-item-btn"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
