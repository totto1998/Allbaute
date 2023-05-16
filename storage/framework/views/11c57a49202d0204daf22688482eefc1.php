
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.create-product'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(URL::asset('build/css/style.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
Ecommerce
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
Crear nueva parametrizacion
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!DOCTYPE html>
<html>
<form>
  <div class="row mb-3">
    <div class="col-md-6">
      <label for="tipo-insumo-select" class="form-label">Razon social</label>
      <select class="form-select" id="tipo-insumo-select" required>
        <option selected disabled value="">Selecciona una opción</option>
        <option value="Tela">Kalvint</option>
        <option value="Botón">Toto</option>
        <option value="Cremallera">Velez</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="tipo-insumo-select" class="form-label">Tipo de insumo</label>
      <select class="form-select" id="tipo-insumo-select" required>
        <option selected disabled value="">Selecciona una opción</option>
        <option value="Tela">Lino</option>
        <option value="Botón">Algodón</option>
      </select>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-6">
      <label for="cantidad-input" class="form-label">Cantidad de insumo</label>
      <input type="number" class="form-control" id="cantidad-input" required>
    </div>
    <div class="col-md-6">
      <label for="valor-unitario-input" class="form-label">Valor unitario del insumo</label>
      <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="number" class="form-control" id="valor-unitario-input" required>
      </div>
    </div>
  </div>
  <form>
    <div id="insumos-container">
      <!-- Aquí se agregarán dinámicamente los insumos seleccionados -->
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label for="subtotal-input" class="form-label">Subtotal</label>
        <div class="input-group">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control" id="subtotal-input" readonly>
        </div>
      </div>
      <div class="col-md-6">
        <label for="total-input" class="form-label">Total a pagar</label>
        <div class="input-group">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control" id="total-input" readonly>
        </div>
      </div>
    </div>

    <button type="button" class="btn btn-primary" onclick="agregarInsumo()">Agregar Insumo</button>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
  <script>
    // Obtener los elementos del formulario
    const cantidadInput = document.getElementById('cantidad-input');
    const valorUnitarioInput = document.getElementById('valor-unitario-input');
    const subtotalInput = document.getElementById('subtotal-input');
    const totalInput = document.getElementById('total-input');

    let insumos = [];

  // Función para agregar un nuevo insumo al formulario
  function agregarInsumo() {
  const insumosContainer = document.getElementById('insumos-container');

  const divRow = document.createElement('div');
  divRow.classList.add('row', 'mb-3');

  const divCol1 = document.createElement('div');
  divCol1.classList.add('col-md-4');
  const labelInsumo = document.createElement('label');
  labelInsumo.textContent = 'Tipo de insumo';
  const selectInsumo = document.createElement('select');
  selectInsumo.classList.add('form-select');
  selectInsumo.addEventListener('input', calcularTotal);

  // ... código para las opciones del select ...

  divCol1.appendChild(labelInsumo);
  divCol1.appendChild(selectInsumo);

  // ... código para las columnas de cantidad y valor unitario ...

  // Agregar columna para el subtotal
  const divCol4 = document.createElement('div');
  divCol4.classList.add('col-md-4');
  const labelSubtotal = document.createElement('label');
  labelSubtotal.textContent = 'Subtotal';
  const inputSubtotal = document.createElement('input');
  inputSubtotal.type = 'text';
  inputSubtotal.classList.add('form-control');
  inputSubtotal.readOnly = true;

  divCol4.appendChild(labelSubtotal);
  divCol4.appendChild(inputSubtotal);

  divRow.appendChild(divCol1);
  divRow.appendChild(divCol2);
  divRow.appendChild(divCol3);
  divRow.appendChild(divCol4);

  insumosContainer.appendChild(divRow);
}


  // Función para calcular el subtotal y el total
  function calcularTotal() {
    let subtotal = 0;

    const rows = document.getElementById('insumos-container').querySelectorAll('.row');

    rows.forEach(row => {
      const cantidadInput = row.querySelector('.col-md-4 input[type="number"]');
      const valorUnitarioInput = row.querySelector('.col-md-4 input[type="number"]');

      const cantidad = cantidadInput.valueAsNumber;
      const valorUnitario = valorUnitarioInput.valueAsNumber;

      subtotal += cantidad * valorUnitario;
    });

    const subtotalInput = document.getElementById('subtotal-input');
    const totalInput = document.getElementById('total-input');

    subtotalInput.value = subtotal.toLocaleString();
    totalInput.value = subtotal.toLocaleString();
  }

    
    // Calcular subtotal y total
    function calcularSubtotal() {
      const cantidad = parseFloat(cantidadInput.value);
      const valorUnitario = parseFloat(valorUnitarioInput.value);

      const subtotal = cantidad * valorUnitario;

      subtotalInput.value = subtotal.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD'
      });

      calcularTotal();
    }

    function calcularTotal() {
      const subtotal = parseFloat(subtotalInput.value.replace(/\$|,/g, ''));
      totalInput.value = subtotal.toLocaleString('en-US', {
        style: 'currency',
        currency: 'USD'
      });
    }

    // Agregar evento de cambio para recalcular el subtotal y el total
    cantidadInput.addEventListener('input', calcularSubtotal);
    valorUnitarioInput.addEventListener('input', calcularSubtotal);
  </script>





  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('script'); ?>


  <script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>">
  </script>

  <script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Allbaute\Allbaute\resources\views/ordenCompra/create.blade.php ENDPATH**/ ?>