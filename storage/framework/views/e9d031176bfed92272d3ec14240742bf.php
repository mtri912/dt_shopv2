<?php
use App\Models\ProductsFilter;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
// Get Categories and their Sub Categories
$categories = Category::getcategories();
$url = Route::getFacadeRoot()->current()->uri;
$categoryDetails = Category::categoryDetails($url);
//dd($categoryDetails);
?>
<div class="shop-w-master">
    <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

        <span>LỌC</span></h1>
    <div class="shop-w-master__sidebar">
        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h">DANH MỤC</h1>

                    <span class="fas fa-minus shop-w__toggle" data-target="#s-category" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-category">
                    <ul class="shop-w__category-list gl-scroll">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="has-list">
                            <a href="#"><?php echo e($category['category_name']); ?></a>
                            <span class="js-shop-category-span is-expanded fas fa-plus u-s-m-l-6"></span>
                            <?php if(count($category['subcategories'])): ?>
                            <ul style="display:block">
                                <?php $__currentLoopData = $category['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="has-list">
                                    <a <?php if(isset($categoryDetails['categoryDetails']['parentcategory']['category_name'])&&$categoryDetails['categoryDetails']['parentcategory']['category_name']==$subcategory['category_name']): ?> style="color:  #ff4500;" <?php elseif(isset($categoryDetails['categoryDetails']['category_name'])&&$categoryDetails['categoryDetails']['category_name']==$subcategory['category_name']): ?> style="color: #ff4500" <?php endif; ?> href="<?php echo e(url($subcategory['url'])); ?>"><?php echo e($subcategory['category_name']); ?></a>
                                    <span class="js-shop-category-span fas <?php if(count($subcategory['subcategories'])): ?> fa-plus <?php endif; ?> u-s-m-l-6"></span>
                                    <?php if(count($subcategory['subcategories'])): ?>
                                    <ul>
                                        <?php $__currentLoopData = $subcategory['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a <?php if(isset($categoryDetails['categoryDetails']['parentcategory']['category_name'])&&$categoryDetails['categoryDetails']['parentcategory']['category_name']==$subsubcategory['category_name']): ?> style="color:  #ff4500;" <?php elseif(isset($categoryDetails['categoryDetails']['category_name'])&&$categoryDetails['categoryDetails']['category_name']==$subsubcategory['category_name']): ?> style="color:  #ff4500" <?php endif; ?> href="<?php echo e(url($subsubcategory['url'])); ?>"><?php echo e($subsubcategory['category_name']); ?></a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>


































































        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h">SIZE</h1>

                    <span class="fas fa-minus shop-w__toggle" data-target="#s-size" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-size">
                    <?php $getSizes = ProductsFilter::getSizes($categoryDetails['catIds']); ?>
                    <ul class="shop-w__list gl-scroll">
                        <?php $__currentLoopData = $getSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                if (isset($_GET['size'])&&!empty($_GET['size'])) {
                                    $sizes = explode('~', $_GET['size']);
                                    if (!empty($sizes)&&in_array($size, $sizes)) {
                                        $sizechecked = "checked";
                                    } else {
                                        $sizechecked = "";
                                    }
                                } else {
                                    $sizechecked = "";
                                }
                                ?>
                            <li>
                                <!--====== Check Box ======-->
                                <div class="check-box">
                                    <input type="checkbox" id="size<?php echo e($key); ?>" name="size" value="<?php echo e($size); ?>" class="filterAjax" <?php echo e($sizechecked); ?>>
                                    <div class="check-box__state check-box__state--primary">
                                        <label class="check-box__label" for="size<?php echo e($key); ?>"><?php echo e($size); ?></label>
                                    </div>
                                </div>
                                <!--====== End - Check Box ======-->
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h">THƯƠNG HIỆU</h1>

                    <span class="fas fa-minus shop-w__toggle" data-target="#s-brand" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-brand">
                    <?php $getBrands = ProductsFilter::getBrands($categoryDetails['catIds']); ?>
                    <ul class="shop-w__list gl-scroll">
                        <?php $__currentLoopData = $getBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                if (isset($_GET['brand'])&&!empty($_GET['brand'])) {
                                    $brands = explode('~', $_GET['brand']);
                                    if (!empty($brands)&&in_array($brand['id'], $brands)) {
                                        $brandchecked = "checked";
                                    } else {
                                        $brandchecked = "";
                                    }
                                } else {
                                    $brandchecked = "";
                                }
                                ?>
                        <li>
                            <!--====== Check Box ======-->
                            <div class="check-box">
                                <input type="checkbox" id="brand<?php echo e($key); ?>" name="brand" value="<?php echo e($brand['id']); ?>" class="filterAjax" <?php echo e($brandchecked); ?>>
                                <div class="check-box__state check-box__state--primary">
                                    <label class="check-box__label" for="brand<?php echo e($key); ?>"><?php echo e($brand['brand_name']); ?></label>
                                </div>
                            </div>
                            <!--====== End - Check Box ======-->
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h">GIÁ</h1>

                    <span class="fas fa-minus shop-w__toggle" data-target="#s-price" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-price">
                    <?php $getPrices = array('0-199000','200000-399000','400000-599000','600000-1000000') ?>
                        <ul class="shop-w__list gl-scroll">
                            <?php $__currentLoopData = $getPrices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $prices = explode('-', $price);
                                    $formattedPrice = number_format($prices[0], 0, ',', '.') . 'đ - ' . number_format($prices[1], 0, ',', '.') . 'đ';
                                    if (isset($_GET['price'])&&!empty($_GET['price'])) {
                                        $pricess = explode('~', $_GET['price']);
                                        if (!empty($pricess)&&in_array($price, $pricess)) {
                                            $pricechecked = "checked";
                                        } else {
                                            $pricechecked = "";
                                        }
                                    } else {
                                        $pricechecked = "";
                                    }
                                    ?>
                                <li>
                                    <!--====== Check Box ======-->
                                    <div class="check-box">
                                        <input type="checkbox" id="price<?php echo e($key); ?>" name="price" value="<?php echo e($price); ?>" class="filterAjax" <?php echo e($pricechecked); ?>>
                                        <div class="check-box__state check-box__state--primary">
                                            <label class="check-box__label" for="price<?php echo e($key); ?>"><?php echo e($formattedPrice); ?></label>
                                        </div>
                                    </div>
                                    <!--====== End - Check Box ======-->
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                </div>
            </div>
        </div>
        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h">MÀU SẮC</h1>

                    <span class="fas fa-minus shop-w__toggle" data-target="#s-color" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-color">
                    <?php $getColors = ProductsFilter::getColors($categoryDetails['catIds']); ?>
                    <ul class="shop-w__list gl-scroll">
                        <?php $__currentLoopData = $getColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                if (isset($_GET['color'])&&!empty($_GET['color'])) {
                                    $colors = explode('~', $_GET['color']);
                                    if (!empty($colors)&&in_array($color, $colors)) {
                                        $colorchecked = "checked";
                                    } else {
                                        $colorchecked = "";
                                    }
                                } else {
                                    $colorchecked = "";
                                }
                                ?>
                            <li>
                                <div class="color__check">
                                    <input type="checkbox" id="color<?php echo e($key); ?>" name="color" value="<?php echo e($color); ?>" class="filterAjax" <?php echo e($colorchecked); ?>>
                                    <label class="color__check-label" for="jet" style="background-color: <?php echo e($color); ?>" title="<?php echo e($color); ?>"></label>
                                </div><?php echo e($color); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
            $getDynamicFilter = ProductsFilter::getDynamicFilters($categoryDetails['catIds']);
//            dd($getDynamicFilter);
        ?>
        <?php $__currentLoopData = $getDynamicFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="u-s-m-b-30">
            <div class="shop-w shop-w--style">
                <div class="shop-w__intro-wrap">
                    <h1 class="shop-w__h"><?php echo e(ucwords($filter)); ?></h1>

                    <span class="fas fa-minus shop-w__toggle" data-target="#s-filter<?php echo e($key); ?>" data-toggle="collapse"></span>
                </div>
                <div class="shop-w__wrap collapse show" id="s-filter<?php echo e($key); ?>">
                    <ul class="shop-w__list gl-scroll">
                        <?php
                            $filterValues = ProductsFilter::selectedFilters($filter,$categoryDetails['catIds']);
                            ?>
                        <?php $__currentLoopData = $filterValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fkey => $filterValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $checkFilter = "" ?>
                        <?php if(isset($_GET[$filter])): ?>
                            <?php $explodeFilters = explode('~',$_GET[$filter]) ?>
                            <?php if(in_array($filterValue,$explodeFilters)): ?>
                                <?php $checkFilter = "checked" ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li>
                            <!--====== Check Box ======-->
                            <div class="check-box">

                                <input type="checkbox" id="filter<?php echo e($fkey); ?>" name="<?php echo e($filter); ?>" value="<?php echo e($filterValue); ?>" class="filterAjax">
                                <div class="check-box__state check-box__state--primary">

                                    <label class="check-box__label" for="filter<?php echo e($fkey); ?>"><?php echo e($filterValue); ?></label></div>
                            </div>
                            <!--====== End - Check Box ======-->
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/products/filters.blade.php ENDPATH**/ ?>