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
                                    <a href="{{ url('/checkout') }}">Thủ tục thanh toán</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->

        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="checkout-f">
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="border: 0px; float: right;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <div id="deliveryAddresses">
                                    @include('front.products.delivery_addresses')
                                </div>
{{--                                <h1 class="checkout-f__h1 deliveryText">GHI CHÚ ĐƠN HÀNG</h1>--}}
{{--                                <div class="u-s-m-b-30">--}}
{{--                                    <!--====== NAME ======-->--}}
{{--                                    <div class="u-s-m-b-15">--}}
{{--                                        <input class="input-text input-text--primary-style" type="text" id="order_notes" name="order_notes" placeholder="Ghi chú">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <h1 class="checkout-f__h1 deliveryText">THÊM ĐỊA CHỈ GIAO HÀNG MỚI</h1>
                                <form class="checkout-f__delivery" id="deliveryAddressForm" action="javascript:;" method="post">
                                    @csrf
                                    <input type="hidden" name="delivery_id">
                                    <div class="u-s-m-b-30">
                                        <!--====== NAME ======-->
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="shipping-name">HỌ VÀ TÊN *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="delivery_name" name="delivery_name">
                                            <p id="delivery-delivery_name"></p>
                                        </div>
                                        <!--====== End - NAME ======-->

                                        <!--====== ADDRESS ======-->
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="shipping-address">ĐỊA CHỈ *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="delivery_address" name="delivery_address">
                                            <p id="delivery-delivery_address"></p>
                                        </div>
                                        <!--====== End - ADDRESS ======-->
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="billing-country">TỈNH/THÀNH PHỐ *</label>
                                            <select class="select-box select-box--primary-style" id="provinces" name="provinces">
                                                <option selected value="">Chọn Tỉnh/Thành phố</option>
                                                @if(isset($provinces))
                                                    @foreach($provinces as $province)
                                                        <option value="{{ $province['code'] }}">{{ $province['name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <p id="delivery-provinces"></p>

                                        </div>
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="billing-country">QUẬN/HUYỆN *</label>
                                            <select class="select-box select-box--primary-style" id="district" name="districts">
                                                <option selected value="">Chọn Quận/Huyện</option>
                                                @if(isset($user->districts))
                                                    @foreach(\App\Models\District::where('province_code', $user->provinces)->get() as $district)
                                                        <option value="{{ $district->code }}" >{{ $district->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <p id="delivery-districts"></p>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="billing-country">XÃ/PHƯỜNG *</label>
                                            <select class="select-box select-box--primary-style" id="ward" name="wards">
                                                <option selected value="">Chọn Xã/Phường</option>
                                                @if(isset($user->wards))
                                                    @foreach(\App\Models\Ward::where('district_code', $user->districts)->get() as $ward)
                                                        <option value="{{ $ward->code }}" >{{ $ward->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <p id="delivery-wards"></p>
                                        </div>


                                        <!--====== MOBILE ======-->
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="shipping-mobile">SỐ ĐIỆN THOẠI *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="delivery_mobile" name="delivery_mobile">
                                            <p id="delivery-delivery_mobile"></p>
                                        </div>
                                        <!--====== End - MOBILE ======-->
                                        <div>
                                            <button id="deliveryForm" class="btn btn--e-transparent-brand-b-2" type="submit">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <h1 class="checkout-f__h1">TÓM TẮT ĐƠN HÀNG</h1>
                                <!--====== Order Summary ======-->
                                <div class="o-summary">
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__item-wrap gl-scroll">
                                            @php $total_price = 0; @endphp
                                            @foreach($getCartItems as $item)
                                                @php
                                                    $getAttributePrice = \App\Models\Product::getAttributePrice($item['product_id'],$item['product_size']);
                                                    $item_total = $getAttributePrice['final_price'] * $item['product_qty'];
                                                    $total_price += $item_total;
                                                @endphp
                                                <div class="o-card">
                                                    <div class="o-card__flex">
                                                        <div class="o-card__img-wrap">
                                                            @if(isset($item['product']['images'][0]['image']) && !empty($item['product']['images'][0]['image']))
                                                                <a href="{{ url('product/'.$item['product']['id']) }}"><img class="u-img-fluid" src="{{ asset('front/images/products/small/'.$item['product']['images'][0]['image']) }}" alt=""></a>
                                                            @else
                                                                <a href="{{ url('product/'.$item['product']['id']) }}"><img class="u-img-fluid" src="{{ asset('front/images/product/no-img.jpg') }}" alt=""></a>
                                                            @endif
                                                        </div>
                                                        <div class="o-card__info-wrap">
                                                            <span class="o-card__name">
                                                                <a href="{{ url('product/'.$item['product']['id']) }}">{{ $item['product']['product_name'] }}</a>
                                                            </span>
                                                            <span class="o-card__quantity">Size: {{ $item['product_size'] }}</span>
                                                            <span class="o-card__quantity">Số lượng x {{ $item['product_qty'] }}</span>

                                                            <span class="o-card__price">₫{{number_format($getAttributePrice['final_price'] *  $item['product_qty'], 0, ',', '.')}}</span></div>
                                                    </div>

                                                    <a class="o-card__del far fa-trash-alt deleteCartItem" data-cartid="{{ $item['id'] }}" data-page="Checkout"></a>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <h1 class="checkout-f__h1">ĐỊA CHỈ THANH TOÁN</h1>
                                            <div class="ship-b">

                                                <span class="ship-b__text">Bill to:</span>
                                                <div class="ship-b__box u-s-m-b-10">
                                                    <p class="ship-b__p">
                                                        {{ Auth::user()->name }},
                                                        @if(!empty(Auth::user()->address))
                                                            {{ Auth::user()->address }},
                                                        @endif
                                                        @if(!empty(Auth::user()->ward))
                                                            {{ Auth::user()->ward->full_name }},
                                                        @endif
                                                        @if(!empty(Auth::user()->district))
                                                            {{ Auth::user()->district->full_name }},
                                                        @endif
                                                        @if(!empty(Auth::user()->province))
                                                            {{ Auth::user()->province->full_name }},
                                                        @endif
                                                        @if(!empty(Auth::user()->mobile))
                                                            {{ Auth::user()->mobile }}
                                                        @endif
                                                    </p>

                                                    <a class="ship-b__edit btn--e-transparent-platinum-b-2" href="{{ url('user/account') }}" data-modal="modal" data-modal-id="#edit-ship-address">Edit</a>
                                                </div>
{{--                                                @php $total_price = $total_price + ($getAttributePrice['final_price'] * $item['product_qty']) @endphp--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <table class="o-summary__table">
                                                <tbody>
                                                <tr>
                                                    <td>SUBTOTAL</td>
                                                    <td>₫{{number_format($total_price, 0, ',', '.')}}</td>
                                                </tr>
                                                <tr>
                                                    <td>SHIPPING (+)</td>
                                                    <td>₫0</td>
                                                </tr>
                                                <tr>
                                                    <td>TAX (+)</td>
                                                    <td>₫0</td>
                                                </tr>
                                                <tr>
                                                    <td>DISCOUNT (-)</td>
                                                    <td>
                                                        @if(Session::has('couponAmount'))
                                                            ₫{{ number_format(Session::get('couponAmount'), 0, ',', '.') }}
                                                        @else
                                                            ₫0
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>GRAND TOTAL</td>
                                                    <td>
                                                        @php
                                                            $couponAmount = \Illuminate\Support\Facades\Session::get('couponAmount', 0);
                                                            $grand_total = $total_price - $couponAmount;
                                                        @endphp
                                                        ₫{{number_format($grand_total, 0, ',', '.')}}
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <form class="checkout-f__payment" name="checkoutForm" action="{{ url('checkout') }}" method="post">
                                        @csrf
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <h1 class="checkout-f__h1">GHI CHÚ ĐƠN HÀNG</h1>
                                            <div class="u-s-m-b-10">
                                                <input class="input-text input-text--primary-style" type="text" id="order_notes" name="order_notes" placeholder="Ghi chú">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <h1 class="checkout-f__h1">PHƯƠNG THỨC THANH TOÁN</h1>
{{--                                            <form class="checkout-f__payment" name="checkoutForm" action="{{ url('checkout') }}" method="post">--}}
{{--                                                @csrf--}}
                                                <div class="u-s-m-b-10">
                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">
                                                        <input type="radio" id="cash-on-delivery" name="payment_gateway" value="COD">
                                                        <div class="radio-box__state radio-box__state--primary">
                                                            <label class="radio-box__label" for="cash-on-delivery">Thanh toán khi giao hàng</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Thanh toán bằng tiền mặt khi giao hàng.</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="direct-bank-transfer" name="payment_gateway" value="Bank Transfer">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="direct-bank-transfer">Chuyển khoản trực tiếp</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã Đơn Hàng của bạn làm tham chiếu thanh toán. Đơn hàng của bạn sẽ không được gửi đi cho đến khi chúng tôi nhận được tiền.</span>
                                                </div>
                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="pay-with-check" name="payment_gateway" value="Check">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="pay-with-check">Thanh toán bằng séc</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Vui lòng gửi séc đến Tên cửa hàng, Đường cửa hàng, Thị trấn cửa hàng, Tiểu bang / Quận cửa hàng, Mã bưu điện của cửa hàng.</span>
                                                </div>

                                                <div class="u-s-m-b-10">

                                                    <!--====== Radio Box ======-->
                                                    <div class="radio-box">

                                                        <input type="radio" id="pay-pal" name="payment_gateway" value="Paypal">
                                                        <div class="radio-box__state radio-box__state--primary">

                                                            <label class="radio-box__label" for="pay-pal">PayPal (Thanh toán bằng thẻ tín dụng / thẻ ghi nợ / ví Paypal)</label></div>
                                                    </div>
                                                    <!--====== End - Radio Box ======-->

                                                    <span class="gl-text u-s-m-t-6">Khi bạn nhấp vào "Đặt hàng" bên dưới, chúng tôi sẽ đưa bạn đến trang web của Paypal để thực hiện Thanh toán bằng Thẻ Tín dụng / Thẻ ghi nợ hoặc Tín dụng Paypal của bạn.</span>
                                                </div>
                                                <div class="u-s-m-b-15">

                                                    <!--====== Check Box ======-->
                                                    <div class="check-box">

                                                        <input type="checkbox" id="term-and-condition" name="agree" value="Yes">
                                                        <div class="check-box__state check-box__state--primary">

                                                            <label class="check-box__label" for="term-and-condition">Tôi đồng ý với</label></div>
                                                    </div>
                                                    <!--====== End - Check Box ======-->

                                                    <a class="gl-link">Điều khoản dịch vụ.</a>
                                                </div>
                                                <div>
                                                    <button class="btn btn--e-brand-b-2" type="submit">ĐẶT HÀNG</button>
                                                </div>
{{--                                            </form>--}}
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!--====== End - Order Summary ======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->
    </div>
@endsection
