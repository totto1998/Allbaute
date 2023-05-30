<!DOCTYPE html>
<html>
<head>
    <title>Crear insumos</title>
</head>
<body>


<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.create-product'); ?>
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
Crear insumos
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <form action="<?php echo e(route('insumos.store')); ?>" method="POST" enctype="multipart/form-data" id="createproduct-form" autocomplete="off" class="needs-validation" onsubmit="return validarCampos();">
                <?php echo csrf_field(); ?>

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
                                        <input type="text" class="form-control" id="imagen" name="nombre" required oninput="bloquearComillas('imagen');">
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
                                            <option value="">Selecciona una opción</option>
                                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($categoria->tipo === 1): ?>
                                                    <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nombre_categoria); ?></option>
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
                                        <label for="subcategoria-input" class="form-label">Subcategoria</label>
                                    </div>
                                    <div class="card-body">
                                        <select class="form-select" id="subcategoria-input" name="subcateg" data-choices data-choices-search-false required>
                                            <option value="">Selecciona una opción</option>
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
                                        <input type="text" class="form-control" id="tags-input" name="tags">
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
                                                    <option value="<?php echo e($subcategoria->nombre_sub_categoria); ?>"><?php echo e($subcategoria->nombre_sub_categoria); ?></option>
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
                                                    <option value="<?php echo e($subcategoria->nombre_sub_categoria); ?>"><?php echo e($subcategoria->nombre_sub_categoria); ?></option>
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
                                    <textarea class="form-control" id="descripcion-input" name="descripcion" rows="3" oninput="bloquearComillas('descripcion-input');"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Registrar producto</button>
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
    function bloquearComillas(id) {
        var input = document.getElementById(id);
        input.value = input.value.replace(/['="]/g, '');
    }

    function validarCampos() {
        var tipoParametrizacion = document.getElementById("parametro").value;
        if (tipoParametrizacion === "1") {
            var texto = document.getElementById("nombre_categoria").value;
            var patron = /^[a-zA-Z\s]+$/;
            if (!patron.test(texto)) {
                document.getElementById("mensajeError_categoria").textContent = "El texto contiene caracteres no permitidos";
                return false;
            }
        } else if (tipoParametrizacion === "2") {
            var subCategoria = document.getElementById("nombre_sub_categoria").value;
            if (subCategoria.trim() === "") {
                document.getElementById("mensajeError").textContent = "Debe ingresar un nombre de subcategoría";
                return false;
            }
        }
        var comentario = document.getElementById("comentario").value;
        if (comentario.includes("'") || comentario.includes('"')) {
            document.getElementById("mensajeError_comentario").textContent = "El comentario contiene comillas";
            return false;
        }
        return true;
    }
</script>
<?php $__env->stopSection(); ?>

</body>
</html>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Allbaute\Allbaute\resources\views/insumos/create.blade.php ENDPATH**/ ?>