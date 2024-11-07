<?php if(count($deliveryAddresses) > 0): ?>
    <h1 class="checkout-f__h1">ĐỊA CHỈ GIAO HÀNG</h1>
    <div class="o-summary__section u-s-m-b-30">
        <div class="o-summary__box">
            <div class="ship-b">
                <span class="ship-b__text">Giao hàng đến:</span>
                <?php $__currentLoopData = $deliveryAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="ship-b__box u-s-m-b-10">
                        <input class="setDefaultAddress" data-addressid="<?php echo e($address['id']); ?>" href="javascript:;" type="radio" id="address<?php echo e($address['id']); ?>" name="address_id" value="<?php echo e($address['id']); ?>" <?php if($address['is_default']==1): ?> checked="" <?php endif; ?>>
                        <p class="ship-b__p"><?php echo e($address['name']); ?>, <?php echo e($address['address']); ?>, <?php echo e($address['ward']['full_name']); ?>, <?php echo e($address['district']['full_name']); ?>, <?php echo e($address['province']['full_name']); ?></p>

                        <a class="ship-b__edit btn--e-transparent-platinum-b-2 editAddress" data-modal="modal" data-modal-id="#edit-ship-address" data-addressid="<?php echo e($address['id']); ?>" href="javascript:;">Sửa</a>
                        <a class="ship-b__edit btn--e-transparent-platinum-b-2 deleteAddress" data-modal="modal" data-modal-id="#edit-ship-address" data-addressid="<?php echo e($address['id']); ?>" href="javascript:;">Xóa</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/products/delivery_addresses.blade.php ENDPATH**/ ?>