@extends('layouts.master')
@section('title')
@lang('translation.shopping-cart')
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1')
Ecommerce
@endslot
@slot('title')
Shopping Cart
@endslot
@endcomponent
<div class="row mb-3">
    <div class="col-xl-8">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <div class="search-box ms-2">
                    <input type="text" class="form-control" id="searchProductList" placeholder="Search Products...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
            @php
            $total = 0;
            @endphp
        
            @foreach ($proveedores as $proveedor)
                @foreach ($proveedor->getInsumos() as $insumo)
                    @php
                        $insumoo = App\Models\insumos::find($proveedor->t_insumo);
                        $precioConDescuento = $insumoo->precio - ($insumoo->precio * $insumoo->descuento / 100);
                        $total += $precioConDescuento * $insumoo->cantidad; // Aplica el descuento y multiplica por la cantidad de productos
                    @endphp
                    <div class="card product">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-sm-auto">
                                    <div class="avatar-lg bg-light rounded p-1">
                                        <img src="{{ asset('images/' . $insumoo->img) }}" alt="" class="img-fluid d-block">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <h5 class="fs-15 text-truncate"><a href="{{ URL::asset('/ecommerce-product-detail') }}" class="text-dark">{{ $insumo->categ }}</a></h5>
                                    <ul class="list-inline text-muted">
                                        <li class="list-inline-item"><span class="fw-medium">{{ $insumoo->subcateg }}</span></li><br>
                                        <li class="list-inline-item">Color: <span class="fw-medium">{{ $insumoo->color }}</span></li>
                                        <li class="list-inline-item">Size: <span class="fw-medium">{{ $insumoo->ancho }}</span></li>
                                    </ul>
                
                                    <div class="input-step">
                                        <button type="button" class="minus">–</button>
                                        <input type="number" class="product-quantity" value="0" min="0" max="100">
                                        <button type="button" class="plus">+</button>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="text-lg-end">
                                        {{--  <p class="text-muted mb-1">Item Price:</p>
                                        <h5 class="fs-15">$<span id="ticket_price" class="product-price">{{ $insumo->precio }}</span></h5>  --}}
                                        <div class="text-lg-end">
                                            <p class="text-muted mb-1">Item Price:</p>
                                            <h5 class="fs-15">$<span id="ticket_price" class="product-price">{{ $precioConDescuento }}</span></h5>
                                            <!-- Mostrar el precio original si es necesario -->
                                            <p class="text-muted mb-1">Original Price:</p>
                                            <h5 class="fs-15">$<span id="original_price">{{ $insumoo->precio }}</span></h5>
                                        </div>                                        
                                    </div>
                                    <div class="text-lg-end">
                                        <p class="text-muted mb-1">Descuento:</p>
                                        <h5 class="fs-15"><span id="ticket_price" class="product-discount">{{ $insumoo->descuento }}%</span></h5>
                                    </div>     
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-footer">
                            <div class="row align-items-center gy-3">
                                <div class="col-sm">
                                    <div class="d-flex flex-wrap my-n1">
                                        <div>
                                            <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal">
                                                <i class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                Remove
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#" class="d-block text-body p-1 px-2">
                                                <i class="ri-star-fill text-muted align-bottom me-1"></i>
                                                Add Wishlist
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex align-items-center gap-2 text-muted">
                                        <div>Total :</div>
                                        <h5 class="fs-15 mb-0">$<span class="product-line-price">{{ $total }}</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card footer -->
                    </div>
                    <!-- end card -->
                @endforeach
            @endforeach
               
        </div>
        <br>
        


    </div>
    <!-- end col -->

    <div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">Orden de compra</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Sub Total :</td>
                                    <td class="text-end" id="cart-subtotal"></td>
                                </tr>
                                <tr>
                                    <td>Descuento <span class="text-muted"></span> : </td>
                                    <td class="text-end" id="cart-discount"></td>
                                </tr>
                                <tr>
                                    <td>Iva 19%: </td>
                                    <td class="text-end" id="cart-tax"></td>
                                </tr>
                                <tr class="table-active">
                                    <th>Total (COP) :</th>
                                    <td class="text-end">
                                        <span class="fw-semibold" id="cart-total">
                                            
                                        </span>
                                       
                                    </td>
                                    
                                </tr>
                                
                            </tbody>
                            
                        </table>
                        
                    </div>
                    
                    <!-- end table-responsive -->
                </div>
                
            </div>
            <div class="text-end mb-4">
                <a href="{{URL::asset('/apps-ecommerce-checkout')}}" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Registrar orden</a>

            </div>
        </div>
        <!-- end stickey -->

    </div>
</div>
<!-- end row -->
<!-- removeItemModal -->
<div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Product ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="remove-product">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection


@section('script')
<script src="{{ URL::asset('build/js/pages/form-input-spin.init.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-cart.init.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection


