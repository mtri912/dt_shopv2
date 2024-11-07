

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

                                    <a href="<?php echo e(url('/')); ?>">Trang chủ</a></li>
                                <li class="is-marked">

                                    <a href="<?php echo e(url('/user/register')); ?>">Đăng kí</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">TẠO MỘT TÀI KHOẢN MỚI</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row row--center">
                        <div class="col-lg-6 col-md-8 u-s-m-b-30">
                            <div class="l-f-o">
                                <div class="l-f-o__pad-box">
                                    <h1 class="gl-h1">THÔNG TIN CÁ NHÂN</h1>
                                    <p id="register-success"></p>
                                    <form id="registerForm" action="javascript:;" method="post" class="l-f-o__form">
                                        <?php echo csrf_field(); ?>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-fname">HỌ VÀ TÊN *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="reg-name" name="name" placeholder="Name">
                                            <p id="register-name"></p>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-mobile">SỐ ĐIỆN THOẠI *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="reg-mobile" name="mobile" placeholder="MOBILE">
                                            <p id="register-mobile"></p>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-email">E-MAIL *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="reg-email" name="email" placeholder="Enter E-mail">
                                            <p id="register-email"></p>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="reg-password">MẬT KHẨU *</label>
                                            <input class="input-text input-text--primary-style" type="password" id="reg-password" name="password" placeholder="Enter Password">
                                            <p id="register-password"></p>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">ĐĂNG KÝ</button>
                                        </div>
                                        <a class="gl-link" href="<?php echo e(url('user/login')); ?>">Bạn đã có sẵn tài khoản? Đăng nhập ngay</a>
                                    </form>
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

<?php echo $__env->make('front.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/users/register.blade.php ENDPATH**/ ?>