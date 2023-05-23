<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.editar-product'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
<link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
Proveedores
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
Editar insumos
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

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
                            <label for="choices-publish-status-input" class="form-label">Categoria de insumos</label>
                            <select class="form-select" id="choices-publish-status-input" name="categ" data-choices data-choices-search-false>
                                <option value="">Selecciona una opción</option>
                                <?php $__currentLoopData = $paramcateg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($param->id_tipo == 1): ?>
                                        <option value="<?php echo e($param->nombre); ?>" <?php echo e($param->nombre == $insumo->categ ? 'selected' : ''); ?>>
                                            <?php echo e($param->nombre); ?>

                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                <label for="choices-publish-status-input" class="form-label">Tipo de tela</label>
                                                <select class="form-select" id="choices-publish-status-input" name="subcateg" data-choices data-choices-search-false required>
                                                    <?php $__currentLoopData = $paramcateg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($param->id_tipo == 2): ?>
                                                        <option value="<?php echo e($param->nombre); ?>" <?php echo e($param->nombre == $insumo->subcateg ? 'selected' : ''); ?>>
                                                            <?php echo e($param->nombre); ?>

                                                        </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    `;
                                } else if (selectedValue === 'Botón' || selectedValue === 'Cremalleras') {
                                    // Agregar el código HTML al contenedor
                                    cardBodyContainerEl.innerHTML = `
                                        <div class="card-body">
                                            <div class="mb-2">
                                                <label for="choices-publish-status-input" class="form-label">Tipo de Material</label>
                                                <select class="form-select" id="choices-publish-status-input" name="subcateg" data-choices data-choices-search-false required>
                                                    <?php $__currentLoopData = $paramcateg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($param->id_tipo == 3): ?>
                                                        <option value="<?php echo e($param->nombre); ?>" <?php echo e($param->nombre == $insumo->subcateg ? 'selected' : ''); ?>>
                                                            <?php echo e($param->nombre); ?>

                                                        </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    `;
                                } else {
                                    // Limpiar el contenido del contenedor si no se selecciona una opción correspondiente
                                    cardBodyContainerEl.innerHTML = '';
                                }
                            });
                    
                            // Simular el evento 'change' para mostrar la subcategoría seleccionada inicialmente
                            selectEl.value = '<?php echo e($insumo->categ); ?>';
                            selectEl.dispatchEvent(new Event('change'));
                        </script>
                        
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
<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

<script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/insumos/edit.blade.php ENDPATH**/ ?>