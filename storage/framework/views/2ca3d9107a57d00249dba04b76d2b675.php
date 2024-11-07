
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
                            <li class="breadcrumb-item active">Orders #<?php echo e($orderDetails['id']); ?> Detail</li>
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
                                <h3 class="card-title">Ordered Products</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Product Size</th>
                                        <th>Product Color</th>
                                        <th>Product Qty</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $orderDetails['orders_products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $getProductImage = \App\Models\Product::getProductImage($product['product_id']) ?>
                                        <tr>
                                            <td>
                                                <?php $getProductImage = \App\Models\Product::getProductImage($product['product_id']) ?>
                                                <?php if($getProductImage!=""): ?>
                                                    <a target="_blank" href="<?php echo e(url('product/'.$product['product_id'])); ?>"><img style="width:80px" src="<?php echo e(asset('front/images/products/small/'.$getProductImage)); ?>" alt=""></a>
                                                <?php else: ?>
                                                    <a target="_blank" href="<?php echo e(url('product/'.$product['product_id'])); ?>"><img style="width:80px" src="<?php echo e(asset('front/images/products/small/no-img.png')); ?>" alt=""></a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($product['product_code']); ?></td>
                                            <td><?php echo e($product['product_name']); ?></td>
                                            <td><?php echo e($product['product_size']); ?></td>
                                            <td><?php echo e($product['product_color']); ?></td>
                                            <td><?php echo e($product['product_qty']); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">



                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Order ID</td>
                                        <td><?php echo e($orderDetails['id']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Order Status</td>
                                        <td><?php echo e($orderDetails['order_status']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Order Total</td>
                                        <td><?php echo e(number_format($orderDetails['grand_total'], 0, ',', '.')); ?>₫</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charges</td>
                                        <td><?php echo e($orderDetails['shipping_charges']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Coupon Code</td>
                                        <td><?php echo e($orderDetails['coupon_code']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Coupon Amount</td>
                                        <td><?php echo e($orderDetails['coupon_amount']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Method</td>
                                        <td><?php echo e($orderDetails['payment_method']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Gateway</td>
                                        <td><?php echo e($orderDetails['payment_gateway']); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>






















                </div>
                <div class="row">










































                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Delivery Address</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo e($orderDetails['name']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td><?php echo e($orderDetails['address']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ward</td>
                                        <td><?php echo e($orderDetails['ward']['full_name']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>District</td>
                                        <td><?php echo e($orderDetails['district']['full_name']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Province</td>
                                        <td><?php echo e($orderDetails['province']['full_name']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Method</td>
                                        <td><?php echo e($orderDetails['payment_method']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td><?php echo e($orderDetails['mobile']); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Update Order Status</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <form action="<?php echo e(url('admin/update-order-status')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="order_id" value="<?php echo e($orderDetails['id']); ?>">
                                                <select name="order_status" id="order_status">
                                                    <option value="">Select</option>
                                                    <?php $__currentLoopData = $orderStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($status['name']); ?>"><?php echo e($status['name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <input style="width: 123px" type="text" name="courier_name" id="courier_name" placeholder="Courier Name">
                                                <input style="width: 123px" type="text" name="tracking_number" id="tracking_number" placeholder="Tracking Number">
                                                <button type="submit">Update</button>
                                            </form><br>
                                            <?php $__currentLoopData = $orderDetails['log']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <span style="height: 10px;"></span><strong><?php echo e($log['order_status']); ?></strong><br>
                                                <?php if($log['order_status']=="Shipped"): ?>
                                                    <?php if(!empty($orderDetails['courier_name'])): ?>
                                                        Courier Name: <?php echo e($orderDetails['courier_name']); ?><br>
                                                    <?php endif; ?>
                                                        <?php if(!empty($orderDetails['courier_name'])): ?>
                                                            Tracking Number: <?php echo e($orderDetails['tracking_number']); ?><br>
                                                        <?php endif; ?>
                                                <?php endif; ?>
                                                <?php echo e(date("F j,Y, g:i a", strtotime($log['created_at']))); ?>

                                                <hr color="#666666">
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/admin/orders/order_detail.blade.php ENDPATH**/ ?>