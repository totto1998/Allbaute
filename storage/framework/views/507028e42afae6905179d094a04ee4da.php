
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
            Crear nuevo insumo
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-lg-8">
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Galeria de productos</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="fs-14 mb-1">Imagen del producto</h5>
                                <p class="text-muted">Selecciona la imagen del producto</p>
                                <div class="text-center">
                                    <div class="position-relative d-inline-block">
                                        <div class="position-absolute top-100 start-100 translate-middle">
                                            <label for="product-image-input" class="mb-0"  data-bs-toggle="tooltip" data-bs-placement="right" title="Seleccione la imagen">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                        <i class="ri-image-fill"></i>
                                                    </div>
                                                </div>
                                            </label>
                                            <input class="form-control d-none" value="" id="product-image-input" type="file"
                                                accept="image/png, image/gif, image/jpeg">
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light rounded">
                                                <img src="" id="product-img" class="avatar-md h-auto" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h5 class="fs-14 mb-1">Subir nueva imagen a la galeria</h5>

                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        </div>

                                        <h5>Clik aqui para subir la imagen.</h5>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                    <li class="mt-2" id="dropzone-preview-list">
                                        <!-- This is used as the file preview template -->
                                        <div class="border rounded">
                                            <div class="d-flex p-2">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm bg-light rounded">
                                                        <img data-dz-thumbnail class="img-fluid rounded d-block" src="#" alt="Product-Image" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="pt-1">
                                                        <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                        <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-3">
                                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- end dropzon-preview -->
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info"
                                        role="tab">
                                        Informacion general
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                    
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="stocks-input">Stocks</label>
                                                <input type="text" class="form-control" id="stocks-input" placeholder="Stocks" required>
                                                <div class="invalid-feedback">Ingrese la cantidad disponible del insumo.</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-price-input">Precio</label>
                                                <div class="input-group has-validation mb-3">
                                                    <span class="input-group-text" id="product-price-addon">$</span>
                                                    <input type="number" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required>
                                                    <div class="invalid-feedback">Ingrese el precio del insumo.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

            </div>
            <!-- end col -->

            
            <div class="col-lg-4 position-relative mb-4">
    <div class="card">
        <div class="mb-3">
            <label for="choices-publish-status-input" class="form-label">Tipo de insumo</label>
            <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                <option value="">Selecciona una opción</option>
                <option value="Lino">Lino</option>
                <option value="Algodon">Algodon</option>
                <option value="boton">boton</option>
                <option value="cremallera">cremallera</option>
                <option value="unidades de medida">unidades de medida</option>
            </select>
        </div>

        <div id="card-body-container"></div>

        <script>
            const selectEl = document.getElementById('choices-publish-status-input');
            const cardBodyContainerEl = document.getElementById('card-body-container');

            selectEl.addEventListener('change', (event) => {
                const selectedValue = event.target.value;

                if (selectedValue === 'Lino' || selectedValue === 'Algodon') {
                    // Agregar el código HTML al contenedor
                    cardBodyContainerEl.innerHTML = `
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="unidad-input" class="form-label">Unidad de medida</label>
                                <input type="text" id="unidad-input" class="form-control" placeholder="Ingrese unidad de medida">
                            </div>
                            <div class="mb-3">
                                <label for="ancho-input" class="form-label">Ancho de la tela</label>
                                <input type="text" id="ancho-input" class="form-control" placeholder="Ingrese ancho de la tela">
                            </div>
                            <div class="mb-3">
                                <label for="color-input" class="form-label">Color</label>
                                <input type="text" id="color-input" class="form-control" placeholder="Ingrese color">
                            </div>
                        </div>
                    `;
                } else if (selectedValue === 'boton' || selectedValue === 'cremallera') {
                    // Agregar el código HTML al contenedor
                 cardBodyContainerEl.innerHTML = `
                            <div class="mb-3">
                        <label for="choices-publish-status-input" class="form-label">Tipo de material</label>
                     <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                            <option value="">Selecciona una opción</option>
                            <option value="Lino">Metalica</option>
                            <option value="Plastica">Plastico</option>
                        </select>
                    </div>
                    <div class="card-body">
                            <div class="mb-3">
                                <label for="color-input" class="form-label">Color</label>
                                <input type="text" id="color-input" class="form-control" placeholder="Ingrese color">
                            </div>
                        </div>
                    `;
                } else {
                    // Limpiar el contenido del contenedor si no se selecciona una opción correspondiente
                    cardBodyContainerEl.innerHTML = '';
                }
            });
        </script>
    </div>
    <div class="text-end mb-3">
        <button type="submit" class="btn btn-success w-sm">Submit</button>
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