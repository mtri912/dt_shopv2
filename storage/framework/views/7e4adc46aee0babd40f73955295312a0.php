<!--====== Dashboard Features ======-->
<div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
    <div class="dash__pad-1">

        <span class="dash__text u-s-m-b-16">Xin chào, <?php echo e(Auth::user()->name); ?></span>
        <ul class="dash__f-list">
            <li><a href="<?php echo e(url('user/account')); ?>">Địa chỉ liên hệ</a></li>
            <li><a href="<?php echo e(url('user/orders')); ?>">Đơn hàng</a></li>

            <li><a href="<?php echo e(url('user/update-password')); ?>">Đổi Mật Khẩu</a></li>
        </ul>
    </div>
</div>

<!--====== End - Dashboard Features ======-->
<?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/layout/account_sidebar.blade.php ENDPATH**/ ?>