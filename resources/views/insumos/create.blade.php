@extends('layouts.master')
@section('title')
@lang('translation.create-product')
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('build/css/style.css') }}">
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
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Galeria de productos</h5>
                </div>
                <div class="card-body">
                    <div>
                        <h5 class="fs-14 mb-1">Agrega la imagen de un producto nuevo</h5>

                        <div class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple="multiple">
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                </div>

                                <h5>Clik aqui para subir la imagen</h5>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                            <li class="mt-2" id="dropzone-preview-list">
                                <!-- This is used as the file preview template -->
                                <div class="border rounded">
                                    <div class="d-flex p-2">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm bg-light rounded">
                                                <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Product-Image" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="pt-1">
                                                <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ms-3">
                                            <button data-dz-remove class="btn btn-sm btn-danger">Borrar</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- end dropzon-preview -->
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
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
                                        <input type="text" class="form-control" id="stocks-input" placeholder="Stocks" required pattern="[A-Za-z\s]+">
                                        <div class="invalid-feedback">Ingrese cuantos productos estan en Stocks.</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-price-input">Precio</label>
                                        <div class="input-group has-validation mb-3">
                                            <span class="input-group-text" id="product-price-addon">$</span>
                                            <input type="text" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required pattern="[0-9]+">
                                            <div class="invalid-feedback">Ingrese el precio.</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-discount-input">Descuento</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="product-discount-addon">%</span>
                                            <input type="text" class="form-control" id="product-discount-input" placeholder="Descuento" aria-label="discount" aria-describedby="product-discount-addon" required pattern="[0-9]+">
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
                <div class="mb-2" style="margin-top: 10px;  margin-left: 20px; margin-right: 20px; margin-bottom: 20px;;">
                    <label for="choices-publish-status-input" class="form-label">Categoria de insumos</label>
                    <select class="form-select" id="choices-publish-status-input" aria-label="Disabled select example">
                        <option selected>Selecciona una opción</option>
                        <option value="Tela">Tela</option>
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

                        if (selectedValue === 'Tela') {
                            // Agregar el código HTML al contenedor
                            cardBodyContainerEl.innerHTML = `
                  <div class="card-body">
                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Tipo de tela</label>
                              <select class="form-select" id="choices-publish-status-input" name="subcateg" data-choices data-choices-search-false required>
                                @foreach($paramcateg as $param)
                                @if($param->id_tipo == 2)
                                    <option value="{{ $param->nombre }}">{{ $param->nombre }}</option>
                                @endif
                                @endforeach
                              </select>
                      </div>
                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Unidad de medida</label>
                              <select class="form-select" id="choices-publish-status-input" name="unidad" data-choices data-choices-search-false required>
                                @foreach($paramcateg as $param)
                                @if($param->id_tipo == 6)
                                    <option value="{{ $param->nombre }}">{{ $param->nombre }}</option>
                                @endif
                                @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="ancho-input" class="form-label">Ancho de la tela</label>
                          <input type="text" id="ancho-input" class="form-control" required pattern="[A-Za-z]+" placeholder="Ingrese ancho de la tela" name="ancho">
                      </div>
                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Color</label>
                              <select class="form-select" id="choices-publish-status-input" name="color" data-choices data-choices-search-false required>
                                @foreach($paramcateg as $param)
                                @if($param->id_tipo == 5)
                                    <option value="{{ $param->nombre }}">{{ $param->nombre }}</option>
                                @endif
                                @endforeach
                          </select>
                      </div>

                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Estado</label>
                              <select class="form-select" id="choices-publish-status-input" name="estado" data-choices data-choices-search-false required>
                                  <option value="1">Terminado</option>
                                  <option value="0">Emproduccion</option>
                          </select>
                      </div>
                  </div>
                  <div class="card">
                          <div class="card-header">
                              <h5 class="card-title mb-0">Tags de insumos</h5>
                          </div>
                          <div class="card-body">
                              <div class="hstack gap-3 align-items-start">
                                  <div class="flex-grow-1">
                                      <input class="form-control" data-choices data-choices-multiple-remove="true" name="tags" placeholder="Enter tags" type="text" value="" required pattern="[A-Za-z]+" />
                               </div>
                           </div>
                          </div>
                      </div>
              `;
                        } else if (selectedValue === 'boton') {
                            // Agregar el código HTML al contenedor
                            cardBodyContainerEl.innerHTML = `
              <div class="card-body">

                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Tipo de Material</label>
                              <select class="form-select" id="choices-publish-status-input" name="subcateg" data-choices data-choices-search-false required>
                                @foreach($paramcateg as $param)
                                @if($param->id_tipo == 3)
                                    <option value="{{ $param->nombre }}">{{ $param->nombre }}</option>
                                @endif
                                @endforeach
                          </select>
                      </div>

                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Unidad de medida</label>
                              <select class="form-select" id="choices-publish-status-input" name="unidad" data-choices data-choices-search-false required>
                                @foreach($paramcateg as $param)
                                @if($param->id_tipo == 6)
                                    <option value="{{ $param->nombre }}">{{ $param->nombre }}</option>
                                @endif
                                @endforeach
                          </select>
                      </div>

                      <div class="mb-3">
                          <label for="ancho-input" class="form-label">Ancho del boton</label>
                          <input type="text" id="ancho-input" class="form-control" required pattern="[A-Za-z]+" placeholder="Ingrese ancho de la tela" name="ancho">
                      </div>
                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Color</label>
                              <select class="form-select" id="choices-publish-status-input" name="color" data-choices data-choices-search-false required>
                                @foreach($paramcateg as $param)
                                @if($param->id_tipo == 5)
                                    <option value="{{ $param->nombre }}">{{ $param->nombre }}</option>
                                @endif
                                @endforeach
                          </select>
                      </div>
                      <div class="mb-2">
                        <label for="choices-publish-status-input" class="form-label">Estado</label>
                            <select class="form-select" id="choices-publish-status-input" name="estado" data-choices data-choices-search-false required>
                                <option value="1">Terminado</option>
                                <option value="0">Emproduccion</option>
                        </select>
                      </div>
                  </div>


                  <div class="card">
                          <div class="card-header">
                              <h5 class="card-title mb-0">Tags de insumos</h5>
                          </div>
                          <div class="card-body">
                              <div class="hstack gap-3 align-items-start">
                                  <div class="flex-grow-1">
                                      <input class="form-control" data-choices data-choices-multiple-remove="true" name="tags" placeholder="Enter tags" type="text" value="" required pattern="[A-Za-z]+" />
                               </div>
                           </div>
                          </div>
                      </div>
              `;
                        } else if (selectedValue === 'cremallera') {
                            // Agregar el código HTML al contenedor
                            cardBodyContainerEl.innerHTML = `
              <div class="card-body">
                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Unidad de medida</label>
                              <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false required>
                                  <option value="">Metro</option>
                                  <option value="Lino">Yarda</option>
                                  <option value="Algodon">Bolsa</option>
                                  <option value="boton">Kilogramo</option>
                          </select>
                      </div>
                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Color</label>
                              <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false required>
                                  <option value="">Amarrillo</option>
                                  <option value="Rojo">Rojo</option>
                                  <option value="Azul">Azul</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="ancho-input" class="form-label">Ancho del cremallera</label>
                          <input type="text" id="ancho-input" class="form-control" required pattern="[A-Za-z]+" placeholder="Ingrese ancho de la tela">
                      </div>
                  </div>
                  
                  <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Estado</label>
                              <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false required>
                                  <option value="amarillo">Terminado</option>
                                  <option value="rojo">Emproduccion</option>
                          </select>
                      </div>
                  <div class="card">
                          <div class="card-header">
                              <h5 class="card-title mb-0">Tags de insumos</h5>
                          </div>
                          <div class="card-body">
                              <div class="hstack gap-3 align-items-start">
                                  <div class="flex-grow-1">
                                      <input class="form-control" data-choices data-choices-multiple-remove="true" placeholder="Enter tags" type="text"
                               value="" required pattern="[A-Za-z]+" />
                               </div>
                           </div>
                          </div>pa
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
    <div class="content">
        <form action="#">
            <div class="user-details">
                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </div>
        </form>
    </div>
    </div>
    <!-- end row -->
</form>

@endsection
@section('script')
<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>


<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection