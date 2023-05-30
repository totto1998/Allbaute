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
    Crear nuevo proveedor
    @endslot
    @endcomponent

<form action="{{ route('proveedor.store') }}" method="POST" enctype="multipart/form-data" id="createproduct-form" autocomplete="off" class="needs-validation">
@csrf
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <div class="mb-3">
              <label for="nombre-de-contacto" class="form-label">Nombre del contacto</label>
              <input type="text" name="nombre_contacto" class="form-control" id="nombre-de-contacto" placeholder="Ingrese el nombre del contacto" required pattern="[A-Za-z\s]+" oninput="eliminarComillas(this)" required>
            </div>
              <label for="email">Email:</label>
              <div class="input-group">
                <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese su email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninput="eliminarComillas(this)" required>
                <div class="invalid-feedback" style="position:absolute; bottom:-1.5rem; left:0;">Ingrese un correo electrónico válido.</div>
              </div>
            <br>
          </div>
          <div class="row">
              <div class="col-md-6 mb-3">
                <label for="razon-social" class="form-label">Razón Social</label>
                <input type="text" name="razon_social" class="form-control" id="razon-social" placeholder="Ingrese su razón social" required pattern="[A-Za-z\s.]+" oninput="eliminarComillas(this)" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="nit" class="form-label">NIT</label>
                <input type="text" name="nit" class="form-control" id="nit" placeholder="Ingrese su NIT" required pattern="[0-9\s]+" oninput="eliminarComillas(this)">
              </div>
          </div>
          <div class="row">
              <div class="col-md-6 mb-3">
                <label for="telefono-fijo" class="form-label">Teléfono fijo</label>
                <input type="text" name="telefono_fijo" class="form-control" id="telefono-fijo" placeholder="Ingrese su teléfono fijo" required pattern="[0-9\s]+" oninput="eliminarComillas(this)" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" name="celular" class="form-control" id="celular" placeholder="Ingrese su celular" required pattern="[0-9\s]+" oninput="eliminarComillas(this)" required>
              </div>
          </div>
          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Ingrese su dirección" required oninput="eliminarComillas(this)" required>
          </div>
          <div class="row">
            <div class="form-group mb-3">
              <label for="region">Región</label>
              <select name="region" id="region" class="form-control">
                  @foreach ($locations as $location)
                      <option value="{{ $location['region'] }}">{{ $location['region'] }}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group mb-3">
              <label for="departamento">Departamento</label>
              <select name="departamento" id="departamento" class="form-control">
                  @foreach ($locations as $location)
                      <option value="{{ $location['departamento'] }}">{{ $location['departamento'] }}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group mb-3">
              <label for="municipio">Ciudad</label>
              <select name="municipio" id="municipio" class="form-control">
                  @foreach ($locations as $location)
                      <option value="{{ $location['municipio'] }}">{{ $location['municipio'] }}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="tags" class="form-label">Tags</label>
              <input type="text" name="tags" class="form-control" id="tags" placeholder="Ingrese los tags" required pattern="[A-Za-z\s]+" oninput="eliminarComillas(this)" required>
            </div>
          </div>

          <div class="content">
            <div class="button">
              <input type="submit" value="Register">
            </div>
          </div>
        
      </div>
    </div>
  </div>
</form>



<script>
  function eliminarComillas(input) {
    input.value = input.value.replace(/['="]/g, '');
  }
</script> 


@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

<script>
  // Agregar evento de cambio en los checkboxes del menú desplegable
  $('.dropdown-menu input[type="checkbox"]').change(function() {
    var checkedValues = $('.dropdown-menu input[type="checkbox"]:checked').map(function() {
      return this.value;
    }).get();

    // Actualizar el valor del campo oculto con los checkboxes seleccionados
    $('#tipo-insumo').val(checkedValues).trigger('change');
  });

  // Inicializar Select2 en el campo oculto para estilizarlo como un campo de selección múltiple
  $(document).ready(function() {
    $('#tipo-insumo').select2();
  });
</script>



<script>
  // resources/js/app.js

// Obtener los elementos del DOM
const regionSelect = document.querySelector('#region');
const departamentoSelect = document.querySelector('#departamento');
const municipioSelect = document.querySelector('#municipio');

// Obtener los datos de la API
async function getLocations() {
  const response = await fetch('https://api.example.com/locations');
  const data = await response.json();
  return data;
}

// Rellenar los selects con los datos de la API
async function fillSelects() {
  const locations = await getLocations();

  locations.forEach((location) => {
    const option = document.createElement('option');
    option.value = location.region;
    option.textContent = location.region;
    regionSelect.appendChild(option);
  });

  regionSelect.addEventListener('change', () => {
    const selectedRegion = regionSelect.value;

    // Filtrar los departamentos según la región seleccionada
    const filteredDepartamentos = locations.filter((location) => location.region === selectedRegion);

    // Limpiar los departamentos anteriores
    departamentoSelect.innerHTML = '';
    municipioSelect.innerHTML = '';

    filteredDepartamentos.forEach((location) => {
      const option = document.createElement('option');
      option.value = location.departamento;
      option.textContent = location.departamento;
      departamentoSelect.appendChild(option);
    });
  });

  departamentoSelect.addEventListener('change', () => {
    const selectedDepartamento = departamentoSelect.value;

    // Filtrar los municipios según el departamento seleccionado
    const filteredMunicipios = locations.filter(
      (location) => location.departamento === selectedDepartamento
    );

    // Limpiar los municipios anteriores
    municipioSelect.innerHTML = '';

    filteredMunicipios.forEach((location) => {
      const option = document.createElement('option');
      option.value = location.municipio;
      option.textContent = location.municipio;
      municipioSelect.appendChild(option);
    });
  });
}

// Llamar a la función para rellenar los selects
fillSelects();
</script>

<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
