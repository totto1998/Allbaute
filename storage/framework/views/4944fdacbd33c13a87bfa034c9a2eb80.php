
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.orders'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
    .custom-table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .custom-table-responsive .dataTables_wrapper .row:first-child {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }
    
    .custom-table-responsive .dataTables_wrapper .row:first-child .col-md-6:last-child {
        margin-left: auto;
        display: flex;
        align-items: center;
    }
    
    .custom-table-responsive .dataTables_wrapper .row:first-child .col-md-6:last-child .dataTables_filter {
        display: inline-block;
        margin-right: 10px;
    }
    
    #entriesContainer {
        display: inline-block;
        width: 100px; /* Ajusta el ancho según tus necesidades */
    }

    .form-select-smaller {
        font-size: 0.875rem;
        padding: 0.25rem 0.5rem;
        height: 2.25rem;
        width: 100%;
    }
    
</style>
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
                            <div id="searchContainer"></div>
                            <a class="btn btn-warning" href="<?php echo e(route('parametrizacion.create')); ?>">CREAR NUEVA PARAMETRIZACION</a>
                            <button type="button" class="btn btn-secondary">
                                <i class="ri-file-download-line align-bottom me-1"></i>
                                Exportar</button>
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div id="entriesContainer"></div> 
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle" id="orderTable">
                        <thead class="text-muted table-light">
                            <tr class="text-uppercase">
                                <th class="sort" data-sort="id">ID</th>
                                <th class="sort" data-sort="id_tipo">Categoria</th>
                                <th class="sort" data-sort="nombre">SubCategoria</th>
                                <th class="sort" data-sort="descripcion">Descripcion</th>
                                <th class="sort" data-sort="estado">Estado</th>
                                <th>Acciones</th>
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
                </div>
                    <div class="noresult" style="display: none">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                            <h5 class="mt-2">Sorry! No Result Found</h5>
                            <p class="text-muted">We've searched more than 150+ Orders We did not find any orders for your search.</p>
                        </div>
                    </div>
                    <div id="paginationContainer"></div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('#orderTable').DataTable({
            "paging": true,
            "searching": true,
            "info": false,
            "responsive": true,
            "language": {
                "search": "",
                "paginate": {
                    "previous": "<i class='ri-arrow-left-s-line'></i>",
                    "next": "<i class='ri-arrow-right-s-line'></i>"
                }
            },
            "initComplete": function() {
                var searchInput = $('#orderTable_filter').find('input');
                searchInput.removeClass('form-control-sm');
                searchInput.attr('placeholder', 'Buscar');
                searchInput.parent().addClass('custom-search');

                // Mover el campo de búsqueda a una posición estática
                searchInput.appendTo('#searchContainer');

                var entriesLabel = $('#orderTable_length').find('label');
                entriesLabel.addClass('form-label');
                entriesLabel.contents().filter(function() {
                    return this.nodeType === 3;
                }).remove();
                entriesLabel.prepend('Cantidad ');

                var entriesSelect = $('#orderTable_length').find('select');
                entriesSelect.addClass('form-select form-select-sm');

                // Mover el campo de cantidad a una posición estática
                entriesLabel.appendTo('#entriesContainer');
                entriesSelect.appendTo('#entriesContainer');

                // Reducir el tamaño del campo de cantidad
                entriesSelect.removeClass('form-select-sm');
                entriesSelect.addClass('form-select-smaller');

                var paginationContainer = $('#orderTable_paginate');
                paginationContainer.addClass('custom-pagination');

                // Mover el campo de paginación a una posición estática
                paginationContainer.appendTo('#paginationContainer');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/parametrizacion/index.blade.php ENDPATH**/ ?>