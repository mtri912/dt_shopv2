<?php $__currentLoopData = $categoryProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-lg-4 col-md-6 col-6">
    <div class="product-m">
        <div class="product-m__thumb">
            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="<?php echo e(url('product/'.$product['id'])); ?>">
                <?php if(isset($product['images'][0]['image']) && !empty($product['images'][0]['image'])): ?>
                    <img class="aspect__img" src="<?php echo e(asset('front/images/products/medium/'.$product['images'][0]['image'])); ?>" alt=""></a>
                <?php else: ?>
                <img class="aspect__img" src="<?php echo e(asset('front/images/product/no-img.jpg')); ?>" alt="">
                <?php endif; ?>
                </a>
            <div class="product-m__quick-look">
                <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a></div>
            <div class="product-m__add-cart">
                <a class="btn--e-brand" href="<?php echo e(url('product/'.$product['id'])); ?>" data-modal="modal" data-modal-id="#add-to-cart">Xem chi tiết</a></div>
        </div>
        <div class="product-m__content">
            <div class="product-m__category">
                <a href="#"><?php echo e($product['brand']['brand_name']); ?></a></div>
            <div class="product-m__name">
                <a href="<?php echo e(url('product/'.$product['id'])); ?>"><?php echo e($product['product_name']); ?></a></div>


            <div class="product-m__price"><?php echo e(number_format($product['final_price'], 0, ',', '.')); ?>₫
                <?php if($product['discount_type']!=""): ?>
                    <span class="product-o__discount"><?php echo e(number_format($product['product_price'], 0, ',', '.')); ?>₫</span></span>
                <?php endif; ?>
            </div>
            <div class="product-m__hover">
                <div class="product-m__preview-description">

                    <span><?php echo e($product['description']); ?></span></div>
                <div class="product-m__wishlist">

                    <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a></div>
            </div>
        </div>
    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(empty($_GET['query'])): ?>
<div class="u-s-p-y-60 pagination">
    <?php
        if (!isset($_GET['color'])) {
            $_GET['color'] = "";
        }
        if (!isset($_GET['sort'])) {
            $_GET['sort'] = "";
        }
        if (!isset($_GET['size'])) {
            $_GET['size'] = "";
        }
        if (!isset($_GET['brand'])) {
            $_GET['brand'] = "";
        }
        if (!isset($_GET['price'])) {
            $_GET['price'] = "";
        }
        if (!isset($_GET['material'])) {
            $_GET['material'] = "";
        }
        if (!isset($_GET['fit'])) {
            $_GET['fit'] = "";
        }
        if (!isset($_GET['pattern'])) {
            $_GET['pattern'] = "";
        }
        if (!isset($_GET['sleeve'])) {
            $_GET['sleeve'] = "";
        }
        if (!isset($_GET['occasion'])) {
            $_GET['occasion'] = "";
        }

    ?>
    <!--====== Pagination ======-->
        <?php echo e($categoryProducts->appends([
            'sort'=>$_GET['sort'],
            'color'=>$_GET['color'],
            'size'=>$_GET['size'],
            'brand'=>$_GET['brand'],
            'price'=>$_GET['price'],
            'material'=>$_GET['material'],
            'fit'=>$_GET['fit'],
            'pattern'=>$_GET['pattern'],
            'sleeve'=>$_GET['sleeve'],
            'occasion'=>$_GET['occasion'],
            ])->links()); ?>

    <!--====== End - Pagination ======-->
</div>
<?php endif; ?>
<?php /**PATH D:\Xampp\htdocs\dt_shop-v2\resources\views/front/products/ajax_products_listing.blade.php ENDPATH**/ ?>