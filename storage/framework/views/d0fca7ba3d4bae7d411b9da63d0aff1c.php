
<?php $__env->startSection('content'); ?>
    <style>
        .pagination nav li{
           list-style-type: none;
            float: left;
            width: 20px;
        }
    </style>






































































    <div class="app-content">
        <!--====== Section 1 ======-->
        <div class="u-s-p-y-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <?php if(empty($_GET['query'])): ?>
                            <?php echo $__env->make('front.products.filters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('front.products.filters_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="shop-p">
                            <div class="shop-p__toolbar u-s-m-b-30">
                                <div class="shop-p__meta-wrap u-s-m-b-60">
                                    <span class="shop-p__meta-text-1">TÌM THẤY <?php echo e(count($categoryProducts)); ?> KẾT QUẢ</span>
                                    <div class="shop-p__meta-text-2">
                                        <?php if(isset($_GET['query'])&&!empty($_GET['query'])): ?>
                                            <?php echo e($_GET['query']); ?>

                                        <?php else: ?>
                                                <?php echo $categoryDetails['breadcrumbs']; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if(empty($_GET['query'])): ?>
                                    <div class="shop-p__tool-style">
                                        <div class="tool-style__group u-s-m-b-8">


                                        </div>
                                        <form name="sortProducts" id="sortProducts">
                                            <input type="hidden" name="url" id="url" value="<?php echo e($url); ?>">
                                            <div class="tool-style__form-wrap">
                                                <div class="u-s-m-b-8">
                                                    <select class="select-box select-box--transparent-b-2 getsort" name="sort" id="sort">
                                                        <option selected>Sắp xếp theo: Sản phẩm mới nhất</option>
                                                        <option value="product_latest">Sắp xếp theo: Mục mới nhất</option>
                                                        <option value="best_selling">Sắp xếp theo: Bán chạy nhất</option>
                                                        <option value="lowest_price">Sắp xếp theo: Giá thấp nhất</option>
                                                        <option value="highest_price">Sắp xếp theo: Giá cao nhất</option>
                                                        <option value="featured_items">Sắp xếp theo: Mục nổi bật</option>
                                                        <option value="discounted_items">Sắp xếp theo: Mặt hàng giảm giá</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="shop-p__collection">
                                <div class="row is-grid-active" id="appendProducts">
                                    <?php echo $__env->make('front.products.ajax_products_listing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/products/listing.blade.php ENDPATH**/ ?>