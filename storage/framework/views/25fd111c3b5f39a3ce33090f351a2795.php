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

                            <a href="<?php echo e(url('/cart')); ?>">Giỏ hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section 1 ======-->


<!--====== Section 2 ======-->
<div class="u-s-p-b-10">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary">GIỎ HÀNG</h1>
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
                <?php if(empty($getCartItems)): ?>
                    <div class="col-lg-12 col-md-12 u-s-m-b-30">
                        <div class="empty">
                            <div class="empty__wrap">

                                <span class="empty__big-text">TRỐNG</span>

                                <span class="empty__text-1">Không tìm thấy mặt hàng nào trên giỏ hàng của bạn.</span>

                                <a class="empty__redirect-link btn--e-brand" href="<?php echo e(url('/')); ?>">TIẾP TỤC MUA SẮM</a></div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                    <div class="table-responsive">
                        <table class="table-p">
                            <tbody>
                            <?php $total_price = 0; ?>
                            <?php $__currentLoopData = $getCartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $getAttributePrice = \App\Models\Product::getAttributePrice($item['product_id'],$item['product_size']);
//                                            dd($getAttributePrice);
//                                                dd($item);
                                    ?>
                                    <!--====== Row ======-->
                                <tr>
                                    <td>
                                        <div class="table-p__box">
                                            <div class="table-p__img-wrap">
                                                <?php if(isset($item['product']['images'][0]['image']) && !empty($item['product']['images'][0]['image'])): ?>
                                                    <a href="<?php echo e(url('product/'.$item['product']['id'])); ?>"><img class="u-img-fluid" src="<?php echo e(asset('front/images/products/small/'.$item['product']['images'][0]['image'])); ?>" alt=""></a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(url('product/'.$item['product']['id'])); ?>"><img class="u-img-fluid" src="<?php echo e(asset('front/images/product/no-img.jpg')); ?>" alt=""></a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="table-p__info">
                                                            <span class="table-p__name">
                                                                <a href="<?php echo e(url('product/'.$item['product']['id'])); ?>"><?php echo e($item['product']['product_name']); ?></a></span>
                                                <span class="table-p__category">
                                                                <a href="#"><?php echo e($item['product']['brand']['brand_name']); ?></a></span>
                                                <ul class="table-p__variant-list">
                                                    <li>
                                                        <span>Size: <?php echo e($item['product_size']); ?></span></li>
                                                    <li>
                                                        <span>Color: <?php echo e($item['product']['product_color']); ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        
                                        <div class="pd-detail__inline getAttributePrice">

                                            <span class="pd-detail__price" style="font-size: 16px">₫<?php echo e(number_format($getAttributePrice['final_price'] *  $item['product_qty'], 0, ',', '.')); ?></span>
                                            <?php if($getAttributePrice['discount'] > 0): ?>
                                                <span class="pd-detail__discount">(<?php echo e($getAttributePrice['discount_percent']); ?>% OFF)</span><del class="pd-detail__del">₫<?php echo e(number_format($getAttributePrice['product_price'] *  $item['product_qty'], 0, ',', '.')); ?></del>
                                            <?php endif; ?>
                                        </div>

                                    <td>
                                        <div class="table-p__input-counter-wrap">
                                            <!--====== Input Counter ======-->
                                            <div class="input-counter">
                                                <span class="input-counter__minus fas fa-minus updateCartItems qtyMinus" data-cartid="<?php echo e($item['id']); ?>" data-qty="<?php echo e($item['product_qty']); ?>"></span>
                                                <input class="input-counter__text input-counter--text-primary-style" type="text" value="<?php echo e($item['product_qty']); ?>" data-min="1" data-max="1000">
                                                <span class="input-counter__plus fas fa-plus updateCartItems qtyPlus" data-cartid="<?php echo e($item['id']); ?>" data-qty="<?php echo e($item['product_qty']); ?>"></span></div>
                                            <!--====== End - Input Counter ======-->
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table-p__del-wrap">
                                            <a class="far fa-trash-alt table-p__delete-link deleteCartItem" href="#" data-cartid="<?php echo e($item['id']); ?>" data-page="Cart"></a>
                                        </div>
                                    </td>
                                </tr>
                                <!--====== End - Row ======-->
                                <?php $total_price = $total_price + ($getAttributePrice['final_price'] * $item['product_qty']) ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="route-box">
                        <div class="route-box__g1">

                            <a class="route-box__link" href="shop-side-version-2.html"><i class="fas fa-long-arrow-alt-left"></i>

                                <span>TIẾP TỤC MUA SẮM</span></a></div>
                        <div class="route-box__g2">

                            <a class="route-box__link emptyCart" href="javascript:;"><i class="fas fa-trash"></i>
                                <span>XÓA GIỎ HÀNG</span>
                            </a>

                            <!-- <a class="route-box__link" href="cart.html"><i class="fas fa-sync"></i>
                                <span>UPDATE CART</span>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 2 ======-->


<!--====== Section 3 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                <form class="f-cart" action="javascript:;">
                                    <div class="f-cart__pad-box">
                                        <h1 class="gl-h1">ÁP DỤNG MÃ GIẢM GIÁ</h1>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="shipping-zip">Nhập mã giảm giá để được hưởng ưu đãi</label>
                                            <input class="input-text input-text--primary-style" type="text" id="code" name="code" placeholder="Nhập mã giảm giá">
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <button id="applyCoupon" type="submit" class="f-cart__ship-link btn--e-transparent-brand-b-2" style="width: 100%; cursor: pointer;" <?php if(Auth::check()): ?> user="1"  <?php endif; ?>>ÁP DỤNG</button>
                                        </div>
                                        <!-- <span class="gl-text">Note: Any note can come here</span> -->
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            </div>
                            <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                <div class="f-cart__pad-box">
                                    <div class="u-s-m-b-30">
                                        <table class="f-cart__table">
                                            <tbody>
                                            <tr>
                                                <td>TỔNG PHỤ</td>
                                                <td>₫<?php echo e(number_format($total_price, 0, ',', '.')); ?></td>
                                            </tr>
                                            <tr>
                                                <td>GIẢM GIÁ</td>
                                                <td>
                                                    <span class="couponAmount">
                                                        <?php if(Session::has('couponAmount')): ?>
                                                            ₫<?php echo e(number_format(Session::get('couponAmount'), 0, ',', '.')); ?>

                                                        <?php else: ?>
                                                            ₫0
                                                        <?php endif; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>TỔNG CỘNG</td>
                                                <td>
                                                    <span class="grandTotal">
                                                        <?php
                                                            $couponAmount = \Illuminate\Support\Facades\Session::get('couponAmount', 0);
                                                            $grand_total = $total_price - $couponAmount;
                                                        ?>
                                                    </span>
                                                    ₫<?php echo e(number_format($grand_total, 0, ',', '.')); ?>

                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <a href="<?php echo e(url('checkout')); ?>"><button class="f-cart__ship-link btn--e-transparent-brand-b-2" style="width: 100%; cursor: pointer;"> TIẾN TRÌNH THANH TOÁN</button></a>
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
<!--====== End - Section 3 ======-->


<?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/products/cart_items.blade.php ENDPATH**/ ?>