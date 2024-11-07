@extends('front.layout.layout')

@section('content')
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

                                    <a href="{{ url('/') }}">Trang chủ</a></li>
                                <li class="is-marked">

                                    <a href="{{ url('/user/login') }}">Đăng nhập</a></li>
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
            <div class="section__intro u-s-m-b-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">ĐÃ ĐĂNG KÝ?</h1>
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
                                    <h1 class="gl-h1">TÔI LÀ KHÁCH HÀNG MỚI</h1>

                                    <span class="gl-text u-s-m-b-30">Nếu bạn chưa có tài khoản với chúng tôi, vui lòng tạo một tài khoản.</span>
                                    <div class="u-s-m-b-15">

                                        <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="{{ url('user/register') }}">TẠO MỘT TÀI KHOẢN</a></div>

                                    <h1 class="gl-h1">ĐĂNG NHẬP</h1>
                                    @if(Session::has('success_message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success:</strong> {{ Session::get('success_message') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if(Session::has('error_message'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error:</strong> {{ Session::get('error_message') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <span class="gl-text u-s-m-b-30">Nếu bạn có tài khoản với chúng tôi, vui lòng đăng nhập.</span>
                                    <p id="login-error"></p>
                                    <form class="l-f-o__form" id="loginForm" action="javascript:;" method="post">
                                        @csrf
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="login-email">E-MAIL *</label>
                                            <input class="input-text input-text--primary-style" name="email" type="text" id="login-email" placeholder="Enter E-mail" value="<?php if (isset($_COOKIE['user-email'])) echo $_COOKIE['user-email']  ?>">
                                            <p class="login-email"></p>
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="login-password">MẬT KHẨU *</label>
                                            <input class="input-text input-text--primary-style" name="password" type="password" id="login-password" placeholder="Enter Password" value="<?php if (isset($_COOKIE['user-password']))  echo $_COOKIE['user-password']  ?>">
                                            <p class="login-password"></p>
                                        </div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">
                                                <button class="btn btn--e-transparent-brand-b-2" type="submit">ĐĂNG NHẬP</button></div>
                                            <div class="u-s-m-b-30">
                                                <a class="gl-link" href="{{ url('user/forgot-password') }}">Quên mật khẩu?</a></div>
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <!--====== Check Box ======-->
                                            <div class="check-box">

                                                <input type="checkbox" id="remember-me" name="remember-me" @if(isset($_COOKIE["user-email"])) checked @endif>
                                                <div class="check-box__state check-box__state--primary">

                                                    <label class="check-box__label" for="remember-me">Ghi nhớ đăng nhập</label></div>
                                            </div>
                                            <!--====== End - Check Box ======-->
                                        </div>
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
@endsection
