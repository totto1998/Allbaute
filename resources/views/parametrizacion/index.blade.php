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

{{--  @extends('layouts.master')
@section('title') @lang('translation.dashboards')
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
@component('components.breadcrumb')
@slot('li_1') Tables @endslot
@slot('title')PARAMETRIZACION @endslot
@endcomponent  --}}

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
                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addModal"><i class="ri-add-line align-bottom me-1"></i>Crear Parametrizacion</button>
                            <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i> Import</button>
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <form>
                    <div class="row g-3">
                        <div class="col-xxl-5 col-sm-6">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Search for order ID, customer, order status or something...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-6">
                            <div>
                                <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" id="demo-datepicker" placeholder="Select date">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-4">
                            <div>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
                                    <option value="">Status</option>
                                    <option value="all" selected>All</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Inprogress">Inprogress</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Pickups">Pickups</option>
                                    <option value="Returns">Returns</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-4">
                            <div>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idPayment">
                                    <option value="">Select Payment</option>
                                    <option value="all" selected>All</option>
                                    <option value="Mastercard">Mastercard</option>
                                    <option value="Paypal">Paypal</option>
                                    <option value="Visa">Visa</option>
                                    <option value="COD">COD</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-1 col-sm-4">
                            <div>
                                <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                    Filters
                                </button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
            <div class="card-body pt-0">
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1" role="tab" aria-selected="true">
                                <i class="ri-store-2-fill me-1 align-bottom"></i> All Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered" href="#delivered" role="tab" aria-selected="false">
                                <i class="ri-checkbox-circle-line me-1 align-bottom"></i> Delivered
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Pickups" data-bs-toggle="tab" id="Pickups" href="#pickups" role="tab" aria-selected="false">
                                <i class="ri-truck-line me-1 align-bottom"></i> Pickups <span class="badge bg-danger align-middle ms-1">2</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Returns" data-bs-toggle="tab" id="Returns" href="#returns" role="tab" aria-selected="false">
                                <i class="ri-arrow-left-right-fill me-1 align-bottom"></i> Returns
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Cancelled" data-bs-toggle="tab" id="Cancelled" href="#cancelled" role="tab" aria-selected="false">
                                <i class="ri-close-circle-line me-1 align-bottom"></i> Cancelled
                            </a>
                        </li>
                    </ul>

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
                                    <th class="sort" data-sort="id_tipo">Tipo</th>
                                    <th class="sort" data-sort="nombre">Nombre</th>
                                    <th class="sort" data-sort="descripcion">Descripcion</th>
                                    <th class="sort" data-sort="estado">Estado</th>
                                    <th >Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                                @foreach ($data as $param)
                                <tr>
                                    {{--  <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                        </div>
                                    </th>  --}}
                                    <td>{{$param->id}}</td>
                                    <td>{{$param->tipoParametrizacion->nombre ?? '' }}</td>
                                    <td>{{$param->nombre}}</td>
                                    <td>{{$param->descripcion}}</td>
                                    <td>
                                        @if($param->estado == 1)
                                            <span class="badge badge-soft-success">Activo</span>
                                        @else
                                            <span class="badge badge-soft-danger">Inactivo</span>
                                        @endif
                                    </td>


                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                <a href="{{URL::asset('/apps-ecommerce-order-details')}}" class="text-primary d-inline-block">
                                                    <i class="ri-eye-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="#editModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
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
                            {{ $data->links() }}
                        </div>
                    </div>


                </div>







                <!-- Modal para agregar parametrizacion -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Agregar Parámetro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <div class="modal-body">
                                <form action="{{ route('parametrizacion.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="tipo_parametrizacion" class="form-label">Tipo de Parámetro</label>
                                        <select class="form-select" id="tipo_parametrizacion" name="tipo_parametrizacion" required>
                                            <option value="">Seleccionar tipo de parámetro</option>
                                            @foreach ($tipo_parametrizacion as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="estado">Estado</label>
                                        <select class="form-select" id="estado" name="estado" required>
                                            <option value="">Seleccionar estado</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Edición -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Editar Parámetro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('parametrizacion.update',$param->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="tipoParametrizacion">Tipo:</label>
                                        <select class="form-control" name="tipoParametrizacion" id="tipoParametrizacion">
                                            <option value="">Seleccione una opción</option>
                                            @foreach($tipo_parametrizacion as $tipo)
                                                <option value="{{ $tipo->id }}" {{ $param->tipoParametrizacion->id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $param->nombre }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción:</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion">{{ $param->descripcion }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado:</label>
                                        <select class="form-control" name="estado" id="estado">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1" {{ $param->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                            <option value="0" {{ $param->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>
                            </div>
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
{{--  <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>  --}}


<!--ecommerce-customer init js -->
{{--  <script src="{{ URL::asset('build/js/pages/ecommerce-order.init.js') }}"></script>    --}}
<script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="{{ URL::asset('build/js/scripts.js') }}"></script>



@endsection
