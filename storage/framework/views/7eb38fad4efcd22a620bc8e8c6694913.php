<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Welcome <strong><?php echo e(Auth::guard('admin')->user()->name); ?>  (<?php echo e(Auth::guard('admin')->user()->type); ?>)</strong></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo e(url('admin/dashboard')); ?>" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo e(url('admin/logout')); ?>" class="nav-link">Log Out</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
<?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/admin/layout/header.blade.php ENDPATH**/ ?>