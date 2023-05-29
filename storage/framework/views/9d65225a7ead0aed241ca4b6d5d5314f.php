

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.create-product'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('build/css/style.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
Ecommerce
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
Crear nueva parametrización
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<form action="<?php echo e(route('parametrizacion.store')); ?>" method="POST" enctype="multipart/form-data" id="createproduct-form" autocomplete="off" class="needs-validation">
    <?php echo csrf_field(); ?>
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentario</label>
<<<<<<< Updated upstream
                        <textarea required class="form-control" id="comentario" name="comentario" rows="5" oninput="bloquearComillas('comentario')"></textarea>
                        <p id="mensajeError_comentario" class="error"></p>
=======
                        <textarea required class="form-control" id="comentario" name="comentario" rows="5"></textarea>
>>>>>>> Stashed changes
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="parametro" class="form-label">Tipo de Parámetro</label>
                        <select class="form-select" id="parametro" name="parametro" required onchange="mostrarCampo()">
                            <option value="">Seleccionar tipo de parámetro</option>
                            <option value="1">Nuevo parámetro</option>
                            <option value="2">Nueva categoría</option>
                        </select>
                    </div>

                    <div id="campo_nombre" style="display:none;">
                        <label for="nombre_categoria" class="form-label">Nombre del parámetro</label>
<<<<<<< Updated upstream
                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" pattern="[a-zA-Z\s]+" oninput="bloquearComillas('nombre_categoria')">
=======
                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" pattern="[a-zA-Z\s]+" oninput="bloquearComillas('nombre_categoria')" disabled>
>>>>>>> Stashed changes
                        <p id="mensajeError_categoria" class="error"></p>
                    </div>

                    <div id="campo_nombre2" style="display:none;">
                        <label for="nombre_sub_categoria" class="form-label">Nombre de la subcategoría</label>
<<<<<<< Updated upstream
                        <input type="text" class="form-control" id="nombre_sub_categoria" name="nombre_sub_categoria" pattern="[a-zA-Z\s]+" oninput="bloquearComillas('nombre_sub_categoria')">
=======
                        <input type="text" class="form-control" id="nombre_sub_categoria" name="nombre_sub_categoria" pattern="[a-zA-Z\s]+" oninput="bloquearComillas('nombre_sub_categoria')" disabled>
>>>>>>> Stashed changes
                        <p id="mensajeError" class="error"></p>
                    </div>

                    <div id="campo_categoria" style="display:none;">
                        <label for="categoria" class="form-label">Categorías</label>
                        <select class="form-select" id="categoria" name="categoria" disabled>
                            <option value="">Seleccionar categoría</option>
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nombre_categoria); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div id="campo_estado" style="display:none;">
                        <label for="estado_categoria" class="form-label">Estado</label>
<<<<<<< Updated upstream
                        <select class="form-select" id="estado_Sub_categoria" name="estado_sub_categoria">
=======
                        <select class="form-select" id="estado_categoria" name="estado_categoria" disabled>
>>>>>>> Stashed changes
                            <option value="">Seleccionar estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>

                    <div id="campo_estado2" style="display:none;">
                        <label for="estado_categoria2" class="form-label">Tipo</label>
<<<<<<< Updated upstream
                        <select class="form-select" id="tipo" name="tipo">
                            <option value="">Seleccionar cambia esto</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
=======
                        <select class="form-select" id="estado_categoria" name="tipo" disabled>
                            <option value="">Seleccionar</option>
                            <option value="1">Insumo Ropa</option>
                            <option value="0">Caracteristicas o Funciones</option>
>>>>>>> Stashed changes
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="user-details">
            <div class="button">
<<<<<<< Updated upstream
                <input onclick="return validarCampos()" type="submit" name="submit" value="Enviar">
=======
                <input onclick="return validarCampoNombre()" type="submit" name="submit" value="Enviar">
>>>>>>> Stashed changes
            </div>
        </div>
    </div>
</form>

<script>
    function bloquearComillas(id) {
        var input = document.getElementById(id);
<<<<<<< Updated upstream
        input.value = input.value.replace(/['"]/g, '');
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
=======
        input.value = input.value.replace(/['="]/g, '');
    }

    function validarCampoNombre() {
        var texto = document.getElementById("nombre_categoria").value;
        var patron = /^[a-zA-Z\s]+$/;

        if (!patron.test(texto)) {
            document.getElementById("mensajeError_categoria").textContent = "El texto contiene caracteres no permitidos";
            return false;
>>>>>>> Stashed changes
        }

        var comentario = document.getElementById("comentario").value;

        if (comentario.includes("'") || comentario.includes('"')) {
            document.getElementById("mensajeError_comentario").textContent = "El comentario contiene comillas";
            return false;
        }

<<<<<<< Updated upstream
=======
        var tipoParametrizacion = document.getElementById("parametro").value;

        if (tipoParametrizacion === "2") {
            var nombreSubCategoria = document.getElementById("nombre_sub_categoria").value;
            var categoria = document.getElementById("categoria").value;
            var estadoCategoria = document.getElementById("estado_categoria").value;

            if (nombreSubCategoria.trim() === "" || categoria.trim() === "" || estadoCategoria.trim() === "") {
                document.getElementById("mensajeError").textContent = "Todos los campos de la categoría son requeridos";
                return false;
            }
        }

>>>>>>> Stashed changes
        return true;
    }

    function mostrarCampo() {
        var tipoParametrizacion = document.getElementById("parametro").value;
        var campoNombre = document.getElementById("campo_nombre");
        var campoNombre2 = document.getElementById("campo_nombre2");
        var campoCategoria = document.getElementById("campo_categoria");
        var campoEstado = document.getElementById("campo_estado");
        var campoEstado2 = document.getElementById("campo_estado2");

        if (tipoParametrizacion === "1") {
            campoNombre.style.display = "block";
            campoNombre2.style.display = "none";
            campoCategoria.style.display = "none";
            campoEstado.style.display = "none";
            campoEstado2.style.display = "block";
<<<<<<< Updated upstream
=======

            // Habilitar campos
            campoNombre.querySelector("input").removeAttribute("disabled");
            campoEstado2.querySelector("select").removeAttribute("disabled");
>>>>>>> Stashed changes
        } else if (tipoParametrizacion === "2") {
            campoNombre.style.display = "none";
            campoNombre2.style.display = "block";
            campoCategoria.style.display = "block";
            campoEstado.style.display = "block";
            campoEstado2.style.display = "none";
<<<<<<< Updated upstream
=======

            // Habilitar campos
            campoNombre2.querySelector("input").removeAttribute("disabled");
            campoCategoria.querySelector("select").removeAttribute("disabled");
            campoEstado.querySelector("select").removeAttribute("disabled");
>>>>>>> Stashed changes
        } else {
            campoNombre.style.display = "none";
            campoNombre2.style.display = "none";
            campoCategoria.style.display = "none";
            campoEstado.style.display = "none";
            campoEstado2.style.display = "none";
<<<<<<< Updated upstream
=======

            // Deshabilitar campos
            campoNombre.querySelector("input").setAttribute("disabled", true);
            campoNombre2.querySelector("input").setAttribute("disabled", true);
            campoCategoria.querySelector("select").setAttribute("disabled", true);
            campoEstado.querySelector("select").setAttribute("disabled", true);
            campoEstado2.querySelector("select").setAttribute("disabled", true);
>>>>>>> Stashed changes
        }
    }
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/parametrizacion/create.blade.php ENDPATH**/ ?>