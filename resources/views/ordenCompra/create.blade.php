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
            Ecommerce
        @endslot
        @slot('title')
            Crear nueva parametrizacion
        @endslot
    @endcomponent
    
    <div class="form-group">
  <label for="proveedor">Proveedor:</label>
  <select class="form-control" id="proveedor" name="proveedor" required>
    <option value="">Selecciona un proveedor</option>
    <option value="1">Proveedor A</option>
    <option value="2">Proveedor B</option>
    <option value="3">Proveedor C</option>
  </select>
</div>
<div id="card-body-container"></div>

            
 class="form-group">
  <label for="insumos">Insumos:</label>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" name="insumos[]" id="insumo1" value="1">
  <label class="form-check-label" for="insumo1">
    Insumo 1 - $10.00
  </label>
  <input class="form-control" type="number" name="cantidad1" id="cantidad1" min="1" max="100" step="1" value="1">
  <span class="subtotal" id="subtotal1">$10.00</span>
</div>

  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="insumos[]" id="insumo2" value="2">
    <label class="form-check-label" for="insumo2">
      Insumo 2 - $15.00
    </label>
    <input class="form-control" type="number" name="cantidad2" min="1" max="100" step="1" value="1">
    <span class="subtotal" id="subtotal2">$15.00</span>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" name="insumos[]" id="insumo3" value="3">
    <label class="form-check-label" for="insumo3">
      Insumo 3 - $20.00
    </label>
    <input class="form-control" type="number" name="cantidad3" min="1" max="100" step="1" value="1">
    <span class="subtotal" id="subtotal3">$20.00</span>
  </div>
</div>
<script>
  // Obtener los elementos de cantidad y subtotal
  const cantidad1 = document.getElementById('cantidad1');
  const subtotal1 = document.getElementById('subtotal1');

  // Obtener el valor unitario del insumo
  const valorUnitario1 = 10.00; // Cambiar por el valor unitario real

  // Función para actualizar el subtotal cuando cambia la cantidad
  function actualizarSubtotal1() {
    const cantidad = cantidad1.value;
    const subtotal = cantidad * valorUnitario1;
    subtotal1.innerHTML = `$${subtotal.toFixed(2)}`;
  }

  // Detectar cuándo cambia la cantidad y llamar a la función de actualización
  cantidad1.addEventListener('input', actualizarSubtotal1);
</script>


@endsection
@section('script')


<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection