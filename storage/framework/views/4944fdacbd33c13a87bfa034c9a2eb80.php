
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.orders'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
Ecommerce
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
parametrizacion
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="orderList">
            <div class="card-header border-0">
                <div class="row align-items-center gy-3">
                    <div class="col-sm">
                        <h5 class="card-title mb-0">PARAMETRIZACION</h5>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex gap-1 flex-wrap">
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchInput" placeholder="Buscar insumo...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>

                            <a class="btn btn-warning" href="<?php echo e(route('parametrizacion.create')); ?>">CREAR NUEVA PARAMETRIZACION</a>
                            <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i>Exportar</button>
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
    </br>
            <div class="card-body pt-0">
                <div>
                    <div class="table-responsive table-card mb-1">
                        <table class="table table-nowrap align-middle" id="orderTable">
                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    
                                    <th class="sort" data-sort="id">ID</th>
                                    <th class="sort" data-sort="id_tipo">Categoria</th>
                                    <th class="sort" data-sort="nombre">SubCategoria</th>
                                    <th class="sort" data-sort="descripcion">Descripcion</th>
                                    <th class="sort" data-sort="estado">Estado</th>
                                    <th >Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                                <?php $__currentLoopData = $subcategoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    
                                    <td><?php echo e($param->id); ?></td>
                                    <td><?php echo e($param->categoria->nombre_categoria ?? ''); ?></td>
                                    <td><?php echo e($param->nombre_sub_categoria); ?></td>
                                    <td><?php echo e($param->comentario); ?></td>
                                    <td>
                                        <?php if($param->estado_sub_categoria == 1): ?>
                                            <span class="badge badge-soft-success">Activo</span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-danger">Inactivo</span>
                                        <?php endif; ?>
                                    </td>


                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            
                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="<?php echo e(route('parametrizacion.edit', $param->id)); ?>" class="text-primary d-inline-block">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                
                                                <form action="<?php echo e(route('parametrizacion.destroy', $param->id)); ?>" method="POST" class="delete-form" onsubmit="return confirm('¿Está seguro de que desea eliminar este registro?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="dropdown-item remove-item-btn"><i class="ri-delete-bin-5-fill fs-16"></i></button>
                                                </form>
                                                

                                            </li>

                                        </ul>
                                    </td>
                                </tr> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>



    
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted">We've searched more than 150+ Orders We did
                                    not find any
                                    orders for you search.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="pagination justify-content-end">
                            <?php echo e($subcategoria->links()); ?>

                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(){
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#orderTable tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

    
<script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>


<!--ecommerce-customer init js -->
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-order.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/scripts.js')); ?>"></script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/parametrizacion/index.blade.php ENDPATH**/ ?>