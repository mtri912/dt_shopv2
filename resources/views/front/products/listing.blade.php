@extends('front.layout.layout')
@section('content')
    <style>
        .pagination nav li{
           list-style-type: none;
            float: left;
            width: 20px;
        }
    </style>
{{--    <div class="app-content">--}}
{{--        <!--====== Section 1 ======-->--}}
{{--        <div class="u-s-p-y-10">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-3 col-md-12">--}}
{{--                        @if(empty($_GET['query']))--}}
{{--                            @include('front.products.filters')--}}
{{--                        @else--}}
{{--                            @include('front.products.filters_search')--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-9 col-md-12">--}}
{{--                        <div class="shop-p">--}}
{{--                            <div class="shop-p__toolbar u-s-m-b-30">--}}
{{--                                <div class="shop-p__meta-wrap u-s-m-b-60">--}}

{{--                                    <span class="shop-p__meta-text-1">TÌM THẤY {{count($categoryProducts)}} KẾT QUẢ</span>--}}
{{--                                    <div class="shop-p__meta-text-2">--}}

{{--                                        <a class="gl-tag btn--e-brand-shadow" href="#">T-Shirts</a>--}}
{{--                                        @if(isset($_GET['query'])&&!empty($_GET['query']))--}}
{{--                                            {{ $_GET['query'] }}--}}
{{--                                        @else--}}
{{--                                                <?php echo $categoryDetails['breadcrumbs']; ?>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @if(empty($_GET['query']))--}}
{{--                                <div class="shop-p__tool-style">--}}
{{--                                    <div class="tool-style__group u-s-m-b-8">--}}

{{--                                        <span class="js-shop-grid-target is-active">Grid</span>--}}

{{--                                        <span class="js-shop-list-target">List</span></div>--}}
{{--                                    <form name="sortProducts" id="sortProducts">--}}

{{--                                        <input type="hidden" name="url" id="url" value="{{ $url }}">--}}
{{--                                        <div class="tool-style__form-wrap">--}}

{{--                                            <div class="u-s-m-b-8">--}}
{{--                                                <select class="select-box select-box--transparent-b-2 getsort" name="sort" id="sort">--}}
{{--                                                    <option selected>Sắp xếp theo: Sản phẩm mới nhất</option>--}}
{{--                                                    <option value="product_latest">Sắp xếp theo: Mục mới nhất</option>--}}
{{--                                                    <option value="best_selling">Sắp xếp theo: Bán chạy nhất</option>--}}
{{--                                                    <option value="best_rating">Sort By: Best Rating</option>--}}
{{--                                                    <option value="lowest_price">Sắp xếp theo: Giá thấp nhất</option>--}}
{{--                                                    <option value="highest_price">Sắp xếp theo: Giá cao nhất</option>--}}
{{--                                                    <option value="featured_items">Sắp xếp theo: Mục nổi bật</option>--}}
{{--                                                    <option value="discounted_items">Sắp xếp theo: Mặt hàng giảm giá</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="shop-p__collection">--}}
{{--                                <div class="row is-grid-active" id="appendProducts">--}}
{{--                                    @include('front.products.ajax_products_listing')--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--====== End - Section 1 ======-->--}}
{{--    </div>--}}
    <div class="app-content">
        <!--====== Section 1 ======-->
        <div class="u-s-p-y-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        @if(empty($_GET['query']))
                            @include('front.products.filters')
                        @else
                            @include('front.products.filters_search')
                        @endif
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="shop-p">
                            <div class="shop-p__toolbar u-s-m-b-30">
                                <div class="shop-p__meta-wrap u-s-m-b-60">
                                    <span class="shop-p__meta-text-1">TÌM THẤY {{count($categoryProducts)}} KẾT QUẢ</span>
                                    <div class="shop-p__meta-text-2">
                                        @if(isset($_GET['query'])&&!empty($_GET['query']))
                                            {{ $_GET['query'] }}
                                        @else
                                                <?php echo $categoryDetails['breadcrumbs']; ?>
                                        @endif
                                    </div>
                                </div>
                                @if(empty($_GET['query']))
                                    <div class="shop-p__tool-style">
                                        <div class="tool-style__group u-s-m-b-8">
{{--                                            <span class="js-shop-grid-target is-active">Grid</span>--}}
{{--                                            <span class="js-shop-list-target">List</span>--}}
                                        </div>
                                        <form name="sortProducts" id="sortProducts">
                                            <input type="hidden" name="url" id="url" value="{{ $url }}">
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
                                @endif
                            </div>
                            <div class="shop-p__collection">
                                <div class="row is-grid-active" id="appendProducts">
                                    @include('front.products.ajax_products_listing')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->
    </div>

@endsection
