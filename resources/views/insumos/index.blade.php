@extends('layouts.master')
@section('title')
    @lang('translation.products')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">

@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Insumos
        @endslot
        @slot('title')
            Insumos
        @endslot
     @endcomponent
     
    <div class="row">
        
        {{--  <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="accordion accordion-flush filter-accordion"><div class="card-body border-bottom">
                        <p class="text-muted text-uppercase fs-12 fw-medium mb-4">Precio</p>
                        <div id="product-price-range"></div>
                        <div class="formCost d-flex gap-2 align-items-center mt-3">
                            <input class="form-control form-control-sm" type="text" id="minCost" value="0" /> <span class="fw-semibold text-muted">to</span> <input
                                class="form-control form-control-sm" type="text" id="maxCost" value="1000000" />
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div id="flush-collapseBrands" class="accordion-collapse collapse show"
                            aria-labelledby="flush-headingBrands">
                        </div>
                    </div>
                </div>
            </div> 
        </div>
          --}}

        <div class="col-lg-12">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto"><div>

                                    <a  class="btn btn-warning" href="{{route('insumos.create')}}" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i>Agregar insumos</a>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchInput" placeholder="Buscar insumo...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div id="selection-element">
                                    <div class="my-n1 d-flex align-items-center text-muted">
                                        Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                    <!-- end card header -->
                    <div class="card-body pt-0">
                        <div>
                            <div class="table-responsive table-card mb-1">
                                <table class="table table-nowrap align-middle" id="orderTable">
                                    <thead class="text-muted table-light">
                                      <tr class="text-uppercase">
                                        <th scope="col" style="width: 25px;">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                          </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Tags</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Descuento</th>
                                        <th>Color</th>
                                        <th>Unidad</th>
                                        <th>Ancho</th>
                                        <th>Material</th>
                                        <th>Estado</th>
                                        <th>Fecha de Creación</th>
                                        <th>Acciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($data as $insumo)
                                      <tr>
                                        <th scope="row">
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                          </div>
                                        </th>
                                        <td>{{ $insumo->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                              <img src="{{ asset('images/' . $insumo->img) }}" alt="{{ $insumo->nombre }}" class="me-2" style="width: 50px; height: 50px;">
                                              <div>
                                                <p class="mb-0">{{ $insumo->nombre }}</p>
                                                <small class="text-muted">{{ $insumo->categ }}</small>
                                              </div>
                                            </div>
                                          </td>
                                          
                                        <td>{{ $insumo->tags }}</td>
                                        <td>{{ $insumo->precio }}</td>
                                        <td>{{ $insumo->stock }}</td>
                                        <td>{{ $insumo->descuento }}</td>
                                        <td>{{ $insumo->color }}</td>
                                        <td>{{ $insumo->unidad }}</td>
                                        <td>{{ $insumo->ancho }}</td>
                                        <td>{{ $insumo->subcateg }}</td>
                                        <td>
                                            @if($insumo->estado == 1)
                                                <span class="badge badge-soft-success">Terminado</span>
                                            @else
                                                <span class="badge badge-soft-danger">Produccion</span>
                                            @endif
                                        </td>
                                        <td>{{ $insumo->created_at }}</td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                {{--  <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                    <a href="{{URL::asset('/apps-ecommerce-order-details')}}" class="text-primary d-inline-block">
                                                        <i class="ri-eye-fill fs-16"></i>
                                                    </a>
                                                </li>  --}}
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                    <a href="{{ route('insumos.edit', $insumo->id) }}" class="text-primary d-inline-block">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                    
                                                    <form action="{{ route('insumos.destroy', $insumo->id) }}" method="POST" class="delete-form" onsubmit="return confirm('¿Está seguro de que desea eliminar este registro?');">
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
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    {{--  <!-- removeItemModal -->
    <div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Product ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger " id="delete-product">Yes, Delete It!</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  --}}
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


    <script src="{{ URL::asset('build/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
    <script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>


    <script src="{{ URL::asset('build/js/pages/ecommerce-product-list.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection



