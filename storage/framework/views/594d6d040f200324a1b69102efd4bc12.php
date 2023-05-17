
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
Proveedores
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
Ingresar nuevo proveedor
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<form>
  <div class="form-group">
    <label for="email">Email:</label>
    <div class="input-group">
      <input type="email" class="form-control" id="email" placeholder="Ingrese su email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninput="eliminarComillas(this)">
      <div class="invalid-feedback" style="position:absolute; bottom:-1.5rem; left:0;">Ingrese un correo electrónico válido.</div>
    </div>
    <br>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="razon-social" class="form-label">Razón Social</label>
      <input type="text" class="form-control" id="razon-social" placeholder="Ingrese su razón social" required pattern="[A-Za-z\s]+" oninput="eliminarComillas(this)">
    </div>
    <div class="col-md-6 mb-3">
      <label for="nit" class="form-label">NIT</label>
      <input type="text" class="form-control" id="nit" placeholder="Ingrese su NIT" required pattern="[0-9]+" oninput="eliminarComillas(this)">
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="telefono-fijo" class="form-label">Teléfono fijo</label>
      <input type="text" class="form-control" id="telefono-fijo" placeholder="Ingrese su teléfono fijo" required pattern="[0-9]+" oninput="eliminarComillas(this)">
    </div>
    <div class="col-md-6 mb-3">
      <label for="celular" class="form-label">Celular</label>
      <input type="text" class="form-control" id="celular" placeholder="Ingrese su celular" required pattern="[0-9]+" oninput="eliminarComillas(this)">
    </div>
  </div>
  <div class="mb-3">
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="direccion" placeholder="Ingrese su dirección" required oninput="eliminarComillas(this)">
  </div>
  <script>
    fetch('https://www.datos.gov.co/resource/xdk5-pm3f.json')
      .then(response => response.json())
      .then(data => {
        // Aquí puedes procesar y utilizar los datos
        console.log(data);
      })
      .catch(error => {
        // Manejo de errores
        console.error('Error al obtener los datos:', error);
      });
  </script>
  <br>
  <div class="mb-3">
    <label for="nombre-de-contacto" class="form-label">Nombre del contacto</label>
    <input type="text" class="form-control" id="nombre-de-contacto" placeholder="Ingrese ingrese el nombre del contacto" required pattern="[A-Za-z\s]+" oninput="eliminarComillas(this)">
  </div>
  </div>
  <div class="mb-3">
    <label for="tipo-insumo" class="form-label">Tipo de insumo</label>
    <select class="form-select" id="tipo-insumo" required>
      <option selected>Seleccione una opción</option>
      <option value="1">Lino</option>
      <option value="2">Algodón</option>
      <option value="3">Boton</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="tags" class="form-label">Tags</label>
    <input type="text" class="form-control" id="tags" placeholder="Ingrese los tags" required pattern="[A-Za-z\s]+" oninput="eliminarComillas(this)">

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

<div class="content">
    <form action="#">
        <div class="button">
            <input type="submit" value="Register">
        </div>
    </form>
</div>

</div>
<script>
  function eliminarComillas(input) {
    input.value = input.value.replace(/['"=]/g, '');
  }
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Allbaute\Allbaute\resources\views/proveedor/create.blade.php ENDPATH**/ ?>