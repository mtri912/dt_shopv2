@if(count($deliveryAddresses) > 0)
    <h1 class="checkout-f__h1">ĐỊA CHỈ GIAO HÀNG</h1>
    <div class="o-summary__section u-s-m-b-30">
        <div class="o-summary__box">
            <div class="ship-b">
                <span class="ship-b__text">Giao hàng đến:</span>
                @foreach($deliveryAddresses as $address)
                    <div class="ship-b__box u-s-m-b-10">
                        <input class="setDefaultAddress" data-addressid="{{ $address['id'] }}" href="javascript:;" type="radio" id="address{{ $address['id'] }}" name="address_id" value="{{ $address['id'] }}" @if($address['is_default']==1) checked="" @endif>
                        <p class="ship-b__p">{{ $address['name'] }}, {{ $address['address'] }}, {{ $address['ward']['full_name'] }}, {{ $address['district']['full_name'] }}, {{ $address['province']['full_name'] }}</p>

                        <a class="ship-b__edit btn--e-transparent-platinum-b-2 editAddress" data-modal="modal" data-modal-id="#edit-ship-address" data-addressid="{{ $address['id'] }}" href="javascript:;">Sửa</a>
                        <a class="ship-b__edit btn--e-transparent-platinum-b-2 deleteAddress" data-modal="modal" data-modal-id="#edit-ship-address" data-addressid="{{ $address['id'] }}" href="javascript:;">Xóa</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
