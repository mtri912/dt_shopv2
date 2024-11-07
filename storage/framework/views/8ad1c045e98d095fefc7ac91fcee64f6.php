

<?php $__env->startSection('content'); ?>
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-t-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">

                        <!--====== Product Breadcrumb ======-->
                        <div class="pd-breadcrumb u-s-m-b-30">
                            <ul class="pd-breadcrumb__list">
                              <?php echo $categoryDetails['breadcrumbs']; ?>
                            </ul>
                        </div>
                        <!--====== End - Product Breadcrumb ======-->


                        <!--====== Product Detail Zoom ======-->
                        <div class="pd u-s-m-b-30">
                            <div class="slider-fouc pd-wrap">
                                <div id="pd-o-initiate">
                                    <?php $__currentLoopData = $productDetails['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="pd-o-img-wrap" data-src="<?php echo e(asset('front/images/products/large/'.$image['image'])); ?>">
                                        <img class="u-img-fluid" src="<?php echo e(asset('front/images/products/large/'.$image['image'])); ?>" data-zoom-image="<?php echo e(asset('front/images/products/large/'.$image['image'])); ?>" alt="">
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <span class="pd-text">Click for larger zoom</span>
                            </div>
                            <div class="u-s-m-t-15">
                                <div class="slider-fouc">
                                    <div id="pd-o-thumbnail">
                                        <?php $__currentLoopData = $productDetails['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <img class="u-img-fluid" src="<?php echo e(asset('front/images/products/small/'.$image['image'])); ?>" alt="">
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Product Detail Zoom ======-->
                    </div>
                    <div class="col-lg-7">

                        <!--====== Product Right Side Details ======-->
                        <div class="pd-detail">
                            <div>
                                <div class="print-error-msg"></div>
                                <div class="print-success-msg"></div>
                                <span class="pd-detail__name"><?php echo e($productDetails['product_name']); ?></span></div>
                            <div>
                                <div class="pd-detail__inline getAttributePrice">

                                    <span class="pd-detail__price">₫<?php echo e(number_format($productDetails['final_price'], 0, ',', '.')); ?></span>
                                    <?php if($productDetails['discount_type']!=""): ?>

                                        <del class="pd-detail__del">₫<?php echo e(number_format($productDetails['product_price'], 0, ',', '.')); ?></del>
                                    <?php endif; ?>
                                </div>
                            </div>














                            <div class="u-s-m-b-15">

                                <span class="pd-detail__preview-desc"><?php echo e($productDetails['description']); ?></span></div>




























                            <div class="u-s-m-b-15">
                                <form name="addToCart" id="addToCart" class="pd-detail__form" action="javascript:;">
                                    <input type="hidden" name="product_id" value="<?php echo e($productDetails['id']); ?>" >
                                    <?php if(count($groupProducts) > 0): ?>
                                    <div class="u-s-m-b-15">

                                        <span class="pd-detail__label u-s-m-b-8">Color:</span>
                                        <div class="pd-detail__color">
                                            <?php $__currentLoopData = $groupProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(url('product/'.$product['id'])); ?>">
                                                <div class="color__radio">
                                                    <label class="color__radio-label" for="folly" style="background-color: <?php echo e($product['product_color']); ?>">
                                                    </label>
                                                </div>
                                            </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="u-s-m-b-15">

                                        <span class="pd-detail__label u-s-m-b-8">Size:</span>
                                        <div class="pd-detail__size">
                                            <?php $__currentLoopData = $productDetails['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="size__radio">
                                                    <input type="radio" id="<?php echo e($attribute['size']); ?>" name="size" value="<?php echo e($attribute['size']); ?>" product-id="<?php echo e($productDetails['id']); ?>" class="getPrice" required>
                                                    <label class="size__radio-label" for="<?php echo e($attribute['size']); ?>"><?php echo e($attribute['size']); ?></label></div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="pd-detail-inline-2">
                                        <div class="u-s-m-b-15">

                                            <!--====== Input Counter ======-->
                                            <div class="input-counter">

                                                <span class="input-counter__minus fas fa-minus"></span>

                                                <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000" name="qty">

                                                <span class="input-counter__plus fas fa-plus"></span></div>
                                            <!--====== End - Input Counter ======-->
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button></div>
                                    </div>
                                </form>
                            </div>

                            <div class="u-s-m-b-15">
                                <span class="pd-detail__label u-s-m-b-8">Chính Sách Cộng Tác Viên:</span>
                                <ul class="pd-detail__policy-list">
                                    <li>
                                        <i class="fas fa-check-circle u-s-m-r-8"></i>
                                        <span>Nhận gửi hộ CTV - Hỗ trợ đổi tên người gửi là tên của CTV.</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check-circle u-s-m-r-8"></i>
                                        <span>Khách nhận được hàng bank lãi ngay không cần đợi đến cuối tháng hay là cuối tuần.</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check-circle u-s-m-r-8"></i>
                                        <span>Các đơn hàng từ 1,2,3,4 đôi đều đồng giáp 30K Ship.</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check-circle u-s-m-r-8"></i>
                                        <span>Shop chỉ thu phí ship mặc địch 30k - Ngoài ra shop không thu bất kì phí nào khác.</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="u-s-m-b-15">
                                <span class="pd-detail__label u-s-m-b-8">Chính Sách Giao Hàng:</span>
                                <ul class="pd-detail__policy-list">
                                    <li>
                                        <i class="fas fa-check-circle u-s-m-r-8"></i>
                                        <span>Hỗ trợ đổi Size linh hoạt.</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check-circle u-s-m-r-8"></i>
                                        <span>Kiểm tra hàng thoải mái trước khi thanh toán.</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-check-circle u-s-m-r-8"></i>
                                        <span>Nhận hàng nếu gặp lỗi, shop sẽ sẵn sàng hỗ trợ đổi trả nếu đó là hàng của shop (Tránh tình trạng tráo hàng).</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--====== End - Product Right Side Details ======-->
                    </div>
                </div>
            </div>
        </div>

        <!--====== Product Detail Tab ======-->
        <div class="u-s-p-y-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pd-tab">
                            <div class="u-s-m-b-30">
                                <ul class="nav pd-tab__list">
                                    <li class="nav-item">

                                        <a class="nav-link" data-toggle="tab" href="#pd-desc">DESCRIPTION</a></li>
                                    <li class="nav-item">

                                        <a class="nav-link" data-toggle="tab" href="#pd-tag">VIDEO</a></li>
                                    <li class="nav-item">

                                        <a class="nav-link active" id="view-review" data-toggle="tab" href="#pd-rev">REVIEWS
                                            <span>(25)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">

                                <!--====== Tab 1 ======-->
                                <div class="tab-pane" id="pd-desc">
                                    <div class="pd-tab__desc">
                                        <div class="u-s-m-b-15">
                                            <p>
                                                <?php echo e($productDetails['description']); ?>

                                            </p>
                                        </div>
                                        <div class="u-s-m-b-30"><iframe src="https://www.youtube.com/embed/qKqSBm07KZk" allowfullscreen></iframe></div>
                                        <!-- <div class="u-s-m-b-30">
                                            <ul>
                                                <li><i class="fas fa-check u-s-m-r-8"></i>

                                                    <span>Buyer Protection.</span></li>
                                                <li><i class="fas fa-check u-s-m-r-8"></i>

                                                    <span>Full Refund if you don't receive your order.</span></li>
                                                <li><i class="fas fa-check u-s-m-r-8"></i>

                                                    <span>Returns accepted if product not as described.</span></li>
                                            </ul>
                                        </div> -->
                                        <div class="u-s-m-b-15">
                                            <h4>PRODUCT INFORMATION</h4>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-table gl-scroll">
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td>Brand</td>
                                                        <td><?php echo e($productDetails['brand']['brand_name']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Product Code</td>
                                                        <td><?php echo e($productDetails['product_code']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Product Color</td>
                                                        <td><?php echo e($productDetails['product_color']); ?></td>
                                                    </tr>
                                                    <?php if(!empty($productDetails['material'])): ?>
                                                    <tr>
                                                        <td>Material</td>
                                                        <td><?php echo e($productDetails['material']); ?></td>
                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php if(!empty($productDetails['sleeve'])): ?>
                                                    <tr>
                                                        <td>Sleeve</td>
                                                        <td><?php echo e($productDetails['sleeve']); ?></td>
                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php if(!empty($productDetails['fit'])): ?>
                                                    <tr>
                                                        <td>Fit</td>
                                                        <td><?php echo e($productDetails['fit']); ?></td>
                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php if(!empty($productDetails['pattern'])): ?>
                                                    <tr>
                                                        <td>Pattern</td>
                                                        <td><?php echo e($productDetails['pattern']); ?></td>
                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php if(!empty($productDetails['occasion'])): ?>
                                                    <tr>
                                                        <td>Occasion</td>
                                                        <td><?php echo e($productDetails['occasion']); ?></td>
                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php if(!empty($productDetails['product_weight'])): ?>
                                                    <tr>
                                                        <td>Product Weight</td>
                                                        <td><?php echo e($productDetails['product_weight']); ?></td>
                                                    </tr>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Tab 1 ======-->


                                <!--====== Tab 2 ======-->
                                <div class="tab-pane" id="pd-tag">
                                    <div class="pd-tab__tag">
                                        <h2 class="u-s-m-b-15">PRODUCT VIDEO</h2>
                                        <div class="u-s-m-b-15">
                                            <?php if($productDetails['product_video']): ?>
                                            <video width="400" controls>
                                                <source src="<?php echo e(url('front/videos/products/'.$productDetails['product_video'])); ?>" type="video/mp4">

                                                Your browser does not support HTML video.
                                            </video>
                                            <?php else: ?>
                                                Product Video does not exists
                                            <?php endif; ?>
                                        </div>

                                        <span class="gl-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                    </div>
                                </div>
                                <!--====== End - Tab 2 ======-->


                                <!--====== Tab 3 ======-->
                                <div class="tab-pane fade show active" id="pd-rev">
                                    <div class="pd-tab__rev">
                                        <div class="u-s-m-b-30">
                                            <div class="pd-tab__rev-score">
                                                <div class="u-s-m-b-8">
                                                    <h2>25 Reviews - 4.6 (Overall)</h2>
                                                </div>
                                                <div class="gl-rating-style-2 u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                                                <div class="u-s-m-b-8">
                                                    <h4>We want to hear from you!</h4>
                                                </div>

                                                <span class="gl-text">Tell us what you think about this item</span>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <form class="pd-tab__rev-f1">
                                                <div class="rev-f1__group">
                                                    <div class="u-s-m-b-15">
                                                        <h2>25 Review(s) for Double Shade Black Grey Casual T-Shirt</h2>
                                                    </div>
                                                    <div class="u-s-m-b-15">

                                                        <label for="sort-review"></label><select class="select-box select-box--primary-style" id="sort-review">
                                                            <option selected>Sort by: Best Rating</option>
                                                            <option>Sort by: Worst Rating</option>
                                                        </select></div>
                                                </div>
                                                <div class="rev-f1__review">
                                                    <div class="review-o u-s-m-b-15">
                                                        <div class="review-o__info u-s-m-b-8">

                                                            <span class="review-o__name">Good Product</span>

                                                            <span class="review-o__date">22 July 2023 10:57:43</span></div>
                                                        <div class="review-o__rating gl-rating-style u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                            <span>(4)</span></div>
                                                        <p class="review-o__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                    </div>
                                                    <div class="review-o u-s-m-b-15">
                                                        <div class="review-o__info u-s-m-b-8">

                                                            <span class="review-o__name">Good Product</span>

                                                            <span class="review-o__date">22 July 2023 10:57:43</span></div>
                                                        <div class="review-o__rating gl-rating-style u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                            <span>(4)</span></div>
                                                        <p class="review-o__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                    </div>
                                                    <div class="review-o u-s-m-b-15">
                                                        <div class="review-o__info u-s-m-b-8">

                                                            <span class="review-o__name">Good Product</span>

                                                            <span class="review-o__date">22 July 2023 10:57:43</span></div>
                                                        <div class="review-o__rating gl-rating-style u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                            <span>(4)</span></div>
                                                        <p class="review-o__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <form class="pd-tab__rev-f2">
                                                <h2 class="u-s-m-b-15">Add a Review</h2>

                                                <span class="gl-text u-s-m-b-15">Your email address will not be published. Required fields are marked *</span>
                                                <div class="u-s-m-b-30">
                                                    <div class="rev-f2__table-wrap gl-scroll">
                                                        <table class="rev-f2__table">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i class="fas fa-star"></i>

                                                                        <span>(1)</span></div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                        <span>(1.5)</span></div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                        <span>(2)</span></div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                        <span>(2.5)</span></div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                        <span>(3)</span></div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                        <span>(3.5)</span></div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                        <span>(4)</span></div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                        <span>(4.5)</span></div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                        <span>(5)</span></div>
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-1" name="rating">
                                                                        <div class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label" for="star-1"></label></div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-1.5" name="rating">
                                                                        <div class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label" for="star-1.5"></label></div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-2" name="rating">
                                                                        <div class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label" for="star-2"></label></div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-2.5" name="rating">
                                                                        <div class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label" for="star-2.5"></label></div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-3" name="rating">
                                                                        <div class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label" for="star-3"></label></div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-3.5" name="rating">
                                                                        <div class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label" for="star-3.5"></label></div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-4" name="rating">
                                                                        <div class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label" for="star-4"></label></div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-4.5" name="rating">
                                                                        <div class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label" for="star-4.5"></label></div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-5" name="rating">
                                                                        <div class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label" for="star-5"></label></div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="rev-f2__group">
                                                    <div class="u-s-m-b-15">

                                                        <label class="gl-label" for="reviewer-text">YOUR REVIEW *</label><textarea class="text-area text-area--primary-style" id="reviewer-text"></textarea></div>
                                                    <div>
                                                        <p class="u-s-m-b-30">

                                                            <label class="gl-label" for="reviewer-name">YOUR NAME *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="reviewer-name"></p>
                                                        <p class="u-s-m-b-30">

                                                            <label class="gl-label" for="reviewer-email">YOUR EMAIL *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="reviewer-email"></p>
                                                        <p class="u-s-m-b-30">

                                                            <label class="gl-label" for="review-title">REVIEW TITLE *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="review-title"></p>
                                                    </div>
                                                </div>
                                                <div>

                                                    <button class="btn btn--e-brand-shadow" type="submit">SUBMIT</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Tab 3 ======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Product Detail Tab ======-->
        <div class="u-s-p-b-90">
            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">RELATED PRODUCTS</h1>

                                <span class="section__span u-c-grey">PRODUCTS THAT ALSO LIKE TO BUY </span>
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
                            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
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
                                            <a href="shop-side-version-2.html"><?php echo e($product['brand']['brand_name']); ?></a></span>
                                    <span class="product-o__name">

                                            <a href="<?php echo e(url('product/'.$product['id'])); ?>"><?php echo e($product['product_name']); ?></a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                        <span class="product-o__review">(20)</span></div>

                                    <span class="product-o__price"><?php echo e(number_format($product['final_price'], 0, ',', '.')); ?>₫
                                            <?php if($product['discount_type']!=""): ?>
                                            <span class="product-o__discount"><?php echo e(number_format($product['product_price'], 0, ',', '.')); ?>₫</span></span>
                                             <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 1 ======-->

        <!--====== End - Product Detail Tab ======-->
        <div class="u-s-p-b-90">
            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">CUSTOMER ALSO VIEWED</h1>

                                <span class="section__span u-c-grey">PRODUCTS THAT CUSTOMER VIEWED</span>
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
                            <?php $__currentLoopData = $recentlyViewedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="u-s-m-b-30">
                                    <div class="product-o product-o--hover-on">
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
                                        <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                            <span class="product-o__review">(20)</span></div>

                                        <span class="product-o__price"><?php echo e(number_format($product['final_price'], 0, ',', '.')); ?>₫
                                            <?php if($product['discount_type']!=""): ?>
                                                <span class="product-o__discount"><?php echo e(number_format($product['product_price'], 0, ',', '.')); ?>₫</span></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 1 ======-->

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\dt_shop-v2\resources\views/front/products/detail.blade.php ENDPATH**/ ?>