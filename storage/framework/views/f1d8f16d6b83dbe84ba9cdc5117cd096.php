
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
insumos
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>



<div class="row">
    <div class="col-lg-12">
        <div class="card" id="orderList">
            <div class="card-header border-0">
                <div class="row align-items-center gy-3">
                    <div class="col-sm">
                        <h5 class="card-title mb-0">INSUMOS</h5>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex gap-1 flex-wrap">
                            
                              <a class="btn btn-warning" href="<?php echo e(route('insumos.create')); ?>">Nuevo</a>
                            <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i> Import</button>
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
                    </div>
                </div>
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
                                    <th scope="col" style="width: 25px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    

                                    <th>ID</th>
                                    <th>Categoria</th>
                                    <th>Sub Categoria</th>
                                    <th>Nombre</th>
                                    <th>Color</th>
                                    <th>unidad</th>
                                    
                                    <th>Tipo Insumo</th>
                                    <th>Ancho Tela</th>
                                    <th>Acciones</th>




                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insumos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                            </div>
                                        </th>
                                    <td><?php echo e($insumos->id); ?></td>
                                    <td><?php echo e($insumos->id_categ); ?></td>
                                    <td><?php echo e($insumos->id_subcateg); ?></td>
                                    <td><?php echo e($insumos->nombre); ?></td>
                                    <td><?php echo e($insumos->color); ?></td>
                                    <td><?php echo e($insumos->unidad); ?></td>
                                    
                                    <td><?php echo e($insumos->t_insumo); ?></td>
                                    <td><?php echo e($insumos->ancho_tela); ?></td>
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


<!--ecommerce-customer init js -->
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-order.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Allbaute\Allbaute\resources\views/insumos/index.blade.php ENDPATH**/ ?>