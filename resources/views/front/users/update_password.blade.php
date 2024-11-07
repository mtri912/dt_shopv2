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
                                    <a href="{{ url('/') }}">Trang chủ</a>
                                </li>
                                <li class="is-marked">
                                    <a href="{{ url('user/update-password') }}">Đổi mật khẩu</a>
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
                                @include('front.layout.account_sidebar')
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                    <div class="dash__pad-2">
                                        <h1 class="dash__h1 u-s-m-b-14">Cập nhật mật khẩu</h1>

                                        <span class="dash__text u-s-m-b-30">Vui lòng nhập mật khẩu hiện tại của bạn để cập nhật mật khẩu của bạn.</span>
                                        <p style="font-weight: bold; margin-bottom: 10px" id="password-success"></p>
                                        <p id="password-error"><br></p>
                                        <form id="passwordForm" action="javascript:;" method="post" class="dash-address-manipulation">
                                            @csrf
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="current-password">Mật khẩu hiện tại *</label>
                                                    <input class="input-text input-text--primary-style" type="password" name="current_password" id="current-password" placeholder="Mật khẩu hiện tại">
                                                    <p id="password-current_password"></p>
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="new-password">Mật khẩu mới *</label>
                                                    <input class="input-text input-text--primary-style" type="password" name="new_password" id="new-password" placeholder="Mật khẩu mới">
                                                    <p id="password-new_password"></p>
                                                </div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="confirm-password">Xác nhận mật khẩu *</label>
                                                    <input class="input-text input-text--primary-style" type="password" name="confirm_password" id="confirm-password" placeholder="Xác nhận mật khẩu">
                                                    <p id="password-confirm_password"></p>
                                                </div>
                                                <div class="u-s-m-b-30"></div>
                                            </div>


                                            <button class="btn btn--e-brand-b-2" type="submit">LƯU</button>
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
@endsection
