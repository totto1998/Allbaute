
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.create-product'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">
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
                                <label for="choices-publish-status-input" class="form-label">Unidad de medida</label>
                                    <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false required>
                                        <option value="">Metro</option>
                                        <option value="Yarda">Yarda</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ancho-input" class="form-label">Ancho de la tela</label>
                                <input type="text" id="ancho-input" class="form-control" required pattern="[A-Za-z]+" placeholder="Ingrese ancho de la tela">
                            </div>
                            <div class="mb-3">
                             <label for="color-input" class="form-label">Color</label>
                             <input type="text" id="color-input" class="form-control" required pattern="[A-Za-z]+"placeholder="Ingrese color">
                            </div>
                        </div>
                        <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Tags de insumos</h5>
                                </div>
                                <div class="card-body">
                                    <div class="hstack gap-3 align-items-start">
                                        <div class="flex-grow-1">
                                            <input class="form-control" data-choices data-choices-multiple-remove="true" placeholder="Enter tags" type="text"
                                     value="" required pattern="[A-Za-z\s]+" />
                                     </div>
                                 </div>
                                </div>
                            </div>
                    `;
                } else if (selectedValue === 'boton' || selectedValue === 'cremallera') {
                    // Agregar el código HTML al contenedor
                    cardBodyContainerEl.innerHTML = `
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="choices-publish-status-input" class="form-label">Unidad de medida</label>
                                    <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false required>
                                        <option value="">Plastico</option>
                                        <option value="Metal">Yarda</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="color-input" class="form-label">Color</label>
                                <input type="text" id="color-input" class="form-control" placeholder="Ingrese color">
                            </div>
                        </div>
                        <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Tags de insumos</h5>
                                </div>
                                <div class="card-body">
                                    <div class="hstack gap-3 align-items-start">
                                        <div class="flex-grow-1">
                                            <input class="form-control" data-choices data-choices-multiple-remove="true" placeholder="Enter tags" type="text"
                                        value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                    `;
                } else {
                    // Limpiar el contenido del contenedor si no se selecciona una opción correspondiente
                    cardBodyContainerEl.innerHTML = '';
                }
            });
            </script
<div class="form-group">
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


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>


<script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Allbaute\Allbaute\resources\views/ordenCompra/create.blade.php ENDPATH**/ ?>