<!--====== Dashboard Features ======-->
<div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
    <div class="dash__pad-1">

        <span class="dash__text u-s-m-b-16">Xin chào, {{ Auth::user()->name }}</span>
        <ul class="dash__f-list">
            <li><a href="{{ url('user/account') }}">Địa chỉ liên hệ</a></li>
            <li><a href="{{ url('user/orders') }}">Đơn hàng</a></li>
{{--            <li><a href="wishlist.html">My Wish List</a></li>--}}
            <li><a href="{{ url('user/update-password') }}">Đổi Mật Khẩu</a></li>
        </ul>
    </div>
</div>

<!--====== End - Dashboard Features ======-->
