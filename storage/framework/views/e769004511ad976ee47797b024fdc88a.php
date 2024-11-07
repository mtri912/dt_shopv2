<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" id="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Admin Panel | Dashboard </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(url('admin/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(url('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(url('admin/css/adminlte.min.css')); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(url('admin/plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="<?php echo e(url('admin/images/AdminLTELogo.png')); ?>" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo e(url('admin/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo e(url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(url('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(url('admin/js/adminlte.js')); ?>"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo e(url('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')); ?>"></script>
<script src="<?php echo e(url('admin/plugins/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(url('admin/plugins/jquery-mapael/jquery.mapael.min.js')); ?>"></script>
<script src="<?php echo e(url('admin/plugins/jquery-mapael/maps/usa_states.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(url('admin/plugins/chart.js/Chart.min.js')); ?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(url('admin/js/demo.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(url('admin/js/pages/dashboard2.js')); ?>"></script>
<!-- Custom JS -->
<script src="<?php echo e(url('admin/js/custom.js')); ?>"></script>
<!-- DataTables & Plugins -->
<script src="<?php echo e(url('admin/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script>
    $(function (){
       $("#categories").DataTable();
       $("#brands").DataTable();
       $("#cmspages").DataTable();
       $("#subadmins").DataTable();
       $("#banners").DataTable();
       $("#products").DataTable({
           "order": [[0, "desc"]], // or asc
       });
       $("#coupons").DataTable();
       $("#users").DataTable({
           "order": [[0, "desc"]], // or asc
       });
        $("#orders").DataTable({
            "order": [[0, "desc"]], // or asc
        });
    });
</script>
<!-- Select2 -->
<script src="<?php echo e(url('admin/plugins/select2/js/select2.full.min.js')); ?>"></script>
<script>
    $('.select2').select2();
</script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/admin/layout/layout.blade.php ENDPATH**/ ?>