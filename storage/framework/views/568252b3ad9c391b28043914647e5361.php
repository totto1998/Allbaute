<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Editar')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <!-- edit.blade.php -->
                    <form action="<?php echo e(route('parametrizacion.update', $param->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <!-- Campos del formulario de edición -->
                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($param->nombre); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo e($param->descripcion); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_parametrizacion">Tipo de Parametrización</label>
                            <select class="form-control" id="tipo_parametrizacion" name="tipo_parametrizacion" required>
                                <?php $__currentLoopData = $tiposParametrizacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tipo->id); ?>" <?php echo e($param->tipoParametrizacion->id == $tipo->id ? 'selected' : ''); ?>><?php echo e($tipo->nombre); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado" required>
                                <option value="1" <?php echo e($param->estado == 1 ? 'selected' : ''); ?>>Activo</option>
                                <option value="0" <?php echo e($param->estado == 0 ? 'selected' : ''); ?>>Inactivo</option>
                            </select>
                        </div>
                        <!-- Otros campos del formulario -->
                    
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/parametrizacion/edit.blade.php ENDPATH**/ ?>