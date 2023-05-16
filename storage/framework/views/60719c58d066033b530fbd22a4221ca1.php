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
                    <form action="<?php echo e(route('insumos.update', $insumo->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <!-- Campos del formulario de edición -->
                        <div class="mb-3">
                            <label for="img">Imagen</label>
                            <input type="file" class="form-control" id="img" name="img">
                            <?php if($insumo->img): ?>
                                <img src="<?php echo e(asset('images/'.$insumo->img)); ?>" alt="Imagen actual" style="max-width: 50px; margin-top: 10px;">
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control" id="tags" name="tags" value="<?php echo e($insumo->tags); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" value="<?php echo e($insumo->precio); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo e($insumo->stock); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="descuento">Descuento</label>
                            <input type="number" class="form-control" id="descuento" name="descuento" value="<?php echo e($insumo->descuento); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="color">Color</label>
                            <input type="text" class="form-control" id="color" name="color" value="<?php echo e($insumo->color); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="unidad">Unidad</label>
                            <input type="text" class="form-control" id="unidad" name="unidad" value="<?php echo e($insumo->unidad); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="ancho">Ancho</label>
                            <input type="number" class="form-control" id="ancho" name="ancho" value="<?php echo e($insumo->ancho); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado" required>
                                <option value="1" <?php echo e($insumo->estado == 1 ? 'selected' : ''); ?>>Terminado</option>
                                <option value="0" <?php echo e($insumo->estado == 0 ? 'selected' : ''); ?>>Producción</option>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/insumos/edit.blade.php ENDPATH**/ ?>