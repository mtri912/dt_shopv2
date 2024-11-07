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

                                    <a href="{{ url('/about') }}">About</a></li>
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
                                        <h2 class="about__h2">Chào mừng đến với DTSneaker!</h2>
                                        <div class="about__p-wrap">
                                            <p class="about__p">DTSneaker là thiên đường của những người yêu thích giày sneaker. Chúng tôi tự hào cung cấp các sản phẩm giày sneaker chất lượng cao, mang đến cho bạn sự kết hợp hoàn hảo giữa phong cách và thoải mái. Tại DTSneaker, bạn sẽ tìm thấy những mẫu giày mới nhất từ các thương hiệu nổi tiếng như Nike, Adidas, Puma và nhiều thương hiệu khác.</p>
                                        </div>

                                        <a class="about__link btn--e-secondary" href="{{ url('/') }}" target="_blank">Shop Now</a>
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
