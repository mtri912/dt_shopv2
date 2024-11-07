
<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Orders </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <?php if(Session::has('success_message')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> <?php echo e(Session::get('success_message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Orders</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="orders" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>Customer Name</th>
                                        <th>Customer Email</th>
                                        <th>Ordered Products</th>
                                        <th>Order Amount</th>
                                        <th>Order Status</th>
                                        <th>Payment Method</th>
                                        <th style="width: 9%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($order['id']); ?></td>
                                            <td><?php echo e(date("F j,Y, g:i a", strtotime($order['created_at']))); ?></td>
                                            <td><?php echo e($order['user']['name']); ?></td>
                                            <td><?php echo e($order['user']['email']); ?></td>
                                            <td>
                                                <?php $__currentLoopData = $order['orders_products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($product['product_code']); ?> (<?php echo e($product['product_qty']); ?>)<br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td><?php echo e(number_format($order['grand_total'], 0, ',', '.')); ?>₫</td>
                                            <td><?php echo e($order['order_status']); ?></td>
                                            <td><?php echo e($order['payment_method']); ?></td>
                                            <td>
                                                <a title="View Order Details" style="color: #3f6ed3" href="<?php echo e(url('admin/orders/'.$order['id'])); ?>" >
                                                    <i class="fas fa-file"></i>
                                                </a>
                                                <?php if($order['order_status']=="Shipped" || $order['order_status']=="Delivered"): ?>
                                                    &nbsp;&nbsp;
                                                    <a target="_blank" title="Print HTML Order Invoice" style="color: #3f6ed3" href="<?php echo e(url('admin/print-order-invoice/'.$order['id'])); ?>" >
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <a target="_blank" title="Print PDF Order Invoice" style="color: #3f6ed3" href="<?php echo e(url('admin/print-pdf-order-invoice/'.$order['id'])); ?>" >
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/admin/orders/orders.blade.php ENDPATH**/ ?>