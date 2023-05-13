
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.create-product'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Insumos
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Crear insumos
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <script>
        // Función para mostrar u ocultar los campos dependiendo de la categoría seleccionada
        function mostrarCamposCategoria() {
          var categoria = document.getElementById('categ').value;
      
          // Ocultar todos los campos
          document.getElementById('colorField').style.display = 'none';
          document.getElementById('unidadField').style.display = 'none';
          document.getElementById('anchoField').style.display = 'none';
          document.getElementById('materialField').style.display = 'none';
          document.getElementById('tagsField').style.display = 'none';
          document.getElementById('estadoField').style.display = 'none';
      
          // Mostrar los campos correspondientes a la categoría seleccionada
          if (categoria === 'tela') {
            document.getElementById('colorField').style.display = 'block';
            document.getElementById('unidadField').style.display = 'block';
            document.getElementById('anchoField').style.display = 'block';
            document.getElementById('materialField').style.display = 'block';
            document.getElementById('tagsField').style.display = 'block';
            document.getElementById('estadoField').style.display = 'block';
          } else if (categoria === 'cremallera' || categoria === 'boton') {
            document.getElementById('colorField').style.display = 'block';
            document.getElementById('materialField').style.display = 'block';
            document.getElementById('tagsField').style.display = 'block';
            document.getElementById('estadoField').style.display = 'block';
          }
        }
      </script>


    <form action="<?php echo e(route('insumos.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                      </div>
                    <div class="mb-3">
                      <label for="img" class="form-label">Imagen</label>
                      <input type="file" class="form-control" id="img" name="img" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                      <label for="precio" class="form-label">Precio</label>
                      <input type="text" class="form-control" id="precio" name="precio" required>
                  </div>
                  <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock" required>
                  </div>
                   <div class="mb-3">
                     <label for="descuento" class="form-label">Descuento</label>
                     <input type="text" class="form-control" id="descuento" name="descuento">
                   </div>
                   <div class="mb-3">
                    <label for="categ" class="form-label">Categoría</label>
                    <select class="form-control" id="categ" name="categ" required onchange="mostrarCamposCategoria()">
                      <option value="">Seleccione una categoría</option>
                      <option value="tela">Tela</option>
                      <option value="cremallera">Cremallera</option>
                      <option value="boton">Botón</option>
                    </select>
                  </div>
        
                  <div class="mb-3" id="colorField" style="display: none;">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color">
                  </div>
                  <div class="mb-3" id="unidadField" style="display: none;">
                    <label for="unidad" class="form-label">Unidad</label>
                    
                      <select class="form-control" id="unidad" name="unidad">
                        <option value="">Seleccione Unidad de medida</option>
                        <option value="Metro">Metro</option>
                        <option value="Yarda">Yarda</option>
                        <option value="Pulgada">Pulgada</option>
                        <option value="Centimetros">Centimetros</option>
                        <option value="Pie">Pie</option>
                      </select>
                  </div>
                  <div class="mb-3" id="anchoField" style="display: none;">
                    <label for="ancho" class="form-label">Ancho</label>
                    <input type="text" class="form-control" id="ancho" name="ancho">
                  </div>
                  <div class="mb-3" id="materialField" style="display: none;">
                    <label for="material" class="form-label">Material</label>
                    <input type="text" class="form-control" id="material" name="material">
                  </div>
                  <div class="mb-3" id="tagsField" style="display: none;">
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" class="form-control" id="tags" name="tags">
                  </div>
                  <div class="mb-3" id="estadoField" style="display: none;">
                    <label for="estado" class="form-label">Estado del insumo</label>
                    
                    <select class="form-control" id="estado" name="estado">
                        <option value="">Seleccione estado del insumo</option>
                        <option value="1">Terminado</option>
                        <option value="2">Emproducción</option>
                      </select>
                  </div>
                   <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </form>
      
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/insumos/create.blade.php ENDPATH**/ ?>