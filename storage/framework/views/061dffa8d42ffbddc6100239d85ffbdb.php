<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-dark.png')); ?>" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('build/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('build/images/logo-light.png')); ?>" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span><?php echo app('translator')->get('Menu'); ?></span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="home" /*data-bs-toggle="collapse"*/ role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="las la-tachometer-alt"></i> <span><?php echo app('translator')->get('Panel principal'); ?></span>
                     </a>
                <li class="menu-title"><i class="ri-more-fill"></i> <span><?php echo app('translator')->get('Paginas'); ?></span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('parametrizacion.index')); ?>" /*data-bs-toggle="collapse"*/ role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="lar la-user-circle"></i> <span><?php echo app('translator')->get('Parametrization'); ?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('insumos.index')); ?>" /*data-bs-toggle="collapse"*/ role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="lar la-user-circle"></i> <span><?php echo app('translator')->get('Insumos'); ?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('proveedor.index')); ?>" /*data-bs-toggle="collapse"*/ role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="lar la-user-circle"></i> <span><?php echo app('translator')->get('Proveedor'); ?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('ordenCompra.index')); ?>" /*data-bs-toggle="collapse"*/ role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="lar la-user-circle"></i> <span><?php echo app('translator')->get('Orden de compra'); ?></span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span><?php echo app('translator')->get('Permisos especiales'); ?></span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('user.index')); ?>" /*data-bs-toggle="collapse"*/ role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="lar la-user-circle"></i> <span><?php echo app('translator')->get('Usuarios'); ?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo e(route('roles.index')); ?>" /*data-bs-toggle="collapse"*/ role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="lar la-user-circle"></i> <span><?php echo app('translator')->get('Roles'); ?></span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH C:\Users\Usuario\Documents\GitHub\Allbaute\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>