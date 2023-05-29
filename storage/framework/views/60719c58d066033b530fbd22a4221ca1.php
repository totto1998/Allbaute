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
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label for="img" class="form-label">Imagen</label>
                                        </div>
                                        <div class="card-body">
                                            <input type="file" class="form-control" id="img" name="img" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <label for="nombre" class="form-label">Nombre</label>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" class="form-control" id="imagen" name="nombre" value="<?php echo e($insumo->nombre); ?>" required>
                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <label for="choices-publish-status-input" class="form-label">Categoría de insumos</label>
                                            </div>
                                            <div class="card-body">
                                                <select class="form-select" id="choices-publish-status-input" name="categ" data-choices data-choices-search-false>
                                                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($categoria->nombre_categoria); ?>" <?php if($insumo->categoria && $categoria->nombre_categoria == $insumo->categoria->nombre_categoria): ?> selected <?php endif; ?>><?php echo e($categoria->nombre_categoria); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                    
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <label for="choices-publish-status-input" class="form-label">Subcategoría</label>
                                            </div>
                                            <div class="card-body">
                                                <select class="form-select" id="choices-publish-status-input" name="subcateg" data-choices data-choices-search-false required>
                                                    <!-- Opciones de subcategorías -->
                                                    <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($subcategoria->id); ?>" <?php if($subcategoria->id == $insumo->subcateg): ?> selected <?php endif; ?>><?php echo e($subcategoria->nombre_sub_categoria); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <label for="choices-publish-status-input" class="form-label">Tags</label>
                                            </div>
                                            <div class="card-body">
                                                <input type="text" class="form-control" id="tags-input" name="tags" value="<?php echo e($insumo->tags); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <label for="choices-publish-status-input" class="form-label">Color</label>
                                            </div>
                                            <div class="card-body">
                                                <select class="form-select" id="color-input" name="color">
                                                    <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($subcategoria->id_categ == 3): ?> 
                                                            <option value="<?php echo e($subcategoria->nombre_sub_categoria); ?>" <?php if($subcategoria->nombre_sub_categoria == $insumo->color): ?> selected <?php endif; ?>><?php echo e($subcategoria->nombre_sub_categoria); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <label for="choices-publish-status-input" class="form-label">Unidad</label>
                                            </div>
                                            <div class="card-body">
                                                <select class="form-select" id="unidad-input" name="unidad">
                                                    <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($subcategoria->id_categ == 4): ?> 
                                                            <option value="<?php echo e($subcategoria->nombre_sub_categoria); ?>" <?php if($subcategoria->nombre_sub_categoria == $insumo->unidad): ?> selected <?php endif; ?>><?php echo e($subcategoria->nombre_sub_categoria); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="descripcion-input" class="form-label">Descripción</label>
                                            <textarea class="form-control" id="descripcion-input" name="descripcion" rows="3"><?php echo e($insumo->descripcion); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                        <!-- Otros campos del formulario -->
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    // Obtener el valor actual de la categoría seleccionada
    var categoriaSeleccionada = '<?php echo e($insumo->categ); ?>';

    // Filtrar las opciones de subcategoría basadas en la categoría seleccionada
    var subcategorias = <?php echo json_encode($subcategorias, 15, 512) ?>;
    var opcionesSubcategoria = subcategorias.filter(function(subcategoria) {
        return subcategoria.id_categ === categoriaSeleccionada;
    });

    // Actualizar las opciones del select de subcategoría con las opciones filtradas
    var selectSubcategoria = document.getElementById('choices-publish-status-input');
    selectSubcategoria.innerHTML = ''; // Limpiar las opciones actuales
    opcionesSubcategoria.forEach(function(subcategoria) {
        var option = document.createElement('option');
        option.value = subcategoria.id;
        option.text = subcategoria.nombre_sub_categoria;
        if (subcategoria.id === '<?php echo e($insumo->subcateg); ?>') {
            option.selected = true;
        }
        selectSubcategoria.appendChild(option);
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
<script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/insumos/edit.blade.php ENDPATH**/ ?>