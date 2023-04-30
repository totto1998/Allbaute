<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.dashboards'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?> Tables <?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>LISTA DE INSUMOS <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-warning" href="<?php echo e(route('insumos.create')); ?>">Nuevo Registro</a>
            </div>
            <div class="card-body">
                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            
                            
                            <th>ID</th>
                            <th>Categoria</th>
                            <th>Sub Categoria</th>
                            <th>Nombre</th>
                            <th>Color</th>
                            <th>unidad</th>
                            <th>img</th>
                            <th>Tipo Insumo</th>
                            <th>Ancho Tela</th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insumos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($insumos->id); ?></td>
                            <td><?php echo e($insumos->id_categ); ?></td>
                            <td><?php echo e($insumos->id_subcateg); ?></td>
                            <td><?php echo e($insumos->nombre); ?></td>
                            <td><?php echo e($insumos->color); ?></td>
                            <td><?php echo e($insumos->unidad); ?></td>
                            <td><?php echo e($insumos->img); ?></td>
                            <td><?php echo e($insumos->t_insumo); ?></td>
                            <td><?php echo e($insumos->ancho_tela); ?></td>
                            <td>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        
                                        <li><a href="<?php echo e(route('insumos.edit', $insumos->id)); ?>" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li>
                                            <form action="<?php echo e(route('insumos.destroy', $insumos->id)); ?>" method="POST" class="delete-form">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="dropdown-item remove-item-btn"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\modern\resources\views/insumos/index.blade.php ENDPATH**/ ?>