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
        <div class="col-xl-3 col-lg-4">
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
        

        <div class="col-xl-9 col-lg-8">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto"><div>
                                    <a  class="btn btn-warning" href="{{route('insumo.create')}}" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i>Agregar insumos</a>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchProductList" placeholder="Busar insumo">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div id="selection-element">
                                    <div class="my-n1 d-flex align-items-center text-muted">
                                        Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">

                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                <div id="table-product-list-all" class="table-card gridjs-border-none"></div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-published" role="tabpanel">
                                <div id="table-product-list-published" class="table-card gridjs-border-none"></div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                <div class="py-4 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                        trigger="loop" colors="primary:#405189,secondary:#0ab39c"
                                        style="width:72px;height:72px">
                                    </lord-icon>
                                    <h5 class="mt-4">Sorry! No Result Found</h5>
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <!-- removeItemModal -->
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
    </div><!-- /.modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
    <script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>


    <script src="{{ URL::asset('build/js/pages/ecommerce-product-list.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection



