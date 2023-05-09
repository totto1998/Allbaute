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
                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addModal"><i class="ri-add-line align-bottom me-1"></i>Crear Parametrizacion</button>
                            <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i> Import</button>
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border border-dashed border-end-0 border-start-0">
                <form>
                    <div class="row g-3">
                        <div class="col-xxl-5 col-sm-6">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Search for order ID, customer, order status or something...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-6">
                            <div>
                                <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" id="demo-datepicker" placeholder="Select date">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-4">
                            <div>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
                                    <option value="">Status</option>
                                    <option value="all" selected>All</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Inprogress">Inprogress</option>
                                    <option value="Cancelled">Cancelled</option>
                                    <option value="Pickups">Pickups</option>
                                    <option value="Returns">Returns</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-2 col-sm-4">
                            <div>
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idPayment">
                                    <option value="">Select Payment</option>
                                    <option value="all" selected>All</option>
                                    <option value="Mastercard">Mastercard</option>
                                    <option value="Paypal">Paypal</option>
                                    <option value="Visa">Visa</option>
                                    <option value="COD">COD</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-1 col-sm-4">
                            <div>
                                <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                    Filters
                                </button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
            <div class="card-body pt-0">
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1" role="tab" aria-selected="true">
                                <i class="ri-store-2-fill me-1 align-bottom"></i> All Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered" href="#delivered" role="tab" aria-selected="false">
                                <i class="ri-checkbox-circle-line me-1 align-bottom"></i> Delivered
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Pickups" data-bs-toggle="tab" id="Pickups" href="#pickups" role="tab" aria-selected="false">
                                <i class="ri-truck-line me-1 align-bottom"></i> Pickups <span class="badge bg-danger align-middle ms-1">2</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Returns" data-bs-toggle="tab" id="Returns" href="#returns" role="tab" aria-selected="false">
                                <i class="ri-arrow-left-right-fill me-1 align-bottom"></i> Returns
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 Cancelled" data-bs-toggle="tab" id="Cancelled" href="#cancelled" role="tab" aria-selected="false">
                                <i class="ri-close-circle-line me-1 align-bottom"></i> Cancelled
                            </a>
                        </li>
                    </ul>

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
                                                <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteOrder" data-id="<?php echo e($param->id); ?>">
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

                    


                      <!-- Modal ELIMINAR -->
                    <div class="modal fade" id="deleteOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>


                              <form id="formDelete" action="<?php echo e(route('parametrizacion.destroy',1)); ?>" data-action="<?php echo e(route('parametrizacion.destroy',1)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>

                                <button type="submit" class="btn btn-primary">ELIMINAR</button>


                              </form>
                              


                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal ELIMINAR -->



                </div>


                
                



                <!-- Modal para agregar item -->
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
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
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




                
                



                
                  
                  





                <!-- Modal para editar item -->




                








                <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                            </div>
                            <form class="tablelist-form" autocomplete="off">
                                <div class="modal-body">
                                    <input type="hidden" id="id-field" />

                                    <div class="mb-3" id="modal-id">
                                        <label for="orderId" class="form-label">ID</label>
                                        <input type="text" id="orderId" class="form-control" placeholder="ID" readonly />
                                    </div>

                                    <div class="mb-3">
                                        <label for="customername-field" class="form-label">Customer Name</label>
                                        <input type="text" id="customername-field" class="form-control" placeholder="Enter name" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="productname-field" class="form-label">Product</label>
                                        <select class="form-control" data-trigger name="productname-field" id="productname-field" required />
                                        <option value="">Product</option>
                                        <option value="Puma Tshirt">Puma Tshirt</option>
                                        <option value="Adidas Sneakers">Adidas Sneakers</option>
                                        <option value="350 ml Glass Grocery Container">350 ml Glass Grocery Container</option>
                                        <option value="American egale outfitters Shirt">American egale outfitters Shirt</option>
                                        <option value="Galaxy Watch4">Galaxy Watch4</option>
                                        <option value="Apple iPhone 12">Apple iPhone 12</option>
                                        <option value="Funky Prints T-shirt">Funky Prints T-shirt</option>
                                        <option value="USB Flash Drive Personalized with 3D Print">USB Flash Drive Personalized with 3D Print</option>
                                        <option value="Oxford Button-Down Shirt">Oxford Button-Down Shirt</option>
                                        <option value="Classic Short Sleeve Shirt">Classic Short Sleeve Shirt</option>
                                        <option value="Half Sleeve T-Shirts (Blue)">Half Sleeve T-Shirts (Blue)</option>
                                        <option value="Noise Evolve Smartwatch">Noise Evolve Smartwatch</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="date-field" class="form-label">Order Date</label>
                                        <input type="date" id="date-field" class="form-control" data-provider="flatpickr" required data-date-format="d M, Y" data-enable-time required placeholder="Select date" />
                                    </div>

                                    <div class="row gy-4 mb-3">
                                        <div class="col-md-6">
                                            <div>
                                                <label for="amount-field" class="form-label">Amount</label>
                                                <input type="text" id="amount-field" class="form-control" placeholder="Total amount" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <label for="payment-field" class="form-label">Payment Method</label>
                                                <select class="form-control" data-trigger name="payment-method" required id="payment-field">
                                                    <option value="">Payment Method</option>
                                                    <option value="Mastercard">Mastercard</option>
                                                    <option value="Visa">Visa</option>
                                                    <option value="COD">COD</option>
                                                    <option value="Paypal">Paypal</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="delivered-status" class="form-label">Delivery Status</label>
                                        <select class="form-control" data-trigger name="delivered-status" required id="delivered-status">
                                            <option value="">Delivery Status</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Inprogress">Inprogress</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Pickups">Pickups</option>
                                            <option value="Delivered">Delivered</option>
                                            <option value="Returns">Returns</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="add-btn">Add Order</button>
                                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                    </div>
                                </div>
                            </form>
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



<!--ecommerce-customer init js -->

<script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/scripts.js')); ?>"></script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Allbaute-main\resources\views/parametrizacion/index.blade.php ENDPATH**/ ?>