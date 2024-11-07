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
                                    <a href="{{ url('user/account') }}">Tài khoản của tôi</a>
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
                                        <h1 class="dash__h1 u-s-m-b-14">Địa chỉ liên hệ</h1>

                                        <span class="dash__text u-s-m-b-30">Vui lòng thêm chi tiết Liên hệ của bạn.</span>
                                        <p style="font-weight: bold; margin-bottom: 10px" id="account-success"></p>
                                        <p id="account-error"><br></p>
                                        <form id="accountForm" action="javascript:;" method="post" class="dash-address-manipulation">
                                            @csrf
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-name">HỌ VÀ TÊN *</label>
                                                    <input class="input-text input-text--primary-style" name="name" type="text" id="billing-name" placeholder="Name" value="{{ Auth::user()->name }}">
                                                    <p id="account-name"></p>
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-address">ĐỊA CHỈ *</label>
                                                    <input class="input-text input-text--primary-style" name="address" type="text" id="billing-address" placeholder="ADDRESS" value="{{ Auth::user()->address }}">
                                                    <p id="account-address"></p>
                                                </div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">
                                                    <!--====== Select Box ======-->
                                                    <label class="gl-label" for="billing-province">TỈNH/THÀNH PHỐ  *</label>
                                                    <select class="select-box select-box--primary-style" id="provinces" name="provinces" required>
                                                        <option selected value="">Chọn Tỉnh/Thành Phố</option>
                                                        @if(isset($provinces))
                                                            @foreach($provinces as $province)
                                                                <option value="{{ $province['code'] }}" @if( $province['code']== Auth::user()->provinces) selected @endif>{{  $province['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <p id="account-province"></p>
                                                    <!--====== End - Select Box ======-->
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-district">QUẬN/HUYỆN *</label>
                                                    <select class="select-box select-box--primary-style" id="district" name="districts" required>
                                                        <option selected value="">Chọn Quận/Huyện</option>
                                                        @if(isset($user->districts))
                                                            @foreach(\App\Models\District::where('province_code', $user->provinces)->get() as $district)
                                                                <option value="{{ $district->code }}" @if($district->code == $user->districts) selected @endif>{{ $district->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <p id="account-district"></p>
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-ward">XÃ/PHƯỜNG *</label>
                                                    <select class="select-box select-box--primary-style" id="ward" name="wards" required>
                                                        <option selected value="">Chọn Xã/Phường</option>
                                                        @if(isset($user->wards))
                                                            @foreach(\App\Models\Ward::where('district_code', $user->districts)->get() as $ward)
                                                                <option value="{{ $ward->code }}" @if($ward->code == $user->wards) selected @endif>{{ $ward->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <p id="account-ward"></p>
                                                </div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-mobile">SỐ ĐIỆN THOẠI *</label>
                                                    <input class="input-text input-text--primary-style" name="mobile" type="text" id="billing-mobile" placeholder="MOBILE" value="{{ Auth::user()->mobile }}">
                                                    <p id="account-mobile"></p>
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="billing-email">EMAIL *</label>
                                                    <input class="input-text input-text--primary-style" name="email" type="text" id="billing-email" placeholder="EMAIL" value="{{ Auth::user()->email }}">
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
@endsection
