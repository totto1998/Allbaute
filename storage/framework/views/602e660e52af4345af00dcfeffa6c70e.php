
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
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
Ecommerce
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
Provedor
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>




<div class="row">
    <div class="col-lg-12">
        <div class="card" id="orderList">
            <div class="card-header border-0">
                <div class="row align-items-center gy-3">
                    <div class="col-sm">
                        <h5 class="card-title mb-0">PROVEEDORES</h5>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex gap-1 flex-wrap">
                            
                            <a class="btn btn-warning" href="<?php echo e(route('proveedor.create')); ?>">Nuevo</a>
                            <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i> Import</button>
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card-body pt-0">
                <div>
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
                                    <th>Razon Social</th>
                                    <th>Nit</th>
                                    <th>Telefono Fijo</th>
                                    <th>Celular</th>
                                    <th>Direccion</th>
                                    <th>Ubicacion</th>
                                    <th>Nombre Contacto</th>
                                    <th>Tags</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                            </div>
                                        </th>
                                    <td><?php echo e($proveedor->id); ?></td>
                                    <td><?php echo e($proveedor->razon_social); ?></td>
                                    <td><?php echo e($proveedor->nit); ?></td>
                                    <td><?php echo e($proveedor->telefono_fijo); ?></td>
                                    <td><?php echo e($proveedor->celular); ?></td>
                                    <td><?php echo e($proveedor->direccion); ?></td>
                                    <td>
                                        <small><?php echo e($proveedor->region); ?></small>,
                                        <small><?php echo e($proveedor->departamento); ?></small>,
                                        <small><?php echo e($proveedor->municipio); ?></small>
                                    </td>
                                    <td><?php echo e($proveedor->nombre_contacto); ?></td>
                                    <td><?php echo e($proveedor->tags); ?></td>
                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="<?php echo e(route('proveedor.edit', $proveedor->id)); ?>" class="text-primary d-inline-block">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                            <form action="<?php echo e(route('proveedor.destroy', $proveedor->id)); ?>" method="POST" class="delete-form" onsubmit="return confirm('¿Está seguro de que desea eliminar este proveedor?');">
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
                    searchInput.parent().insertAfter($('#orderTable_length'));
                    
                    var entriesLabel = $('#orderTable_length').find('label');
                    entriesLabel.addClass('form-label');
                    entriesLabel.contents().filter(function() {
                        return this.nodeType === 3;
                    }).remove();
                    entriesLabel.prepend('Cantidad ');
                    
                    var entriesSelect = $('#orderTable_length').find('select');
                    entriesSelect.addClass('form-select form-select-sm');
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/proveedor/index.blade.php ENDPATH**/ ?>