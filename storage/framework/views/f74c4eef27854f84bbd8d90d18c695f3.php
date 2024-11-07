<?php
use App\Models\Product;
$getCartItems = getCartItems();
?>
<!--====== Mini Product Container ======-->
<div class="mini-product-container gl-scroll u-s-m-b-15">
    <?php $total_price = 0 ?>
    <?php $__currentLoopData = $getCartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $getAttributePrice = Product::getAttributePrice($item['product_id'],$item['product_size']);
            ?>
    <!--====== Card for mini cart ======-->
    <div class="card-mini-product">
        <div class="mini-product">
            <div class="mini-product__image-wrapper">
                <a class="mini-product__link" href="<?php echo e(url('product/'.$item['product']['id'])); ?>">
                    <?php if(isset($item['product']['images'][0]['image']) && !empty($item['product']['images'][0]['image'])): ?>
                        <img class="u-img-fluid" src="<?php echo e(asset('front/images/products/small/'.$item['product']['images'][0]['image'])); ?>" alt="">
                    <?php else: ?>
                        <img class="u-img-fluid" src="<?php echo e(asset('front/images/product/no-img.jpg')); ?>" alt="">
                    <?php endif; ?>
                </a>
            </div>
            <div class="mini-product__info-wrapper">
                <span class="mini-product__category">
                    <a href="#"><?php echo e($item['product']['brand']['brand_name']); ?></a></span>
                <span class="mini-product__name">
                    <a href="<?php echo e(url('product/'.$item['product']['id'])); ?>"><?php echo e($item['product']['product_name']); ?></a></span>
                <span class="mini-product__quantity"><?php echo e($item['product_qty']); ?> x</span>
                <span class="mini-product__price">₫<?php echo e(number_format($getAttributePrice['final_price'], 0, ',', '.')); ?> &nbsp;= <span style="font-weight: bold; margin-left: 10px; color: red; font-size: 14px;"> ₫<?php echo e(number_format($getAttributePrice['final_price'] *  $item['product_qty'], 0, ',', '.')); ?></span></span>
            </div>
        </div>
        <a class="mini-product__delete-link far fa-trash-alt deleteCartItem" href="#" data-cartid="<?php echo e($item['id']); ?>"></a>
    </div>
    <!--====== End - Card for mini cart ======-->
        <?php $total_price = $total_price + ($getAttributePrice['final_price'] * $item['product_qty']) ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<!--====== End - Mini Product Container ======-->
<!--====== Mini Product Statistics ======-->
<div class="mini-product-stat">
    <div class="mini-total">
        <span class="subtotal-text">TỔNG PHỤ</span>
        <span class="subtotal-value">₫<?php echo e(number_format($total_price, 0, ',', '.')); ?></span>
    </div>
    <div class="mini-action">
        <a class="mini-link btn--e-brand-b-2" href="<?php echo e(url('/checkout')); ?>">TIẾN TRÌNH THANH TOÁN</a>
        <a class="mini-link btn--e-transparent-secondary-b-2" href="<?php echo e(url('/cart')); ?>">XEM GIỎ HÀNG</a>
    </div>
</div>
<!--====== End - Mini Product Statistics ======-->
<?php /**PATH D:\Xampp\htdocs\dt_shop-v2\resources\views/front/layout/header_cart_items.blade.php ENDPATH**/ ?>