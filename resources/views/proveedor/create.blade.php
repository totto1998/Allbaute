@extends('layouts.master')
@section('title')
@lang('translation.create-product')
@endsection
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
<link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('build/css/style.css') }}">
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1')
Proveedores
@endslot
@slot('title')
Ingresar nuevo proveedor
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
              <input type="text" name="nombre_contacto" class="form-control" id="nombre-de-contacto" placeholder="Ingrese ingrese el nombre del contacto" required pattern="[A-Za-z\s]+" oninput="eliminarComillas(this)" required>
            </div>
              <label for="email">Email:</label>
              <div class="input-group">
                <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese su email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninput="eliminarComillas(this)" required>
                <div class="invalid-feedback" style="position:absolute; bottom:-1.5rem; left:0;">Ingrese un correo electrónico válido.
                </div>
              </div>
            <br>
          </div>
          <div class="row">
              <div class="col-md-6 mb-3">
                <label for="razon-social" class="form-label">Razón Social</label>
                <input type="text" name="razon_social" class="form-control" id="razon-social" placeholder="Ingrese su razón social" required pattern="[A-Za-z\s\.]+" oninput="eliminarComillas(this)" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="nit" class="form-label">NIT</label>
                <input type="text" name="nit" class="form-control" id="nit" placeholder="Ingrese su NIT" required pattern="[0-9]+" oninput="eliminarComillas(this)">
              </div>
          </div>
          <div class="row">
              <div class="col-md-6 mb-3">
                <label for="telefono-fijo" class="form-label">Teléfono fijo</label>
                <input type="text" name="telefono_fijo" class="form-control" id="telefono-fijo" placeholder="Ingrese su teléfono fijo" required pattern="[0-9]+" oninput="eliminarComillas(this)" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" name="celular" class="form-control" id="celular" placeholder="Ingrese su celular" required pattern="[0-9]+" oninput="eliminarComillas(this)" required>
              </div>
          </div>
          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Ingrese su dirección" required oninput="eliminarComillas(this)" required>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="region">Región</label>
              <select name="region" id="region" class="form-control">
                  @foreach ($locations as $location)
                      <option value="{{ $location['region'] }}">{{ $location['region'] }}</option>
                  @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="departamento">Departamento</label>
              <select name="departamento" id="departamento" class="form-control">
                  @foreach ($locations as $location)
                      <option value="{{ $location['departamento'] }}">{{ $location['departamento'] }}</option>
                  @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="municipio">Ciudad</label>
              <select name="municipio" id="municipio" class="form-control">
                  @foreach ($locations as $location)
                      <option value="{{ $location['municipio'] }}">{{ $location['municipio'] }}</option>
                  @endforeach
              </select>
          </div>
        </div>

          
        <div class="mb-3">
            {{--  <label for="tipo-insumo" class="form-label">Tipo de insumo</label>
            <select class="form-select" name="t_insumo" id="tipo-insumo" required>
              <option selected>Seleccione una opción</option>
              <option value="1">Lino</option>
              <option value="2">Algodón</option>
              <option value="3">Boton</option>
            </select>  --}}

            {{--  <div class="mb-3">
              <label for="tipo-insumo" class="form-label">Tipo de insumo</label>
              <select class="form-select" name="t_insumo[]" id="tipo-insumo" multiple>
                <option value="1">Lino</option>
                <option value="2">Algodón</option>
                <option value="3">Botón</option>
              </select>
            </div>  --}}

            <div class="row">
              <div class="col-md-6 mb-3">
                  <label for="tipo-insumo" class="form-label">Tipo de insumo</label>
                  <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="tipo-insumo-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                          Seleccionar insumos
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="tipo-insumo-dropdown">
                          @foreach ($insumos as $insumo)
                          <li>
                              <input type="checkbox" id="tipo-insumo-{{ $insumo->id }}" name="t_insumo[]" value="{{ $insumo->id }}">
                              <label for="tipo-insumo-{{ $insumo->id }}">{{ $insumo->subcateg }}</label>
                          </li>
                          @endforeach
                      </ul>
                  </div>
              </div>                            
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
  </div>
</form>

<style>
  .user-details {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .user-details input[type="text"] {
    width: 100%;
    box-sizing: border-box;
    padding: 10px;
    font-size: 18px;
  }
</style>
<style>
    .user-details {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    
    .user-details input[type="text"] {
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
        font-size: 18px;
    }
</style>



</div>

{{--  <script>
  function eliminarComillas(input) {
    input.value = input.value.replace(/['"=]/g, '');
  }
</script>  --}}


@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

<script>
  // Inicializar Select2 en el campo de selección múltiple
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

        // Actualizar el campo desplegable de región
        updateRegionSelect();
    });

// Actualizar el campo desplegable de región
function updateRegionSelect() {
    // Obtener las regiones únicas
    const regions = [...new Set(locations.map(location => location.region))];

    // Limpiar el campo desplegable
    regionSelect.innerHTML = '';

    // Agregar las opciones al campo desplegable
    regions.forEach(region => {
        const option = document.createElement('option');
        option.value = region;
        option.textContent = region;
        regionSelect.appendChild(option);
    });

    // Actualizar el campo desplegable de departamento
    updateDepartamentoSelect();
}

// Actualizar el campo desplegable de departamento
function updateDepartamentoSelect() {
    // Obtener la región seleccionada
    const selectedRegion = regionSelect.value;

    // Filtrar los departamentos por la región seleccionada
    const departamentos = locations.filter(location => location.region === selectedRegion);

    // Obtener los departamentos únicos
    const uniqueDepartamentos = [...new Set(departamentos.map(departamento => departamento.departamento))];

    // Limpiar el campo desplegable
    departamentoSelect.innerHTML = '';

    // Agregar las opciones al campo desplegable
    uniqueDepartamentos.forEach(departamento => {
        const option = document.createElement('option');
        option.value = departamento;
        option.textContent = departamento;
        departamentoSelect.appendChild(option);
    });

    // Actualizar el campo desplegable de ciudad
    updateMunicipioSelect();
}

// Actualizar el campo desplegable de ciudad
function updateMunicipioSelect() {
    // Obtener el departamento seleccionado
    const selectedDepartamento = departamentoSelect.value;

    // Filtrar las ciudades por el departamento seleccionado
    const municipios = locations.filter(location => location.departamento === selectedDepartamento);

    // Obtener las ciudades únicas
    const uniqueMunicipios = [...new Set(municipios.map(municipio => municipio.municipio))];

    // Limpiar el campo desplegable
    municipioSelect.innerHTML = '';

    // Agregar las opciones al campo desplegable
    uniqueMunicipios.forEach(municipio => {
        const option = document.createElement('option');
        option.value = municipio;
        option.textContent = municipio;
        municipioSelect.appendChild(option);
    });
}

// Escuchar cambios en el campo desplegable de región y actualizar el campo desplegable de departamento en consecuencia
regionSelect.addEventListener('change', () => {
    updateDepartamentoSelect();
});

// Escuchar cambios en el campo desplegable de departamento y actualizar el campo desplegable de ciudad en consecuencia
departamentoSelect.addEventListener('change', () => {
    updateMunicipioSelect();
});

</script>


<script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection