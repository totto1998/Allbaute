
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
                    <div class="table-responsive table-card mb-1">
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
                                    <th>Ciudad</th>
                                    <th>Nombre Contacto</th>
                                    <th>Tipo de Insumo</th>
                                    <th>Tags</th>
                                    <th>Acciones</th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
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
                                    <td><?php echo e($proveedor->ciudad); ?></td>
                                    <td><?php echo e($proveedor->nombre_contacto); ?></td>
                                    <td><?php echo e($proveedor->t_insumo); ?></td>
                                    <td><?php echo e($proveedor->tags); ?></td>
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
                                                <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteOrder">
                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                </a>
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

                <!-- Modal para agregar item -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Crear Proveedor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <div class="modal-body">
                                <form action="<?php echo e(route('proveedor.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>

                                    <div class="mb-3">
                                        <label for="razon_social" class="form-label">Razon Social</label>
                                        <input type="text" class="form-control" id="razon_social" name="razon_social" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nit" class="form-label">Nit</label>
                                        <input type="text" class="form-control" id="nit" name="nit" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="telefono_fijo" class="form-label">Telefono Fijo</label>
                                        <input type="text" class="form-control" id="telefono_fijo" name="telefono_fijo" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="celular" class="form-label">Celular</label>
                                        <input type="text" class="form-control" id="celular" name="celular" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="direccion" class="form-label">Direccion</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="Ciudad" class="form-label">Ciudad</label>
                                        <select class="form-control" data-trigger name="Ciudad" id="Ciudad" required />
                                        <option value="">Ciudad</option>
                                        <option value="Sincelejo">Sincelejo</option>
                                        <option value="Monteria">Monteria</option>
                                        <option value="Medellin">Medellin</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nombre_contacto" class="form-label">Nombre de Contacto</label>
                                        <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="t_insumos" class="form-label">Tipo de Insumo</label>
                                        <select class="form-select" id="t_insumo" name="t_insumo" required>
                                            <option value="">Seleccionar tipo de Insumo</option>
                                            <?php $__currentLoopData = $insumo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tipo->id); ?>"><?php echo e($tipo->nombre); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tags" class="form-label">Tags</label>
                                        <input type="text" class="form-control" id="tags" name="tags" required>
                                    </div>



                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>










                


                <!-- Modal -->
                <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body p-5 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                                </lord-icon>
                                <div class="mt-4 text-center">
                                    <h4>You are about to delete a order ?</h4>
                                    <p class="text-muted fs-15 mb-4">Deleting your order will remove
                                        all of
                                        your information from our database.</p>
                                    <div class="hstack gap-2 justify-content-center remove">
                                        <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
                                            Close</button>
                                        <button class="btn btn-danger" id="delete-record">Yes,
                                            Delete It</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal -->
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/list.js/list.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/list.pagination.js/list.pagination.min.js')); ?>"></script>

<!--ecommerce-customer init js -->
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-order.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Allbaute\Allbaute\resources\views/proveedor/index.blade.php ENDPATH**/ ?>