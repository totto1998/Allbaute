
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.products'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/nouislider/nouislider.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/gridjs/theme/mermaid.min.css')); ?>">

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
                        <div class="row g-4">
                            <div class="col-sm-auto"><div>

                                    <a  class="btn btn-warning" href="<?php echo e(route('insumos.create')); ?>" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i>Agregar insumos</a>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchInput" placeholder="Buscar insumo...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    <!-- end card header -->
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
                                        <th>Producto</th>
                                        <th>Tags</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Descuento</th>
                                        <th>Color</th>
                                        <th>Unidad</th>
                                        <th>Ancho</th>
                                        <th>Material</th>
                                        <th>Estado</th>
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
                                                <small class="text-muted"><?php echo e($insumo->categ); ?></small>
                                              </div>
                                            </div>
                                          </td>
                                          
                                        <td><?php echo e($insumo->tags); ?></td>
                                        <td><?php echo e($insumo->precio); ?></td>
                                        <td><?php echo e($insumo->stock); ?></td>
                                        <td><?php echo e($insumo->descuento); ?></td>
                                        <td><?php echo e($insumo->color); ?></td>
                                        <td><?php echo e($insumo->unidad); ?></td>
                                        <td><?php echo e($insumo->ancho); ?></td>
                                        <td><?php echo e($insumo->subcateg); ?></td>
                                        <td>
                                            <?php if($insumo->estado == 1): ?>
                                                <span class="badge badge-soft-success">Terminado</span>
                                            <?php else: ?>
                                                <span class="badge badge-soft-danger">Produccion</span>
                                            <?php endif; ?>
                                        </td>
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


    <script src="<?php echo e(URL::asset('build/libs/nouislider/nouislider.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/wnumb/wNumb.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/gridjs/gridjs.umd.js')); ?>"></script>
    <script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>


    <script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-list.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Allbaute\Allbaute\resources\views/insumos/index.blade.php ENDPATH**/ ?>