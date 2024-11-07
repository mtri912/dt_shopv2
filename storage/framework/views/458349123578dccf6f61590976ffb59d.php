

<?php $__env->startSection('content'); ?>
    <div align="center"><div class="print-error-msg" style="width: 90%"></div></div>
    <div align="center"><div class="print-success-msg" style="width: 90%"></div></div>
    <?php if(Session::has('error_message')): ?>
        <div align="center">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 65%">
                <strong>Error:</strong> <?php echo e(Session::get('error_message')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="border: 0px; float: right;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php endif; ?>
    <div class="app-content" id="appendCartItems">
        <?php echo $__env->make('front.products.cart_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/products/cart.blade.php ENDPATH**/ ?>