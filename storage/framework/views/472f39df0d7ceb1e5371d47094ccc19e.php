
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.products'); ?>
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
            Insumos
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Insumos
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center gy-3">
                            <div class="col-sm">
                                <h5 class="card-title mb-0">INSUMOS</h5>
                            </div>
                            <div class="col-sm-auto">
                                <div class="d-flex gap-1 flex-wrap">
                                    
                                    <div id="searchContainer"></div>
                                    <a class="btn btn-warning" href="<?php echo e(route('insumos.create')); ?>" id="addproduct-btn"><i
                                        class="ri-add-line align-bottom me-1"></i>Agregar insumos</a>
                                    <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i> Import</button>
                                    <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>

                    <!-- end card header -->
                    <div class="card-body pt-0">
                        <div>
                            <div id="entriesContainer"></div>  
                            <div class="table-responsive">
                                <table class="table table-nowrap align-middle" id="orderTable">
                                    <thead class="text-muted table-light">
                                        <tr class="text-uppercase">
                                            <th scope="col" style="width: 25px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Producto</th>
                                            <th>Tags</th>
                                            <th>Color</th>
                                            <th>Unidad</th>
                                            <th>Fecha de Creación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insumo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                                    </div>
                                                </th>
                                                <td><?php echo e($insumo->id); ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?php echo e(asset('images/' . $insumo->img)); ?>" alt="<?php echo e($insumo->nombre); ?>" class="me-2" style="width: 50px; height: 50px;">
                                                        <div>
                                                            <p class="mb-0"><?php echo e($insumo->nombre); ?></p>
                                                            <small class="text-muted"><?php echo e($insumo->categoria->nombre_categoria); ?></small><br>
                                                            <small class="text-muted"><?php echo e($insumo->subcategoria->nombre_sub_categoria); ?></small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo e($insumo->tags); ?></td>
                                                <td><?php echo e($insumo->color); ?></td>
                                                <td><?php echo e($insumo->unidad); ?></td>
                                                <td><?php echo e($insumo->created_at); ?></td>
                                                <td>
                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                            <a href="<?php echo e(route('insumos.edit', $insumo->id)); ?>" class="text-primary d-inline-block">
                                                                <i class="ri-pencil-fill fs-16"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                            <form action="<?php echo e(route('insumos.destroy', $insumo->id)); ?>" method="POST" class="delete-form" onsubmit="return confirm('¿Está seguro de que desea eliminar este registro?');">
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
                            <div id="paginationContainer"></div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('build/js/app.js')); ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/insumos/index.blade.php ENDPATH**/ ?>