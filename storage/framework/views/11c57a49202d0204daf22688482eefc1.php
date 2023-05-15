
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
  <script>
    const cantidadInput = document.getElementById('cantidad-input');
    const valorUnitarioInput = document.getElementById('valor-unitario-input');
    const subtotalInput = document.getElementById('subtotal-input');
    const totalInput = document.getElementById('total-input');
    function calcularSubtotalYTotal() {
      const cantidad = cantidadInput.valueAsNumber;
      const valorUnitario = valorUnitarioInput.valueAsNumber;
      const subtotal = cantidad * valorUnitario;
      subtotalInput.value = subtotal.toLocaleString();
      totalInput.value = subtotal.toLocaleString();
    }
    cantidadInput.addEventListener('input', calcularSubtotalYTotal);
    valorUnitarioInput.addEventListener('input', calcularSubtotalYTotal);
  </script>
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


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


<script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Allbaute\Allbaute\resources\views/ordenCompra/create.blade.php ENDPATH**/ ?>