

<?php $__env->startSection('content'); ?>
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">

                                    <a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
                                <li class="is-marked">

                                    <a href="<?php echo e(url('/thanks')); ?>">Cảm ơn</a></li>
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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="about">
                                <div class="about__container">
                                    <div class="about__info">
                                        <h2 class="about__h2">ĐƠN HÀNG CỦA BẠN ĐÃ ĐƯỢC ĐẶT THÀNH CÔNG!</h2>
                                        <div class="about__p-wrap">
                                            <p class="about__p">Mã đơn hàng của bạn là <?php echo e(Session::get('order_id')); ?> và Tổng tiền là  <?php echo e(number_format(Session::get('grand_total'), 0, ',', '.')); ?> VNĐ</p>
                                        </div>

                                        <?php if(!empty($_GET['order'])&&$_GET['order']=="check"): ?>
                                            <div class="about__p-wrap">
                                                <p class="about__p">Vui lòng gửi Séc của bạn với số tiền <?php echo e(number_format(Session::get('grand_total'), 0, ',', '.')); ?> VNĐ bên dưới
                                                    Địa chỉ:<br>
                                                    DTSneaker.in<br>
                                                    Da Nang,Viet Nam<br>
                                                    Kiểm tra tên: DTSneaker
                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(!empty($_GET['order'])&&$_GET['order']=="bank"): ?>
                                            <div class="about__p-wrap">
                                                <p class="about__p">Vui lòng chuyển số tiền <?php echo e(number_format(Session::get('grand_total'), 0, ',', '.')); ?> VNĐ vào tài khoản ngân hàng bên dưới:<br>
                                                    Tên Chủ Tài khoản: VO DINH TAN<br>
                                                    <img style="width: 227px" src="<?php echo e(asset('front/images/qrcode.jpg')); ?>" alt="Mã QR của Ngân hàng" />
                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <a class="about__link btn--e-secondary" href="<?php echo e(url('/')); ?>" target="_blank">Tiếp tục mua sắm</a>
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

<?php
//use Illuminate\Support\Facades\Session;
Session::forget('grand_total');
Session::forget('order_id');
Session::forget('couponCode');
Session::forget('couponAmount');
?>

<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/orders/thanks.blade.php ENDPATH**/ ?>