
<?php $__env->startSection('content'); ?>
<div class="app-content">
    <!--====== Primary Slider ======-->

















    <div class="s-skeleton s-skeleton--bg-grey">
        <div class="owl-carousel primary-style-1" id="sitemakers-slider">
            <?php $__currentLoopData = $homeSliderBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sliderBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="sitemakers-slide" style="background-image: url('<?php echo e(asset('front/images/banners/'.$sliderBanner['image'])); ?>');" alt="<?php echo e($sliderBanner['alt']); ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-content slider-content--animation">
                                    <span class="content-span-2 u-c-secondary"><?php echo e($sliderBanner['title']); ?></span>
                                    <a class="shop-now-link btn--e-brand" href="<?php echo e($sliderBanner['link']); ?>">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <!--====== End - Primary Slider ======-->
    <!--====== Section 1 ======-->



































    <!--====== End - Section 1 ======-->
    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">
        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-16">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">

                            <span class="section__span u-c-silver">CHỌN DANH MỤC</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->
        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="filter-category-container">



                            <div class="filter__category-wrapper">
                                <button class="btn filter__btn filter__btn--style-1 js-checked" type="button" data-filter=".newarrivals">HÀNG MỚI VỀ</button>
                            </div>
                            <div class="filter__category-wrapper">
                                <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".bestsellers">BÁN CHẠY NHẤT</button>
                            </div>






                        </div>
                        <div class="filter__grid-wrapper u-s-m-t-30">
                            <div class="row">


























                                <?php $__currentLoopData = $newProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-6 u-s-m-b-30 filter__item newarrivals">
                                        <div class="product-o product-o--hover-on product-o--radius">
                                            <div class="product-o__wrap">
                                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="<?php echo e(url('product/'.$product['id'])); ?>">
                                                    <?php if(isset($product['images'][0]['image']) && !empty($product['images'][0]['image'])): ?>
                                                    <img class="aspect__img" src="<?php echo e(asset('front/images/products/medium/'.$product['images'][0]['image'])); ?>" alt=""></a>
                                                    <?php else: ?>
                                                    <img class="aspect__img" src="<?php echo e(asset('front/images/product/no-img.jpg')); ?>" alt="">
                                                    <?php endif; ?>
                                                    </a>
                                            </div>
                                            <span class="product-o__category">
                                                        <a href="#"><?php echo e($product['brand']['brand_name']); ?></a></span>
                                            <span class="product-o__name">
                                                        <a href="<?php echo e(url('product/'.$product['id'])); ?>"><?php echo e($product['product_name']); ?></a></span>



                                            <span class="product-o__price"><?php echo e(number_format($product['final_price'], 0, ',', '.')); ?>₫
                                                <?php if($product['discount_type']!=""): ?>
                                                        <span class="product-o__discount"><?php echo e(number_format($product['product_price'], 0, ',', '.')); ?>₫</span></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




























                                <?php $__currentLoopData = $bestSellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-6 u-s-m-b-30 filter__item bestsellers" style="display: none;">
                                        <div class="product-o product-o--hover-on product-o--radius">
                                            <div class="product-o__wrap">
                                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="<?php echo e(url('product/'.$product['id'])); ?>">
                                                    <?php if(isset($product['images'][0]['image']) && !empty($product['images'][0]['image'])): ?>
                                                        <img class="aspect__img" src="<?php echo e(asset('front/images/products/medium/'.$product['images'][0]['image'])); ?>" alt="">
                                                    <?php else: ?>
                                                        <img class="aspect__img" src="<?php echo e(asset('front/images/product/no-img.jpg')); ?>" alt="">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <span class="product-o__category">
                                                 <a href="#"><?php echo e($product['brand']['brand_name']); ?></a></span>
                                            <span class="product-o__name">
                                                 <a href="<?php echo e(url('product/'.$product['id'])); ?>"><?php echo e($product['product_name']); ?></a></span>
                                            <span class="product-o__price"><?php echo e(number_format($product['final_price'], 0, ',', '.')); ?>₫
                                             <?php if($product['discount_type']!=""): ?>
                                                    <span class="product-o__discount"><?php echo e(number_format($product['product_price'], 0, ',', '.')); ?>₫</span>
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





















































                                <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-6 u-s-m-b-30 filter__item featuredproducts" style="display: none;">
                                        <div class="product-o product-o--hover-on product-o--radius">
                                            <div class="product-o__wrap">
                                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="<?php echo e(url('product/'.$product['id'])); ?>">
                                                    <?php if(isset($product['images'][0]['image']) && !empty($product['images'][0]['image'])): ?>
                                                        <img class="aspect__img" src="<?php echo e(asset('front/images/products/medium/'.$product['images'][0]['image'])); ?>" alt="">
                                                    <?php else: ?>
                                                        <img class="aspect__img" src="<?php echo e(asset('front/images/product/no-img.jpg')); ?>" alt="">
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <span class="product-o__category">
                                                <a href="#"><?php echo e($product['brand']['brand_name']); ?></a></span>
                                            <span class="product-o__name">
                                                 <a href="<?php echo e(url('product/'.$product['id'])); ?>"><?php echo e($product['product_name']); ?></a></span>
                                            <span class="product-o__price"><?php echo e(number_format($product['final_price'], 0, ',', '.')); ?>₫
                                            <?php if($product['discount_type']!=""): ?>
                                                    <span class="product-o__discount"><?php echo e(number_format($product['product_price'], 0, ',', '.')); ?>₫</span><?php endif; ?>
                                             </span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="load-more">
                            <button class="btn btn--e-brand" type="button">View More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== Section 4 ======-->
    <div class="u-s-p-b-60">
        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">HÀNG MỚI VỀ</h1>
                            <span class="section__span u-c-silver">NHỮNG SẢN PHẨM MỚI NHẤT SHOP NHẬP VỀ PHỤC VỤ TÍN ĐỒ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->
        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="slider-fouc">
                    <div class="owl-carousel product-slider" data-item="4">
                        <?php $__currentLoopData = $newProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="u-s-m-b-30">
                            <div class="product-a product-o--hover-on product-o--radius">
                                <div class="product-o__wrap">
                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="<?php echo e(url('product/'.$product['id'])); ?>">
                                        <?php if(isset($product['images'][0]['image']) && !empty($product['images'][0]['image'])): ?>
                                            <img class="aspect__img" src="<?php echo e(asset('front/images/products/medium/'.$product['images'][0]['image'])); ?>" alt=""></a>
                                    <?php else: ?>
                                        <img class="aspect__img" src="<?php echo e(asset('front/images/product/no-img.jpg')); ?>" alt="">
                                        <?php endif; ?>

                                        </a>
                                </div>
                                <span class="product-o__category">
                                                        <a href="#"><?php echo e($product['brand']['brand_name']); ?></a></span>
                                <span class="product-o__name">
                                                        <a href="<?php echo e(url('product/'.$product['id'])); ?>"><?php echo e($product['product_name']); ?></a></span>



                                <span class="product-o__price"><?php echo e(number_format($product['final_price'], 0, ',', '.')); ?>₫
                                                <?php if($product['discount_type']!=""): ?>
                                        <span class="product-o__discount"><?php echo e(number_format($product['product_price'], 0, ',', '.')); ?>₫</span></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="load-more">
                        <button class="btn btn--e-brand" type="button">View More</button>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Conten===-->
    </div>
    <!--====== End - Section 4 ======-->
    <!--====== Section 5 ======-->
    <div class="u-s-p-b-60">
        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">SẢN PHẨM TIÊU BIỂU</h1>
                            <span class="section__span u-c-silver">NHỮNG SẢN PHẨM TIÊU BIỂU SHOP PHỤC VỤ TÍN ĐỒ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->
        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="slider-fouc">
                    <div class="owl-carousel product-slider" data-item="4">
                        <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="u-s-m-b-30">
                            <div class="product-a product-o--hover-on product-o--radius">
                                <div class="product-o__wrap">
                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="<?php echo e(url('product/'.$product['id'])); ?>">
                                        <?php if(isset($product['images'][0]['image']) && !empty($product['images'][0]['image'])): ?>
                                            <img class="aspect__img" src="<?php echo e(asset('front/images/products/medium/'.$product['images'][0]['image'])); ?>" alt=""></a>
                                        <?php else: ?>
                                        <img class="aspect__img" src="<?php echo e(asset('front/images/product/no-img.jpg')); ?>" alt="">
                                        <?php endif; ?>
                                        </a>
                                </div>
                                <span class="product-o__category">
                                                        <a href="#"><?php echo e($product['brand']['brand_name']); ?></a></span>
                                <span class="product-o__name">
                                                        <a href="<?php echo e(url('product/'.$product['id'])); ?>"><?php echo e($product['product_name']); ?></a></span>










                                <span class="product-o__price"><?php echo e(number_format($product['final_price'], 0, ',', '.')); ?>₫
                                                <?php if($product['discount_type']!=""): ?>
                                        <span class="product-o__discount"><?php echo e(number_format($product['product_price'], 0, ',', '.')); ?>₫</span></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="load-more">
                        <button class="btn btn--e-brand" type="button">View More</button>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 5 ======-->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/index.blade.php ENDPATH**/ ?>