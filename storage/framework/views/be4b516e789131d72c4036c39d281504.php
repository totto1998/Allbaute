
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

<form action="<?php echo e(route('parametrizacion.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea required pattern="[a-zA-Z]+" class="form-control" id="descripcion" name="descripcion" rows="10"></textarea>
                    </div>
                </div>
            </div>

        </div>


        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="tipo_parametrizacion" class="form-label">Tipo de Parámetro</label>
                        <select class="form-select" id="tipo_parametrizacion" name="tipo_parametrizacion" required>
                            <option value="">Seleccionar tipo de parámetro</option>
                            <?php $__currentLoopData = $parametrizacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tipo->id); ?>"><?php echo e($tipo->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label for="estado">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="">Seleccionar estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
 
            </div>


            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Nombre del parametro</h5>
                </div>

                <div class="card-body">
                    <div>
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required pattern="[a-zA-Z]+">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="content">
        <form action="#">
            <div class="user-details">
                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </div>
        </form>
    </div>
</form>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Allbaute\Allbaute\resources\views/parametrizacion/create.blade.php ENDPATH**/ ?>