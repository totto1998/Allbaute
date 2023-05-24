
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('translation.shopping-cart'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('li_1'); ?>
Ecommerce
<?php $__env->endSlot(); ?>
<?php $__env->slot('title'); ?>
Shopping Cart
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row mb-3">
    <div class="col-xl-8">
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end">
                <div class="search-box ms-2">
                    <input type="text" class="form-control" id="searchProductList" placeholder="Search Products...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
            <?php
            $total = 0;
            ?>
        
            <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $proveedor->getInsumos(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insumo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $insumo = App\Models\insumos::find($proveedor->t_insumo);
                        $precioConDescuento = $insumo->precio - ($insumo->precio * $insumo->descuento / 100);
                        $total += $precioConDescuento * $insumo->cantidad; // Aplica el descuento y multiplica por la cantidad de productos
                    ?>
                    <div class="card product">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-sm-auto">
                                    <div class="avatar-lg bg-light rounded p-1">
                                        <img src="<?php echo e(asset('images/' . $insumo->img)); ?>" alt="" class="img-fluid d-block">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <h5 class="fs-15 text-truncate"><a href="<?php echo e(URL::asset('/ecommerce-product-detail')); ?>" class="text-dark"><?php echo e($insumo->categ); ?></a></h5>
                                    <ul class="list-inline text-muted">
                                        <li class="list-inline-item"><span class="fw-medium"><?php echo e($insumo->subcateg); ?></span></li><br>
                                        <li class="list-inline-item">Color: <span class="fw-medium"><?php echo e($insumo->color); ?></span></li>
                                        <li class="list-inline-item">Size: <span class="fw-medium"><?php echo e($insumo->ancho); ?></span></li>
                                    </ul>
                
                                    <div class="input-step">
                                        <button type="button" class="minus">–</button>
                                        <input type="number" class="product-quantity" value="0" min="0" max="100">
                                        <button type="button" class="plus">+</button>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="text-lg-end">
                                        
                                        <div class="text-lg-end">
                                            <p class="text-muted mb-1">Item Price:</p>
                                            <h5 class="fs-15">$<span id="ticket_price" class="product-price"><?php echo e($precioConDescuento); ?></span></h5>
                                            <!-- Mostrar el precio original si es necesario -->
                                            <p class="text-muted mb-1">Original Price:</p>
                                            <h5 class="fs-15">$<span id="original_price"><?php echo e($insumo->precio); ?></span></h5>
                                        </div>                                        
                                    </div>
                                    <div class="text-lg-end">
                                        <p class="text-muted mb-1">Descuento:</p>
                                        <h5 class="fs-15"><span id="ticket_price" class="product-discount"><?php echo e($insumo->descuento); ?>%</span></h5>
                                    </div>     
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-footer">
                            <div class="row align-items-center gy-3">
                                <div class="col-sm">
                                    <div class="d-flex flex-wrap my-n1">
                                        <div>
                                            <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal">
                                                <i class="ri-delete-bin-fill text-muted align-bottom me-1"></i>
                                                Remove
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#" class="d-block text-body p-1 px-2">
                                                <i class="ri-star-fill text-muted align-bottom me-1"></i>
                                                Add Wishlist
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex align-items-center gap-2 text-muted">
                                        <div>Total :</div>
                                        <h5 class="fs-15 mb-0">$<span class="product-line-price"><?php echo e($total); ?></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card footer -->
                    </div>
                    <!-- end card -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
        </div>
        <br>
        


    </div>
    <!-- end col -->

    <div class="col-xl-4">
        <div class="sticky-side-div">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <h5 class="card-title mb-0">Orden de compra</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Sub Total :</td>
                                    <td class="text-end" id="cart-subtotal">$ 359.96</td>
                                </tr>
                                <tr>
                                    <td>Descuento <span class="text-muted"></span> : </td>
                                    <td class="text-end" id="cart-discount">- $ 53.99</td>
                                </tr>
                                <tr>
                                    <td>Iva 19%: </td>
                                    <td class="text-end" id="cart-tax">$ 44.99</td>
                                </tr>
                                <tr class="table-active">
                                    <th>Total (COP) :</th>
                                    <td class="text-end">
                                        <span class="fw-semibold" id="cart-total">
                                            $415.96
                                        </span>
                                       
                                    </td>
                                    
                                </tr>
                                
                            </tbody>
                            
                        </table>
                        
                    </div>
                    
                    <!-- end table-responsive -->
                </div>
                
            </div>
            <div class="text-end mb-4">
                                    <a href="<?php echo e(URL::asset('/apps-ecommerce-checkout')); ?>" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"></i> Registrar orden</a>
                                </div>
        </div>
        <!-- end stickey -->

    </div>
</div>
<!-- end row -->
<!-- removeItemModal -->
<div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Product ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="remove-product">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/js/pages/form-input-spin.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/ecommerce-cart.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/ordenCompra/create.blade.php ENDPATH**/ ?>