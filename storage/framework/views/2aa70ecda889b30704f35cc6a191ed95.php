

<?php $__env->startSection('content'); ?>
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-10">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">
                                    <a href="<?php echo e(url('/')); ?>">Trang chủ</a>
                                </li>
                                <li class="is-marked">
                                    <a href="<?php echo e(url('user/account')); ?>">Tài khoản của tôi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="dash">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <?php echo $__env->make('front.layout.account_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                    <div class="dash__pad-2">
                                        <h1 class="dash__h1 u-s-m-b-14">Địa chỉ liên hệ</h1>

                                        <span class="dash__text u-s-m-b-30">Vui lòng thêm chi tiết Liên hệ của bạn.</span>
                                        <p style="font-weight: bold; margin-bottom: 10px" id="account-success"></p>
                                        <p id="account-error"><br></p>
                                        <form id="accountForm" action="javascript:;" method="post" class="dash-address-manipulation">
                                            <?php echo csrf_field(); ?>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-name">HỌ VÀ TÊN *</label>
                                                    <input class="input-text input-text--primary-style" name="name" type="text" id="billing-name" placeholder="Name" value="<?php echo e(Auth::user()->name); ?>">
                                                    <p id="account-name"></p>
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-address">ĐỊA CHỈ *</label>
                                                    <input class="input-text input-text--primary-style" name="address" type="text" id="billing-address" placeholder="ADDRESS" value="<?php echo e(Auth::user()->address); ?>">
                                                    <p id="account-address"></p>
                                                </div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">
                                                    <!--====== Select Box ======-->
                                                    <label class="gl-label" for="billing-province">TỈNH/THÀNH PHỐ  *</label>
                                                    <select class="select-box select-box--primary-style" id="provinces" name="provinces" required>
                                                        <option selected value="">Chọn Tỉnh/Thành Phố</option>
                                                        <?php if(isset($provinces)): ?>
                                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($province['code']); ?>" <?php if( $province['code']== Auth::user()->provinces): ?> selected <?php endif; ?>><?php echo e($province['name']); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                    <p id="account-province"></p>
                                                    <!--====== End - Select Box ======-->
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-district">QUẬN/HUYỆN *</label>
                                                    <select class="select-box select-box--primary-style" id="district" name="districts" required>
                                                        <option selected value="">Chọn Quận/Huyện</option>
                                                        <?php if(isset($user->districts)): ?>
                                                            <?php $__currentLoopData = \App\Models\District::where('province_code', $user->provinces)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($district->code); ?>" <?php if($district->code == $user->districts): ?> selected <?php endif; ?>><?php echo e($district->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                    <p id="account-district"></p>
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-ward">XÃ/PHƯỜNG *</label>
                                                    <select class="select-box select-box--primary-style" id="ward" name="wards" required>
                                                        <option selected value="">Chọn Xã/Phường</option>
                                                        <?php if(isset($user->wards)): ?>
                                                            <?php $__currentLoopData = \App\Models\Ward::where('district_code', $user->districts)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($ward->code); ?>" <?php if($ward->code == $user->wards): ?> selected <?php endif; ?>><?php echo e($ward->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                    <p id="account-ward"></p>
                                                </div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-mobile">SỐ ĐIỆN THOẠI *</label>
                                                    <input class="input-text input-text--primary-style" name="mobile" type="text" id="billing-mobile" placeholder="MOBILE" value="<?php echo e(Auth::user()->mobile); ?>">
                                                    <p id="account-mobile"></p>
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-email">EMAIL *</label>
                                                    <input class="input-text input-text--primary-style" name="email" type="text" id="billing-email" placeholder="EMAIL" value="<?php echo e(Auth::user()->email); ?>">
                                                    <p id="account-email"></p>
                                                </div>
                                            </div>

                                            <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/users/account.blade.php ENDPATH**/ ?>