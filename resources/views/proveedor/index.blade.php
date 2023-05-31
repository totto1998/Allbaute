@extends('layouts.master')
@section('title')
@lang('translation.orders')
@endsection
@section('css')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
    .custom-table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .custom-table-responsive .dataTables_wrapper .row:first-child {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }
    
    .custom-table-responsive .dataTables_wrapper .row:first-child .col-md-6:last-child {
        margin-left: auto;
        display: flex;
        align-items: center;
    }
    
    .custom-table-responsive .dataTables_wrapper .row:first-child .col-md-6:last-child .dataTables_filter {
        display: inline-block;
        margin-right: 10px;
    }
    
    #entriesContainer {
        display: inline-block;
        width: 100px; /* Ajusta el ancho según tus necesidades */
    }

    .form-select-smaller {
        font-size: 0.875rem;
        padding: 0.25rem 0.5rem;
        height: 2.25rem;
        width: 100%;
    }
    
</style>
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
Ecommerce
@endslot
@slot('title')
Provedor
@endslot
@endcomponent




<div class="row">
    <div class="col-lg-12">
        <div class="card" id="orderList">
            <div class="card-header border-0">
                <div class="row align-items-center gy-3">
                    <div class="col-sm">
                        <h5 class="card-title mb-0">PROVEEDORES</h5>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex gap-1 flex-wrap">
                            
                            <div id="searchContainer"></div>
                            <a class="btn btn-warning" href="{{route('proveedor.create')}}">Nuevo</a>
                            <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i> Import</button>
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card-body pt-0">
                <div>
                    <div id="entriesContainer"></div>  
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle" id="orderTable">
                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    <th scope="col" style="width: 25px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th>ID</th>
                                    <th>Razon Social</th>
                                    <th>Nit</th>
                                    <th>Telefono Fijo</th>
                                    <th>Celular</th>
                                    <th>Direccion</th>
                                    <th>Ubicacion</th>
                                    <th>Nombre Contacto</th>
                                    <th>Tags</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $proveedor)
                                
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                            </div>
                                        </th>
                                    <td>{{$proveedor->id}}</td>
                                    <td>{{$proveedor->razon_social}}</td>
                                    <td>{{$proveedor->nit}}</td>
                                    <td>{{$proveedor->telefono_fijo}}</td>
                                    <td>{{$proveedor->celular}}</td>
                                    <td>{{$proveedor->direccion}}</td>
                                    <td>
                                        <small>{{$proveedor->region}}</small>,
                                        <small>{{$proveedor->departamento}}</small>,
                                        <small>{{$proveedor->municipio}}</small>
                                    </td>
                                    <td>{{$proveedor->nombre_contacto}}</td>
                                    <td>{{$proveedor->tags}}</td>
                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="{{ route('proveedor.edit', $proveedor->id) }}" class="text-primary d-inline-block">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                            <form action="{{ route('proveedor.destroy', $proveedor->id) }}" method="POST" class="delete-form" onsubmit="return confirm('¿Está seguro de que desea eliminar este proveedor?');">
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
                    <div id="paginationContainer"></div>
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
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('build/js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#orderTable').DataTable({
            "paging": true,
            "searching": true,
            "info": false,
            "responsive": true,
            "language": {
                "search": "",
                "paginate": {
                    "previous": "<i class='ri-arrow-left-s-line'></i>",
                    "next": "<i class='ri-arrow-right-s-line'></i>"
                }
            },
            "initComplete": function() {
                var searchInput = $('#orderTable_filter').find('input');
                searchInput.removeClass('form-control-sm');
                searchInput.attr('placeholder', 'Buscar');
                searchInput.parent().addClass('custom-search');

                // Mover el campo de búsqueda a una posición estática
                searchInput.appendTo('#searchContainer');

                var entriesLabel = $('#orderTable_length').find('label');
                entriesLabel.addClass('form-label');
                entriesLabel.contents().filter(function() {
                    return this.nodeType === 3;
                }).remove();
                entriesLabel.prepend('Cantidad ');

                var entriesSelect = $('#orderTable_length').find('select');
                entriesSelect.addClass('form-select form-select-sm');

                // Mover el campo de cantidad a una posición estática
                entriesLabel.appendTo('#entriesContainer');
                entriesSelect.appendTo('#entriesContainer');

                // Reducir el tamaño del campo de cantidad
                entriesSelect.removeClass('form-select-sm');
                entriesSelect.addClass('form-select-smaller');

                var paginationContainer = $('#orderTable_paginate');
                paginationContainer.addClass('custom-pagination');

                // Mover el campo de paginación a una posición estática
                paginationContainer.appendTo('#paginationContainer');
            }
        });
    });
</script>
@endsection


