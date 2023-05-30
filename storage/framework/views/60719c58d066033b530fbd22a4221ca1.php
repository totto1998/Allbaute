
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.edit-product'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
<link rel="stylesheet" href="<?php echo e(URL::asset('build/css/styledrop.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('build/css/style.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
Insumos
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
Editar insumo
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <form action="<?php echo e(route('insumos.update', $insumo->id)); ?>" method="POST" enctype="multipart/form-data" id="editproduct-form" autocomplete="off" class="needs-validation">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="card">
                    <div class="card-body">
                        
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <label for="img" class="form-label">Imagen</label>
                                </div>
                                <div class="card-body">
                                    <?php if($insumo->img): ?>
                                        <img src="<?php echo e(asset('storage/images/'.$insumo->img)); ?>" alt="Imagen actual" width="150">
                                    <?php endif; ?>
                                    <input type="file" class="form-control" id="img" name="img">
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
                                        <label for="choices-publish-status-input" class="form-label">Categoria de insumos</label>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="choices-publish-status-input" name="categ" data-choices data-choices-search-false>
                                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($categoria->tipo === 1): ?>
                                                    <option value="<?php echo e($categoria->id); ?>" <?php echo e($categoriaSeleccionada == $categoria->id ? 'selected' : ''); ?>><?php echo e($categoria->nombre_categoria); ?></option>
                                                <?php endif; ?>
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
                                        <label for="subcategoria-input" class="form-label">Subcategoría</label>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="subcategoria-input" name="subcateg" data-choices data-choices-search-false required>
                                            <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($subcategoria->categoria->id === $insumo->categ): ?>
                                                    <option value="<?php echo e($subcategoria->id); ?>" <?php echo e($insumo->subcategoria_id == $subcategoria->id ? 'selected' : ''); ?>><?php echo e($subcategoria->nombre_sub_categoria); ?></option>
                                                <?php endif; ?>
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
                                                    <option value="<?php echo e($subcategoria->nombre_sub_categoria); ?>" <?php echo e($insumo->color == $subcategoria->nombre_sub_categoria ? 'selected' : ''); ?>><?php echo e($subcategoria->nombre_sub_categoria); ?></option>
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
                                                    <option value="<?php echo e($subcategoria->nombre_sub_categoria); ?>" <?php echo e($insumo->unidad == $subcategoria->nombre_sub_categoria ? 'selected' : ''); ?>><?php echo e($subcategoria->nombre_sub_categoria); ?></option>
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
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<script>
    // Obtener el elemento del select de categoría
    var selectCategoria = document.getElementById('choices-publish-status-input');

    // Obtener el elemento del select de subcategoría
    var selectSubcategoria = document.getElementById('subcategoria-input');

    // Obtener la subcategoría seleccionada actualmente
    var subcategoriaSeleccionada = <?php echo json_encode($insumo->subcategoria_id); ?>;

    // Manejar el evento de cambio en el select de categoría
    selectCategoria.addEventListener('change', function() {
        var categoriaSeleccionada = selectCategoria.value;

        // Limpiar las opciones anteriores del select de subcategoría
        selectSubcategoria.innerHTML = '';

        // Filtrar y agregar las opciones de subcategoría correspondientes
        <?php $__currentLoopData = $subcategorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            if('<?php echo e($subcategoria->categoria->id); ?>' === categoriaSeleccionada) {
                var option = document.createElement('option');
                option.value = '<?php echo e($subcategoria->id); ?>';
                option.textContent = '<?php echo e($subcategoria->nombre_sub_categoria); ?>';
                if('<?php echo e($subcategoria->id); ?>' === subcategoriaSeleccionada) {
                    option.selected = true;
                }
                selectSubcategoria.appendChild(option);
            }
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/insumos/edit.blade.php ENDPATH**/ ?>