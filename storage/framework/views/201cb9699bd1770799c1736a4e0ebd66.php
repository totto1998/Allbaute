
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.create-product'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">
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
    <input type="email" class="form-control" id="email" placeholder="Ingrese su email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
    <div class="invalid-feedback" style="position:absolute; bottom:-1.5rem; left:0;">Ingrese un correo electrónico válido.</div>
  </div>
  <br>
</div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="razon-social" class="form-label">Razón Social</label>
        <input type="text" class="form-control" id="razon-social" placeholder="Ingrese su razón social" required pattern="[A-Za-z\s]+">
      </div>
      <div class="col-md-6 mb-3">
        <label for="nit" class="form-label">NIT</label>
        <input type="text" class="form-control" id="nit" placeholder="Ingrese su NIT" required pattern="[0-9]+">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="telefono-fijo" class="form-label">Teléfono fijo</label>
        <input type="text" class="form-control" id="telefono-fijo" placeholder="Ingrese su teléfono fijo" required pattern="[0-9]+">
      </div>
      <div class="col-md-6 mb-3">
        <label for="celular" class="form-label">Celular</label>
        <input type="text" class="form-control" id="celular" placeholder="Ingrese su celular" required pattern="[0-9]+">
      </div>
    </div>
    <div class="mb-3">
      <label for="direccion" class="form-label">Dirección</label>
      <input type="text" class="form-control" id="direccion" placeholder="Ingrese su dirección" required>
    </div>
    <div class="row">
    <label for="direccion" class="form-label">Ciudad</label>
    <select class="form-select" id="ciudad" name="ciudad">
  <option selected>Seleccione su ciudad</option>
  <optgroup label="Amazonas">
    <option value="Leticia">Leticia</option>
    <option value="Puerto Nariño">Puerto Nariño</option>
  </optgroup>
  <optgroup label="Antioquia">
    <option value="Medellín">Medellín</option>
    <option value="Bello">Bello</option>
    <option value="Envigado">Envigado</option>
    <option value="Itagüí">Itagüí</option>
    <option value="Sabaneta">Sabaneta</option>
  </optgroup>
  <optgroup label="Arauca">
    <option value="Arauca">Arauca</option>
  </optgroup>
  <optgroup label="Atlántico">
    <option value="Barranquilla">Barranquilla</option>
    <option value="Galapa">Galapa</option>
    <option value="Malambo">Malambo</option>
    <option value="Puerto Colombia">Puerto Colombia</option>
    <option value="Soledad">Soledad</option>
  </optgroup>
  <optgroup label="Bolívar">
    <option value="Cartagena">Cartagena</option>
  </optgroup>
  <optgroup label="Boyacá">
    <option value="Tunja">Tunja</option>
    <option value="Villa de Leyva">Villa de Leyva</option>
  </optgroup>
  <optgroup label="Caldas">
    <option value="Manizales">Manizales</option>
    <option value="Chinchiná">Chinchiná</option>
  </optgroup>
  <optgroup label="Caquetá">
    <option value="Florencia">Florencia</option>
  </optgroup>
  <optgroup label="Casanare">
    <option value="Aguazul">Aguazul</option>
    <option value="Yopal">Yopal</option>
  </optgroup>
  <optgroup label="Cauca">
    <option value="Popayán">Popayán</option>
  </optgroup>
  <optgroup label="Cesar">
    <option value="Valledupar">Valledupar</option>
  </optgroup>
  <optgroup label="Chocó">
    <option value="Quibdó">Quibdó</option>
  </optgroup>
  <optgroup label="Córdoba">
    <option value="Montería">Montería</option>
  </optgroup>
  <optgroup label="Cundinamarca">
    <option value="Bogotá">Bogotá</option>
  </optgroup>
  <optgroup label="Guainía">
    <option value="Inírida">Inírida</option>
  </optgroup>
   <optgroup label="Huila">
    <option value="Neiva">Neiva</option>
  </optgroup>
  <optgroup label="La Guajira">
    <option value="Riohacha">Riohacha</option>
  </optgroup>
  <optgroup label="Magdalena">
    <option value="Santa Marta">Santa Marta</option>
  </optgroup>
  <optgroup label="Meta">
    <option value="Villavicencio">Villavicencio</option>
  </optgroup>
  <optgroup label="Nariño">
    <option value="Pasto">Pasto</option>
  </optgroup>
  <optgroup label="Norte de Santander">
    <option value="Cúcuta">Cúcuta</option>
  </optgroup>
  <optgroup label="Putumayo">
    <option value="Mocoa">Mocoa</option>
  </optgroup>
  <optgroup label="Quindío">
    <option value="Armenia">Armenia</option>
  </optgroup>
  <optgroup label="Risaralda">
    <option value="Pereira">Pereira</option>
  </optgroup>
  <optgroup label="San Andrés y Providencia">
    <option value="San Andrés">San Andrés</option>
  </optgroup>
  <optgroup label="Santander">
    <option value="Bucaramanga">Bucaramanga</option>
  </optgroup>
  <optgroup label="Sucre">
    <option value="Sincelejo">Sincelejo</option>
  </optgroup>
  <optgroup label="Tolima">
    <option value="Ibagué">Ibagué</option>
  </optgroup>
  <optgroup label="Vaupés">
    <option value="Mitú">Mitú</option>
  </optgroup>
  <optgroup label="Vichada">
    <option value="Vichada">Vichada</option>
  </optgroup>
    </select>
    </div>
    <br>
    <div class="mb-3">
      <label for="nombre-de-contacto" class="form-label">Nombre del contacto</label>
      <input type="text" class="form-control" id="nombre-de-contacto" placeholder="Ingrese ingrese el nombre del contacto" required pattern="[A-Za-z\s]+">
    </div>
    </div>
    <div class="mb-3">
      <label for="tipo-insumo" class="form-label">Tipo de insumo</label>
      <select class="form-select" id="tipo-insumo" required>
        <option selected>Seleccione una opción</option>
        <option value="1">lino</option>
        <option value="2">algodon</option>
        <option value="3">boton</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="tags" class="form-label">Tags</label>
      <input type="text" class="form-control" id="tags" placeholder="Ingrese los tags" required pattern="[A-Za-z\s]+">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/proveedor/create.blade.php ENDPATH**/ ?>