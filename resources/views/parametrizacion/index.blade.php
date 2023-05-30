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
</style>
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
                            <a class="btn btn-warning" href="{{route('parametrizacion.create')}}">CREAR NUEVA PARAMETRIZACION</a>
                            <button type="button" class="btn btn-secondary">
                                <i class="ri-file-download-line align-bottom me-1"></i>
                                Exportar</button>
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle" id="orderTable">
                        <div class="table-responsive">
                        <thead class="text-muted table-light">
                            <tr class="text-uppercase">
                                <th class="sort" data-sort="id">ID</th>
                                <th class="sort" data-sort="id_tipo">Categoria</th>
                                <th class="sort" data-sort="nombre">SubCategoria</th>
                                <th class="sort" data-sort="descripcion">Descripcion</th>
                                <th class="sort" data-sort="estado">Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach ($subcategoria as $param)
                            <tr>
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
                </div>
                    <div class="noresult" style="display: none">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                            <h5 class="mt-2">Sorry! No Result Found</h5>
                            <p class="text-muted">We've searched more than 150+ Orders We did not find any orders for your search.</p>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
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
                searchInput.parent().insertAfter($('#orderTable_length'));
                
                var entriesLabel = $('#orderTable_length').find('label');
                entriesLabel.addClass('form-label');
                entriesLabel.contents().filter(function() {
                    return this.nodeType === 3;
                }).remove();
                entriesLabel.prepend('Cantidad ');
                
                var entriesSelect = $('#orderTable_length').find('select');
                entriesSelect.addClass('form-select form-select-sm');
            }
        });
    });
</script>



@endsection
