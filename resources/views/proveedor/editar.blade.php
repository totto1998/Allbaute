@extends('layouts.master')
@section('title')
@lang('translation.editar-product')
@endsection
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('build/css/style.css') }}">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
Proveedores
@endslot
@slot('title')
Editar proveedor
@endslot
@endcomponent

<form action="{{ route('proveedor.update', $proveedor->id) }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <div class="mb-3">
              <label for="nombre-de-contacto" class="form-label">Nombre del contacto</label>
              <input type="text" name="nombre_contacto" class="form-control" id="nombre-de-contacto" value="{{ $proveedor->nombre_contacto }}" required pattern="[A-Za-z\s]+" oninput="eliminarComillas(this)" required>
            </div>
              <label for="email">Email:</label>
              <div class="input-group">
                <input type="email" name="email" class="form-control" id="email" value="{{ $proveedor->email }}" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninput="eliminarComillas(this)" required>
                <div class="invalid-feedback" style="position:absolute; bottom:-1.5rem; left:0;">Ingrese un correo electrónico válido.
                </div>
              </div>
            <br>
          </div>
          <div class="row">
              <div class="col-md-6 mb-3">
                <label for="razon-social" class="form-label">Razón Social</label>
                <input type="text" name="razon_social" class="form-control" id="razon-social" value="{{ $proveedor->razon_social }}" required pattern="[A-Za-z\s\.]+" oninput="eliminarComillas(this)" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="nit" class="form-label">NIT</label>
                <input type="text" name="nit" class="form-control" id="nit" value="{{ $proveedor->nit }}" required pattern="[0-9]+" oninput="eliminarComillas(this)">
              </div>
          </div>
          <div class="row">
              <div class="col-md-6 mb-3">
                <label for="telefono-fijo" class="form-label">Teléfono fijo</label>
                <input type="text" name="telefono_fijo" class="form-control" id="telefono-fijo" value="{{ $proveedor->telefono_fijo }}" required pattern="[0-9]+" oninput="eliminarComillas(this)" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" name="celular" class="form-control" id="celular" value="{{ $proveedor->celular }}" required pattern="[0-9]+" oninput="eliminarComillas(this)" required>
              </div>
          </div>
          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion" value="{{ $proveedor->direccion }}" required oninput="eliminarComillas(this)" required>
          </div>
          <div class="row">
            <div class="form-group mb-3">
                <label for="region">Región</label>
                <select name="region" id="region" class="form-control">
                    @foreach ($locations as $location)
                        <option value="{{ $location['region'] }}" {{ $location['region'] == $proveedor->region ? 'selected' : '' }}>{{ $location['region'] }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group mb-3">
                <label for="departamento">Departamento</label>
                <select name="departamento" id="departamento" class="form-control">
                    @foreach ($locations as $location)
                        <option value="{{ $location['departamento'] }}" {{ $location['departamento'] == $proveedor->departamento ? 'selected' : '' }}>{{ $location['departamento'] }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group mb-3">
                <label for="municipio">Ciudad</label>
                <select name="municipio" id="municipio" class="form-control">
                    @foreach ($locations as $location)
                        <option value="{{ $location['municipio'] }}" {{ $location['municipio'] == $proveedor->municipio ? 'selected' : '' }}>{{ $location['municipio'] }}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
  
        <div class="mb-3">
            <div class="row">                         
                <div class="col-md-6 mb-3">
                  <label for="tags" class="form-label">Tags</label>
                  <input type="text" name="tags" class="form-control" id="tags" value="{{ $proveedor->tags }}" required pattern="[A-Za-z\s]+" oninput="eliminarComillas(this)" required>
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
  </div>
</form>



{{--  <script>
  function eliminarComillas(input) {
    input.value = input.value.replace(/['"=]/g, '');
  }
</script>  --}}


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
let locations = [];

fetch('https://www.datos.gov.co/resource/xdk5-pm3f.json?$query=SELECT%20%60region%60%2C%20%60departamento%60%2C%20%60municipio%60')
    .then(response => response.json())
    .then(data => {
        locations = data;

        // Actualizar los campos desplegables
        updateSelects();
    });

// Función para seleccionar una opción en un campo desplegable
function selectOption(selectElement, value) {
    const options = Array.from(selectElement.options);
    const selectedOption = options.find(option => option.value === value);
  
    if (selectedOption) {
        selectedOption.selected = true;
    }
}

// Actualizar los campos desplegables
function updateSelects() {
    // Obtener la región, departamento y municipio seleccionados actualmente
    const selectedRegion = regionSelect.value;
    const selectedDepartamento = departamentoSelect.value;
    const selectedMunicipio = municipioSelect.value;

    // Obtener las regiones únicas
    const regions = [...new Set(locations.map(location => location.region))];

    // Limpiar y actualizar el campo desplegable de región
    regionSelect.innerHTML = '';
    regions.forEach(region => {
        const option = document.createElement('option');
        option.value = region;
        option.textContent = region;
        regionSelect.appendChild(option);
    });
    selectOption(regionSelect, selectedRegion);

    // Obtener los departamentos únicos para la región seleccionada
    const departamentos = [...new Set(locations.filter(location => location.region === selectedRegion).map(location => location.departamento))];

    // Limpiar y actualizar el campo desplegable de departamento
    departamentoSelect.innerHTML = '';
    departamentos.forEach(departamento => {
        const option = document.createElement('option');
        option.value = departamento;
        option.textContent = departamento;
        departamentoSelect.appendChild(option);
    });
    selectOption(departamentoSelect, selectedDepartamento);

    // Obtener los municipios únicos para la región y departamento seleccionados
    const municipios = [...new Set(locations.filter(location => location.region === selectedRegion && location.departamento === selectedDepartamento).map(location => location.municipio))];

    // Limpiar y actualizar el campo desplegable de municipio
    municipioSelect.innerHTML = '';
    municipios.forEach(municipio => {
        const option = document.createElement('option');
        option.value = municipio;
        option.textContent = municipio;
        municipioSelect.appendChild(option);
    });
    // Si el municipio seleccionado anteriormente está disponible para la región y departamento seleccionados, se selecciona; de lo contrario, se selecciona el primer municipio de la lista
    selectOption(municipioSelect, municipios.includes(selectedMunicipio) ? selectedMunicipio : municipios[0]);
}

// Escuchar cambios en el campo desplegable de región y actualizar los campos desplegables en consecuencia
regionSelect.addEventListener('change', () => {
    updateSelects();
});

// Escuchar cambios en el campo desplegable de departamento y actualizar los campos desplegables en consecuencia
departamentoSelect.addEventListener('change', () => {
    updateSelects();
});



</script>


<script src="{{ asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

<script src="{{ asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>

<script src="{{ asset('build/js/app.js') }}"></script>
@endsection