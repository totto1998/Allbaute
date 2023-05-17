
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
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
      <div class="input-group">
      </div>
    </div>
  </div>
  <form>
    <div id="insumos-container">
      <!-- Aquí se agregarán dinámicamente los insumos seleccionados -->
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label for="subtotal-input" class="form-label">Total a pagar</label>
        <div class="input-group">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control" id="subtotal-input" readonly>
        </div>
      </div>
    </div>

    <button type="button" class="btn btn-primary" onclick="agregarInsumo()">Agregar Insumo</button>
    <div class="content">
    <form action="#">
        <div class="button">
            <input type="submit" value="Register">
        </div>
    </form>
</div>
  </form>
  <script>
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

  const optionDefault = document.createElement('option');
  optionDefault.disabled = true;
  optionDefault.selected = true;
  optionDefault.textContent = 'Selecciona una opción';

  const optionTela = document.createElement('option');
  optionTela.value = 'Lino';
  optionTela.textContent = 'Lino';

  const optionBoton = document.createElement('option');
  optionBoton.value = 'Algodon';
  optionBoton.textContent = 'Algodon';

  const optionCremallera = document.createElement('option');
  optionCremallera.value = 'Boton';
  optionCremallera.textContent = 'Boton';

  selectInsumo.appendChild(optionDefault);
  selectInsumo.appendChild(optionTela);
  selectInsumo.appendChild(optionBoton);
  selectInsumo.appendChild(optionCremallera);

  divCol1.appendChild(labelInsumo);
  divCol1.appendChild(selectInsumo);

  const divCol2 = document.createElement('div');
  divCol2.classList.add('col-md-4');
  const labelCantidad = document.createElement('label');
  labelCantidad.textContent = 'Cantidad de insumo';
  const inputCantidad = document.createElement('input');
  inputCantidad.type = 'number';
  inputCantidad.classList.add('form-control');
  inputCantidad.addEventListener('input', calcularTotal);

  divCol2.appendChild(labelCantidad);
  divCol2.appendChild(inputCantidad);

  const divCol3 = document.createElement('div');
  divCol3.classList.add('col-md-4');
  const labelValorUnitario = document.createElement('label');
  labelValorUnitario.textContent = 'Valor unitario';
  const inputValorUnitario = document.createElement('input');
  inputValorUnitario.type = 'number';
  inputValorUnitario.classList.add('form-control');
  inputValorUnitario.addEventListener('input', calcularTotal);

  divCol3.appendChild(labelValorUnitario);
  divCol3.appendChild(inputValorUnitario);

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


function calcularTotal() {
  let subtotal = 0;

  const rows = document.getElementById('insumos-container').querySelectorAll('.row');

  rows.forEach(row => {
    const inputCantidad = row.querySelector('.form-control');
    const inputValorUnitario = row.querySelectorAll('.form-control')[1];
    const inputSubtotal = row.querySelectorAll('.form-control')[2];

    const cantidad = inputCantidad.value;
    const valorUnitario = inputValorUnitario.value;

    const subtotalInsumo = cantidad * valorUnitario;
    inputSubtotal.value = subtotalInsumo;

    subtotal += subtotalInsumo;
  });

  // Actualiza el valor del subtotal y el total en los elementos correspondientes
  document.getElementById('subtotal-input').value = subtotal;
  document.getElementById('total-input').value = subtotal;
}
</script>
</form>
</html>

  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('script'); ?>


  <script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>">
  </script>

  <script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/ordenCompra/create.blade.php ENDPATH**/ ?>