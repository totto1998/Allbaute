@extends('layouts.master')
@section('title')
    @lang('translation.create-product')
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Insumos
        @endslot
        @slot('title')
            Crear insumos
        @endslot
    @endcomponent
    <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-lg-8">
                        <div class="card">   
                             <div class="mb-3">
                                <label for="ancho-input" class="form-label">Ancho de la tela</label>
                                <input type="text" id="ancho-input" class="form-control" placeholder="Ingrese ancho de la tela">
                            </div>
                        </div>
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info"
                                        role="tab">
                                        Informacion general
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                    
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="stocks-input">Stocks</label>
                                                <input type="text" class="form-control" id="stocks-input" placeholder="Stocks" required>
                                                <div class="invalid-feedback">Ingrese cuantos productos estan en Stocks.</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-price-input">Precio</label>
                                                <div class="input-group has-validation mb-3">
                                                    <span class="input-group-text" id="product-price-addon">$</span>
                                                    <input type="text" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required>
                                                    <div class="invalid-feedback">Ingrese el precio.</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-discount-input">Descuento</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="product-discount-addon">%</span>
                                                    <input type="text" class="form-control" id="product-discount-input" placeholder="Descuento" aria-label="discount" aria-describedby="product-discount-addon">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                    
            </div>
            <!-- end col -->
            <div class="col-lg-4 position-relative mb-4">
                <div class="card">
                    <div class="mb-2">
                        <label for="choices-publish-status-input" class="form-label">Tipo de insumo</label>
                        <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                         <option value="">Selecciona una opción</option>
                         <option value="Lino">Lino</option>
                         <option value="Algodon">Algodon</option>
                         <option value="boton">boton</option>
                         <option value="cremallera">cremallera</option>
                        </select>
                    </div>

                    <div id="card-body-container"></div>

                    <script>
                        const selectEl = document.getElementById('choices-publish-status-input');
                        const cardBodyContainerEl = document.getElementById('card-body-container');

                        selectEl.addEventListener('change', (event) => {
                        const selectedValue = event.target.value;

                        if (selectedValue === 'Lino' || selectedValue === 'Algodon') {
                            // Agregar el código HTML al contenedor
                        cardBodyContainerEl.innerHTML = `
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="choices-publish-status-input" class="form-label">Unidad de medida</label>
                                    <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                                        <option value="">Metro</option>
                                        <option value="Lino">Yarda</option>
                                        <option value="Algodon">Bolsa</option>
                                        <option value="boton">Kilogramo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ancho-input" class="form-label">Ancho de la tela</label>
                                <input type="text" id="ancho-input" class="form-control" placeholder="Ingrese ancho de la tela">
                            </div>
                            <div class="mb-3">
                             <label for="color-input" class="form-label">Color</label>
                             <input type="text" id="color-input" class="form-control" placeholder="Ingrese color">
                            </div>
                        </div>
                        <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Tags de insumos</h5>
                                </div>
                                <div class="card-body">
                                    <div class="hstack gap-3 align-items-start">
                                        <div class="flex-grow-1">
                                            <input class="form-control" data-choices data-choices-multiple-remove="true" placeholder="Enter tags" type="text"
                                     value="" />
                                     </div>
                                 </div>
                                </div>
                            </div>
                    `;
                } else if (selectedValue === 'boton' || selectedValue === 'cremallera') {
                    // Agregar el código HTML al contenedor
                    cardBodyContainerEl.innerHTML = `
                        <div class="card-body">
                            <div class="mb-3">
                             <label for="metal-input" class="form-label">Material</label>
                             <input type="text" id="metal-input" class="form-control" placeholder="Ingrese el material">
                            </div>
                            <div class="mb-3">
                                <label for="color-input" class="form-label">Color</label>
                                <input type="text" id="color-input" class="form-control" placeholder="Ingrese color">
                            </div>
                        </div>
                        <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Tags de insumos</h5>
                                </div>
                                <div class="card-body">
                                    <div class="hstack gap-3 align-items-start">
                                        <div class="flex-grow-1">
                                            <input class="form-control" data-choices data-choices-multiple-remove="true" placeholder="Enter tags" type="text"
                                        value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                    `;
                } else {
                    // Limpiar el contenido del contenedor si no se selecciona una opción correspondiente
                    cardBodyContainerEl.innerHTML = '';
                }
            });
            </script>
                </div>
            </div>
                </div>
                <div class="text-end mb-3">
                        <button type="submit" class="btn btn-success w-sm">Submit</button>
                    </div>
                </div>
        </div>
        <!-- end row -->
    </form>
@endsection
@section('script')
<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

