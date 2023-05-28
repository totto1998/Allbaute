@extends('layouts.master')
@section('title')
@lang('translation.orders')
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
Ecommerce
@endslot
@slot('title')
parametrizacion
@endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="orderList">
            <div class="card-header border-0">
                <div class="row align-items-center gy-3">
                    <div class="col-sm">
                        <h5 class="card-title mb-0">PARAMETRIZACION</h5>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex gap-1 flex-wrap">
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchInput" placeholder="Buscar insumo...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>

                            <a class="btn btn-warning" href="{{route('parametrizacion.create')}}">CREAR NUEVA PARAMETRIZACION</a>
                            <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i>Exportar</button>
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
    </br>
            <div class="card-body pt-0">
                <div>
                    <div class="table-responsive table-card mb-1">
                        <table class="table table-nowrap align-middle" id="orderTable">
                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    {{--  <th scope="col" style="width: 25px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>  --}}
                                    <th class="sort" data-sort="id">ID</th>
                                    <th class="sort" data-sort="id_tipo">Categoria</th>
                                    <th class="sort" data-sort="nombre">SubCategoria</th>
                                    <th class="sort" data-sort="descripcion">Descripcion</th>
                                    <th class="sort" data-sort="estado">Estado</th>
                                    <th >Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                                @foreach ($subcategoria as $param)
                                <tr>
                                    {{--  <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                        </div>
                                    </th>  --}}
                                    <td>{{$param->id}}</td>
                                    <td>{{$param->categoria->nombre_categoria ?? '' }}</td>
                                    <td>{{$param->nombre_sub_categoria}}</td>
                                    <td>{{$param->comentario}}</td>
                                    <td>
                                        @if($param->estado_sub_categoria == 1)
                                            <span class="badge badge-soft-success">Activo</span>
                                        @else
                                            <span class="badge badge-soft-danger">Inactivo</span>
                                        @endif
                                    </td>


                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            {{--  <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                <a href="{{URL::asset('/apps-ecommerce-order-details')}}" class="text-primary d-inline-block">
                                                    <i class="ri-eye-fill fs-16"></i>
                                                </a>
                                            </li>  --}}
                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="{{ route('parametrizacion.edit', $param->id) }}" class="text-primary d-inline-block">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                
                                                <form action="{{ route('parametrizacion.destroy', $param->id) }}" method="POST" class="delete-form" onsubmit="return confirm('¿Está seguro de que desea eliminar este registro?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item remove-item-btn"><i class="ri-delete-bin-5-fill fs-16"></i></button>
                                                </form>
                                                

                                            </li>

                                        </ul>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>



    
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted">We've searched more than 150+ Orders We did
                                    not find any
                                    orders for you search.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="pagination justify-content-end">
                            {{ $subcategoria->links() }}
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->

@endsection
@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(){
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#orderTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

    
<script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>


<!--ecommerce-customer init js -->
<script src="{{ URL::asset('build/js/pages/ecommerce-order.init.js') }}"></script>
<script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="{{ URL::asset('build/js/scripts.js') }}"></script>



@endsection
