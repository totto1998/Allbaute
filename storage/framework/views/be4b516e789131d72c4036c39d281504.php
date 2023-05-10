
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
            Crear nueva parametrizacion
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <label>Product Description</label>

                                <div id="ckeditor-classic">
                                    <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
                                    <ul>
                                        <li>Full Sleeve</li>
                                        <li>Cotton</li>
                                        <li>All Sizes available</li>
                                        <li>4 Different Color</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end mb-3">
                        <button type="submit" class="btn btn-success w-sm">Submit</button>
                    </div>
            </div>
            <!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Tipo de parametrizacion</label>

                            <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                                <option value="Published" selected>Categoria</option>
                                <option value="Scheduled">Subcategoria</option>
                                <option value="Draft">Color</option>
                                <option value="Published" selected>Forma de pago</option>
                                <option value="Published" selected>unidades de medida</option>
                            </select>
                        </div>

                        <div>
                            <label for="choices-publish-visibility-input" class="form-label">Estado</label>
                            <select class="form-select" id="choices-publish-visibility-input" data-choices data-choices-search-false>
                                <option value="Public" selected>Activo</option>
                                <option value="Hidden">Inactivo </option>
                            </select>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Nombre del parametro</h5>
                    </div>
                    <!-- end card body -->
                    <div class="card-body">
                        <div>
                            <label for="datepicker-publish-input" class="form-label">Nombre</label>
                            <input type="text" id="datepicker-publish-input" class="form-control"
                                placeholder="Enter publish date" data-provider="flatpickr" data-date-format="d.m.y"
                                data-enable-time>
                        </div>
                    </div>
                </div>
                <!-- end card -->
             </div>
        </div>
        <!-- end row -->
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Allbaute\Allbaute\resources\views/parametrizacion/create.blade.php ENDPATH**/ ?>