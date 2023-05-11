
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
                            
                            <input type="text" id="searchInput" placeholder="Buscar...">

                            <a class="btn btn-warning" href="<?php echo e(route('parametrizacion.create')); ?>">Nuevo</a>
                            <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i>Exportar</button>
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <br>
    </br>
            <div class="card-body pt-0">
                <div>
                    <div class="table-responsive table-card mb-1">
                        <table class="table table-nowrap align-middle" id="orderTable">
                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    
                                    <th class="sort" data-sort="id">ID</th>
                                    <th class="sort" data-sort="id_tipo">Tipo</th>
                                    <th class="sort" data-sort="nombre">Nombre</th>
                                    <th class="sort" data-sort="descripcion">Descripcion</th>
                                    <th class="sort" data-sort="estado">Estado</th>
                                    <th >Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    
                                    <td><?php echo e($param->id); ?></td>
                                    <td><?php echo e($param->tipoParametrizacion->nombre ?? ''); ?></td>
                                    <td><?php echo e($param->nombre); ?></td>
                                    <td><?php echo e($param->descripcion); ?></td>
                                    <td>
                                        <?php if($param->estado == 1): ?>
                                            <span class="badge badge-soft-success">Activo</span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-danger">Inactivo</span>
                                        <?php endif; ?>
                                    </td>


                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                <a href="<?php echo e(URL::asset('/apps-ecommerce-order-details')); ?>" class="text-primary d-inline-block">
                                                    <i class="ri-eye-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="#editModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
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
                            <?php echo e($data->links()); ?>

                        </div>
                    </div>


                </div>







                <!-- Modal para agregar parametrizacion -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Agregar Parámetro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('parametrizacion.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="tipo_parametrizacion" class="form-label">Tipo de Parámetro</label>
                                        <select class="form-select" id="tipo_parametrizacion" name="tipo_parametrizacion" required>
                                            <option value="">Seleccionar tipo de parámetro</option>
                                            <?php $__currentLoopData = $tipo_parametrizacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tipo->id); ?>"><?php echo e($tipo->nombre); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" maxlength="10" minlength="4" pattern="[a-zA-Z]+" class="form-control" id="nombre" name="nombre" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea class="form-control" maxlength="30" minlength="4" pattern="[a-zA-Z]+" id="descripcion" name="descripcion" rows="3" cols="10"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="estado">Estado</label>
                                        <select class="form-select" id="estado" name="estado" required>
                                            <option value="">Seleccionar estado</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Edición -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Editar Parámetro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="<?php echo e(route('parametrizacion.update',$param->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <div class="form-group">
                                        <label for="tipoParametrizacion">Tipo:</label>
                                        <select class="form-control" name="tipoParametrizacion" id="tipoParametrizacion">
                                            <option value="">Seleccione una opción</option>
                                            <?php $__currentLoopData = $tipo_parametrizacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tipo->id); ?>" <?php echo e($param->tipoParametrizacion->id == $tipo->id ? 'selected' : ''); ?>><?php echo e($tipo->nombre); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($param->nombre); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción:</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion"><?php echo e($param->descripcion); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado:</label>
                                        <select class="form-control" name="estado" id="estado">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1" <?php echo e($param->estado == 'Activo' ? 'selected' : ''); ?>>Activo</option>
                                            <option value="0" <?php echo e($param->estado == 'Inactivo' ? 'selected' : ''); ?>>Inactivo</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>
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