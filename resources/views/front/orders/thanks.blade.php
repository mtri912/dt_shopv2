@extends('front.layout.layout')

@section('content')
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">

                                    <a href="{{ url('/') }}">Trang chủ</a></li>
                                <li class="is-marked">

                                    <a href="{{ url('/thanks') }}">Cảm ơn</a></li>
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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="about">
                                <div class="about__container">
                                    <div class="about__info">
                                        <h2 class="about__h2">ĐƠN HÀNG CỦA BẠN ĐÃ ĐƯỢC ĐẶT THÀNH CÔNG!</h2>
                                        <div class="about__p-wrap">
                                            <p class="about__p">Mã đơn hàng của bạn là {{ Session::get('order_id') }} và Tổng tiền là  {{ number_format(Session::get('grand_total'), 0, ',', '.') }} VNĐ</p>
                                        </div>

                                        @if(!empty($_GET['order'])&&$_GET['order']=="check")
                                            <div class="about__p-wrap">
                                                <p class="about__p">Vui lòng gửi Séc của bạn với số tiền {{ number_format(Session::get('grand_total'), 0, ',', '.') }} VNĐ bên dưới
                                                    Địa chỉ:<br>
                                                    DTSneaker.in<br>
                                                    Da Nang,Viet Nam<br>
                                                    Kiểm tra tên: DTSneaker
                                                </p>
                                            </div>
                                        @endif

                                        @if(!empty($_GET['order'])&&$_GET['order']=="bank")
                                            <div class="about__p-wrap">
                                                <p class="about__p">Vui lòng chuyển số tiền {{ number_format(Session::get('grand_total'), 0, ',', '.') }} VNĐ vào tài khoản ngân hàng bên dưới:<br>
                                                    Tên Chủ Tài khoản: VO DINH TAN<br>
                                                    <img style="width: 227px" src="{{ asset('front/images/qrcode.jpg') }}" alt="Mã QR của Ngân hàng" />
                                                </p>
                                            </div>
                                        @endif

                                        <a class="about__link btn--e-secondary" href="{{ url('/') }}" target="_blank">Tiếp tục mua sắm</a>
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

<?php
//use Illuminate\Support\Facades\Session;
Session::forget('grand_total');
Session::forget('order_id');
Session::forget('couponCode');
Session::forget('couponAmount');
?>
