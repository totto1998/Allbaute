
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.create-product'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/dropzone.css">



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


<form action="<?php echo e(route('insumos.store')); ?>" method="POST" enctype="multipart/form-data" id="createproduct-form" autocomplete="off" class="needs-validation" novalidate>
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-lg-8">
            <!-- end card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Galeria de productos</h5>
                </div>
                <div class="card-body">
                    <div>
                        <h5 class="fs-14 mb-1">Agrega la imagen de un producto nuevo</h5>

                        <div class="dropzone">
                            <div class="fallback">
                                <input name="img" type="file" multiple="multiple">
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                </div>

                                <h5>Clik aqui para subir la imagen</h5>
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
                                            <button data-dz-remove class="btn btn-sm btn-danger">Borrar</button>
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
                            <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
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
                                        <input type="text" class="form-control" id="stocks-input" name="stock" placeholder="Stocks" required pattern="[A-Za-z\s]+">
                                        <div class="invalid-feedback">Ingrese cuantos productos estan en Stocks.</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-price-input">Precio</label>
                                        <div class="input-group has-validation mb-3">
                                            <span class="input-group-text" id="product-price-addon">$</span>
                                            <input type="text" class="form-control" id="product-price-input" placeholder="Enter price" name="precio" aria-label="Price" aria-describedby="product-price-addon" required pattern="[0-9]+">
                                            <div class="invalid-feedback">Ingrese el precio.</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="product-discount-input">Descuento</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="product-discount-addon">%</span>
                                            <input type="text" class="form-control" id="product-discount-input" name="descuento" placeholder="Descuento" aria-label="discount" aria-describedby="product-discount-addon" required pattern="[0-9]+">
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
                <div class="mb-2" style="margin-top: 10px;  margin-left: 20px; margin-right: 20px; margin-bottom: 20px;;">
                    <label for="choices-publish-status-input" class="form-label">Categoria de insumos</label>
                    <select class="form-select" id="choices-publish-status-input" data-choices data-choices-search-false>
                        <option value="">Selecciona una opción</option>
                        <?php $__currentLoopData = $paramcateg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($param->id_tipo == 1): ?>
                                <option value="<?php echo e($param->nombre); ?>"><?php echo e($param->nombre); ?></option>
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
                                    <option value="<?php echo e($param->nombre); ?>"><?php echo e($param->nombre); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                      </div>
                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Unidad de medida</label>
                              <select class="form-select" id="choices-publish-status-input" name="unidad" data-choices data-choices-search-false required>
                                <?php $__currentLoopData = $paramcateg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($param->id_tipo == 6): ?>
                                    <option value="<?php echo e($param->nombre); ?>"><?php echo e($param->nombre); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="ancho-input" class="form-label">Ancho de la tela</label>
                          <input type="text" id="ancho-input" class="form-control" required pattern="[A-Za-z]+" placeholder="Ingrese ancho de la tela" name="ancho">
                      </div>
                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Color</label>
                              <select class="form-select" id="choices-publish-status-input" name="color" data-choices data-choices-search-false required>
                                <?php $__currentLoopData = $paramcateg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($param->id_tipo == 5): ?>
                                    <option value="<?php echo e($param->nombre); ?>"><?php echo e($param->nombre); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Estado</label>
                              <select class="form-select" id="choices-publish-status-input" name="estado" data-choices data-choices-search-false required>
                                  <option value="1">Terminado</option>
                                  <option value="0">Emproduccion</option>
                          </select>
                      </div>
                  </div>
                  <div class="card">
                          <div class="card-header">
                              <h5 class="card-title mb-0">Tags de insumos</h5>
                          </div>
                          <div class="card-body">
                              <div class="hstack gap-3 align-items-start">
                                  <div class="flex-grow-1">
                                      <input class="form-control" data-choices data-choices-multiple-remove="true" name="tags" placeholder="Enter tags" type="text" value="" required pattern="[A-Za-z]+" />
                               </div>
                           </div>
                          </div>
                      </div>
              `;
                        } else if (selectedValue === 'Botón' || selectedValue === 'Cremalleras' ) {
                            // Agregar el código HTML al contenedor
                            cardBodyContainerEl.innerHTML = `
              <div class="card-body">

                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Tipo de Material</label>
                              <select class="form-select" id="choices-publish-status-input" name="subcateg" data-choices data-choices-search-false required>
                                <?php $__currentLoopData = $paramcateg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($param->id_tipo == 3): ?>
                                    <option value="<?php echo e($param->nombre); ?>"><?php echo e($param->nombre); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Unidad de medida</label>
                              <select class="form-select" id="choices-publish-status-input" name="unidad" data-choices data-choices-search-false required>
                                <?php $__currentLoopData = $paramcateg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($param->id_tipo == 6): ?>
                                    <option value="<?php echo e($param->nombre); ?>"><?php echo e($param->nombre); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <div class="mb-3">
                          <label for="ancho-input" class="form-label">Ancho del boton</label>
                          <input type="text" id="ancho-input" class="form-control" required pattern="[A-Za-z]+" placeholder="Ingrese ancho de la tela" name="ancho">
                      </div>
                      <div class="mb-2">
                          <label for="choices-publish-status-input" class="form-label">Color</label>
                              <select class="form-select" id="choices-publish-status-input" name="color" data-choices data-choices-search-false required>
                                <?php $__currentLoopData = $paramcateg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($param->id_tipo == 5): ?>
                                    <option value="<?php echo e($param->nombre); ?>"><?php echo e($param->nombre); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                      <div class="mb-2">
                        <label for="choices-publish-status-input" class="form-label">Estado</label>
                            <select class="form-select" id="choices-publish-status-input" name="estado" data-choices data-choices-search-false required>
                                <option value="1">Terminado</option>
                                <option value="0">Emproduccion</option>
                        </select>
                      </div>
                  </div>


                  <div class="card">
                          <div class="card-header">
                              <h5 class="card-title mb-0">Tags de insumos</h5>
                          </div>
                          <div class="card-body">
                              <div class="hstack gap-3 align-items-start">
                                  <div class="flex-grow-1">
                                      <input class="form-control" data-choices data-choices-multiple-remove="true" name="tags" placeholder="Enter tags" type="text" value="" required pattern="[A-Za-z]+" />
                               </div>
                           </div>
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
        </div>
        <div class="content">
            <div class="user-details">
                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</form>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/dropzone.js"></script>

<script>
    $(document).ready(function () {
        // Inicializar Dropzone
        Dropzone.autoDiscover = false;
        var maxFilesize = 2; // Tamaño máximo del archivo en MB
        var myDropzone = new Dropzone('.dropzone', {
            paramName: 'img', // Nombre del parámetro que enviará el archivo
            maxFiles: 1, // Número máximo de archivos permitidos
            maxFilesize: maxFilesize, // Tamaño máximo del archivo en MB
            acceptedFiles: 'image/*', // Tipos de archivo aceptados (en este caso, solo imágenes)
            dictDefaultMessage: 'Haz clic aquí para subir la imagen', // Mensaje predeterminado
            dictFileTooBig: 'El archivo es demasiado grande. Tamaño máximo permitido: ' + maxFilesize + 'MB.', // Mensaje de error para archivos demasiado grandes
            dictInvalidFileType: 'No se permite este tipo de archivo. Solo se admiten imágenes.', // Mensaje de error para tipos de archivo no permitidos
            addRemoveLinks: true, // Mostrar enlaces para eliminar archivos cargados

            // Otras opciones y eventos de Dropzone según sea necesario
        });
    });
</script>


<script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/insumos/create.blade.php ENDPATH**/ ?>