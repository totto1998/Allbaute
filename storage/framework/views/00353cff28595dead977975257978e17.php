<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.dashboards'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Tables <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>Crear Insumos <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>



<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-2">
                            <h5 class="text-primary"></h5>
                            <p class="text-muted">INSUMOS</p>
                        </div>
                        <div class="p-2 mt-4">
                            <form method="POST" action="<?php echo e(route('insumos.store')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label for="name">Categoria:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="id_categ">
                                        <option selected></option>
                                        <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($insum->id_categ); ?>"><?php echo e($insum->id_categ); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Sub Categoria:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="id_subcateg">
                                        <option selected></option>
                                        <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($insum->id_subcateg); ?>"><?php echo e($insum->id_subcateg); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="nombre">
                                        <option selected></option>
                                        <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($insum->nombre); ?>"><?php echo e($insum->nombre); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Color:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="color">
                                        <option selected></option>
                                        <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($insum->color); ?>"><?php echo e($insum->color); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Unidad:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="unidad">
                                        <option selected></option>
                                        <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($insum->unidad); ?>"><?php echo e($insum->unidad); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tipo de Insumo:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="t_insumo">
                                        <option selected></option>
                                        <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($insum->t_insumo); ?>"><?php echo e($insum->t_insumo); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Ancho de la tela:</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['ancho_tela'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="ancho_tela" value="<?php echo e(old('ancho_tela')); ?>" required>
                                    <?php $__errorArgs = ['ancho_tela'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <br/>
                                </div>
                                <div class="form-group">
                                    <label for="avatar">Imagen:</label>
                                    <input type="file" class="form-control-file <?php $__errorArgs = ['img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="img" accept="image/*">
                                    <?php $__errorArgs = ['img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                  </div>
                                

                                
                                <br/>



                              
                                <button type="submit" class="btn btn-primary">Crear Insumos</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\modern\resources\views/insumos/crear.blade.php ENDPATH**/ ?>