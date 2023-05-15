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
Ecommerce
@endslot
@slot('title')
Crear nueva parametrizacion
@endslot
@endcomponent
<!DOCTYPE html>
<html>
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
                                @foreach($ordenCompra as $param)
                                @if($param->id_tipo == 2)
                                    <option value="{{ $param->nombre }}">{{ $param->nombre }}</option>
                                @endif
                                @endforeach
                              </select>
                      </div>
                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Unidad de medida</label>
                              <select class="form-select" id="choices-publish-status-input" name="unidad" data-choices data-choices-search-false required>
                                @foreach($ordenCompra as $param)
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
                                @foreach($ordenCompra as $param)
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
                                @foreach($ordenCompra as $param)
                                @if($param->id_tipo == 3)
                                    <option value="{{ $param->nombre }}">{{ $param->nombre }}</option>
                                @endif
                                @endforeach
                          </select>
                      </div>

                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Unidad de medida</label>
                              <select class="form-select" id="choices-publish-status-input" name="unidad" data-choices data-choices-search-false required>
                                @foreach($ordenCompra as $param)
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
                                @foreach($ordenCompra as $param)
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
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
    </form>
  </div>
</div>

</html>


@endsection
@section('script')


<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>

@endsection