
<?php $__env->startSection('content'); ?>
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-10">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">

                                    <a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
                                <li class="is-marked">

                                    <a href="<?php echo e(url('user/orders')); ?>">Đơn hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="dash">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <?php echo $__env->make('front.layout.account_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <h1 class="dash__h1 u-s-m-b-14">Đơn hàng</h1>

                                        <span class="dash__text u-s-m-b-30">Tại đây bạn có thể xem tất cả các sản phẩm đã được giao.</span>












                                        <div class="m-order__list">
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="m-order__get">
                                                    <div class="manage-o__header u-s-m-b-30">
                                                        <div class="dash-l-r">
                                                            <div>
                                                                <div class="manage-o__text-2 u-c-secondary">Order #<?php echo e($order->id); ?></div>
                                                                <div class="manage-o__text u-c-silver">Placed on <?php echo e(date("F j, Y, g:i a" ,strtotime($order->created_at))); ?></div>
                                                            </div>
                                                            <div>
                                                                <div class="dash__link dash__link--brand">

                                                                    <a href="<?php echo e(url('/user/orders/'.$order->id)); ?>">XEM CHI TIẾT</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="manage-o__description">
                                                        <div class="description__info-wrap">
                                                            <div>
                                                                <span class="manage-o__badge badge--processing"><?php echo e($order->order_status); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="description__info-wrap">
                                                            <div>
                                                                <span class="manage-o__text-2 u-c-silver">Phương thức thanh toán:
                                                                    <span class="manage-o__text-2 u-c-secondary"><?php echo e($order->payment_method); ?></span></span>
                                                            </div>
                                                            <div>
                                                                <span class="manage-o__text-2 u-c-silver">Tổng số mặt hàng:
                                                                    <span class="manage-o__text-2 u-c-secondary"><?php echo e(count($order->orders_products)); ?></span></span>
                                                            </div>
                                                            <div>
                                                                    <span class="manage-o__text-2 u-c-silver">Tổng cộng:

                                                                        <span class="manage-o__text-2 u-c-secondary">₫<?php echo e(number_format($order->grand_total, 0, ',', '.')); ?></span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/orders/orders.blade.php ENDPATH**/ ?>