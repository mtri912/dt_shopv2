<?php
use App\Models\Category;
// Get Categories and their Sub Categories
$categories = Category::getcategories();

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
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/products/filters_search.blade.php ENDPATH**/ ?>