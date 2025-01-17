<?php
use App\Models\Category;


// Get Categories and their Sub Categories
$categories = Category::getcategories();
//echo "<pre>"; print_r($categories); die;
$totalCartItems = totalCartItems();
?>
<header class="header--style-1">
    <!--====== Nav 1 ======-->
    <nav class="primary-nav primary-nav-wrapper--border">
        <div class="container">
            <!--====== Primary Nav ======-->
            <div class="primary-nav">
                <!--====== Main Logo ======-->
                <a class="main-logo" href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(asset('front/images/logo/logo_dt.png')); ?>" alt=""></a>
                <!--====== End - Main Logo ======-->
                <!--====== Search Form ======-->
                <form class="main-form" action="<?php echo e(url('search-products')); ?>" method="get">
                    <label for="main-search"></label>
                    <input class="input-text input-text--border-radius input-text--style-1" type="text" id="main-search" name="query" placeholder="Search" required>
                    <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
                </form>
                <!--====== End - Search Form ======-->
                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation">
                    <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs" type="button"></button>
                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">
                        <span class="ah-close">✕ Đóng</span>
                        <!--====== List ======-->
                        <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">















                            <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Tài khoản">
                                <a><i class="far fa-user-circle"></i></a>
                                <!--====== Dropdown ======-->
                                <span class="js-menu-toggle"></span>
                                <ul style="width:120px">
                                    <?php if(Auth::check()): ?>
                                    <li>
                                        <a href="<?php echo e(url('user/account')); ?>"><i class="fas fa-user-circle u-s-m-r-6"></i>
                                            <span>Tài khoản</span></a>
                                    </li>
                                        <li>
                                            <a href="<?php echo e(url('user/logout')); ?>"><i class="fas fa-lock-open u-s-m-r-6"></i>
                                                <span>Đăng xuất</span></a>
                                        </li>
                                    <?php else: ?>
                                    <li>
                                        <a href="<?php echo e(url('/user/register')); ?>"><i class="fas fa-user-plus u-s-m-r-6"></i>
                                            <span>Đăng kí</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('/user/login')); ?>"><i class="fas fa-lock u-s-m-r-6"></i>
                                            <span>Đăng nhập</span></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                                <!--====== End - Dropdown ======-->
                            </li>
                            <li data-tooltip="tooltip" data-placement="left" title="Liên hệ">
                                <a href="tel:+0359828202"><i class="fas fa-phone-volume"></i></a>
                            </li>
                            <li data-tooltip="tooltip" data-placement="left" title="Mail">
                                <a href="mailto:contact@domain.com"><i class="far fa-envelope"></i></a>
                            </li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->
            </div>
            <!--====== End - Primary Nav ======-->
        </div>
    </nav>
    <!--====== End - Nav 1 ======-->
    <!--====== Nav 2 ======-->
    <nav class="secondary-nav-wrapper">
        <div class="container">
            <!--====== Secondary Nav ======-->
            <div class="secondary-nav">
                <!--====== Dropdown Main plugin ======-->
                <?php /* <div class="menu-init" id="navigation1">
                    <!-- <button class="btn btn--icon toggle-mega-text toggle-button" type="button">M</button> -->
                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">
                        <span class="ah-close">✕ Close</span>
                        <!--====== List ======-->
                        <ul class="ah-list">
                            <li class="has-dropdown">
                                <!-- <span class="mega-text">M</span> -->
                                <!--====== Mega Menu ======-->
                                <span class="js-menu-toggle"></span>
                                <div class="mega-menu">
                                    <div class="mega-menu-wrap">
                                        <div class="mega-menu-list">
                                            <ul>
                                                <li class="js-active">
                                                    <a href="shop-side-version-2.html"><i class="fas fa-tv u-s-m-r-6"></i>
                                                        <span>Electronics</span></a>
                                                    <span class="js-menu-toggle js-toggle-mark"></span>
                                                </li>
                                                <li>
                                                    <a href="shop-side-version-2.html"><i class="fas fa-female u-s-m-r-6"></i>
                                                        <span>Women's Clothing</span></a>
                                                    <span class="js-menu-toggle"></span>
                                                </li>
                                                <li>
                                                    <a href="shop-side-version-2.html"><i class="fas fa-male u-s-m-r-6"></i>
                                                        <span>Men's Clothing</span></a>
                                                    <span class="js-menu-toggle"></span>
                                                </li>
                                                <li>
                                                    <a href="index.html"><i class="fas fa-utensils u-s-m-r-6"></i>
                                                        <span>Food & Supplies</span></a>
                                                    <span class="js-menu-toggle"></span>
                                                </li>
                                                <li>
                                                    <a href="index.html"><i class="fas fa-couch u-s-m-r-6"></i>
                                                        <span>Furniture & Decor</span></a>
                                                    <span class="js-menu-toggle"></span>
                                                </li>
                                                <li>
                                                    <a href="index.html"><i class="fas fa-football-ball u-s-m-r-6"></i>
                                                        <span>Sports & Game</span></a>
                                                    <span class="js-menu-toggle"></span>
                                                </li>
                                                <li>
                                                    <a href="index.html"><i class="fas fa-heartbeat u-s-m-r-6"></i>
                                                        <span>Beauty & Health</span></a>
                                                    <span class="js-menu-toggle"></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--====== Electronics ======-->
                                        <div class="mega-menu-content js-active">
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">3D PRINTER & SUPPLIES</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">3d Printer</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">3d Printing Pen</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">3d Printing Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">3d Printer Module Board</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">HOME AUDIO & VIDEO</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">TV Boxes</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">TC Receiver & Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Display Dongle</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Home Theater System</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">MEDIA PLAYERS</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Earphones</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Mp3 Players</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Speakers & Radios</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Microphones</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">VIDEO GAME ACCESSORIES</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Nintendo Video Games Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Sony Video Games Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Xbox Video Games Accessories</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">SECURITY & PROTECTION</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Security Cameras</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Alarm System</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Security Gadgets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">CCTV Security & Accessories</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">PHOTOGRAPHY & CAMERA</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Digital Cameras</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Sport Camera & Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Camera Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Lenses & Accessories</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">ARDUINO COMPATIBLE</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Raspberry Pi & Orange Pi</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Module Board</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Smart Robot</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Board Kits</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">DSLR Camera</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Nikon Cameras</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Canon Camera</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Sony Camera</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">DSLR Lenses</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">NECESSARY ACCESSORIES</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Flash Cards</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Memory Cards</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Flash Pins</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Compact Discs</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-9 mega-image">
                                                    <div class="mega-banner">
                                                        <a class="u-d-block" href="shop-side-version-2.html">
                                                            <img class="u-img-fluid u-d-block" src="{{ asset('front/images/banners/sitemaker-slider-banner-1.png') }}" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                        </div>
                                        <!--====== End - Electronics ======-->
                                        <!--====== Women ======-->
                                        <div class="mega-menu-content">
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-6 mega-image">
                                                    <div class="mega-banner">
                                                        <a class="u-d-block" href="shop-side-version-2.html">
                                                            <img class="u-img-fluid u-d-block" src="{{ asset('front/images/banners/sitemaker-slider-banner-1.png') }}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mega-image">
                                                    <div class="mega-banner">
                                                        <a class="u-d-block" href="shop-side-version-2.html">
                                                            <img class="u-img-fluid u-d-block" src="{{ asset('front/images/banners/sitemaker-slider-banner-1.png') }}" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">HOT CATEGORIES</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Dresses</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Blouses & Shirts</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">T-shirts</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Rompers</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">INTIMATES</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Bras</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Brief Sets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Bustiers & Corsets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Panties</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">WEDDING & EVENTS</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Wedding Dresses</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Evening Dresses</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Prom Dresses</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Flower Dresses</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">BOTTOMS</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Skirts</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Shorts</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Leggings</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Jeans</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">OUTWEAR</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Blazers</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Basics Jackets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Trench</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Leather & Suede</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">JACKETS</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Denim Jackets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Trucker Jackets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Windbreaker Jackets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Leather Jackets</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">ACCESSORIES</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Tech Accessories</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Headwear</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Baseball Caps</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Belts</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">OTHER ACCESSORIES</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Bags</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Wallets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Watches</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Sunglasses</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-9 mega-image">
                                                    <div class="mega-banner">
                                                        <a class="u-d-block" href="shop-side-version-2.html">
                                                            <img class="u-img-fluid u-d-block" src="{{ asset('front/images/banners/sitemaker-slider-banner-1.png') }}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mega-image">
                                                    <div class="mega-banner">
                                                        <a class="u-d-block" href="shop-side-version-2.html">
                                                            <img class="u-img-fluid u-d-block" src="{{ asset('front/images/banners/sitemaker-slider-banner-1.png') }}" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                        </div>
                                        <!--====== End - Women ======-->
                                        <!--====== Men ======-->
                                        <div class="mega-menu-content">
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-4 mega-image">
                                                    <div class="mega-banner">
                                                        <a class="u-d-block" href="shop-side-version-2.html">
                                                            <img class="u-img-fluid u-d-block" src="{{ asset('front/images/banners/sitemaker-slider-banner-1.png') }}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mega-image">
                                                    <div class="mega-banner">
                                                        <a class="u-d-block" href="shop-side-version-2.html">
                                                            <img class="u-img-fluid u-d-block" src="{{ asset('front/images/banners/sitemaker-slider-banner-1.png') }}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mega-image">
                                                    <div class="mega-banner">
                                                        <a class="u-d-block" href="shop-side-version-2.html">
                                                            <img class="u-img-fluid u-d-block" src="{{ asset('front/images/banners/sitemaker-slider-banner-1.png') }}" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">HOT SALE</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">T-Shirts</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Tank Tops</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Polo</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Shirts</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">OUTWEAR</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Hoodies</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Trench</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Parkas</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Sweaters</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">BOTTOMS</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Casual Pants</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Cargo Pants</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Jeans</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Shorts</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">UNDERWEAR</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Boxers</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Briefs</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Robes</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Socks</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">JACKETS</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Denim Jackets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Trucker Jackets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Windbreaker Jackets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Leather Jackets</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">SUNGLASSES</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Pilot</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Wayfarer</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Square</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Round</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">ACCESSORIES</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Eyewear Frames</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Scarves</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Hats</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Belts</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                            <a href="shop-side-version-2.html">OTHER ACCESSORIES</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Bags</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Wallets</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Watches</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-side-version-2.html">Tech Accessories</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-6 mega-image">
                                                    <div class="mega-banner">
                                                        <a class="u-d-block" href="shop-side-version-2.html">
                                                            <img class="u-img-fluid u-d-block" src="{{ asset('front/images/banners/sitemaker-slider-banner-1.png') }}" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mega-image">
                                                    <div class="mega-banner">
                                                        <a class="u-d-block" href="shop-side-version-2.html">
                                                            <img class="u-img-fluid u-d-block" src="{{ asset('front/images/banners/sitemaker-slider-banner-1.png') }}" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                        </div>
                                        <!--====== End - Men ======-->
                                        <!--====== No Sub Categories ======-->
                                        <div class="mega-menu-content">
                                            <h5>No Categories</h5>
                                        </div>
                                        <!--====== End - No Sub Categories ======-->
                                        <!--====== No Sub Categories ======-->
                                        <div class="mega-menu-content">
                                            <h5>No Categories</h5>
                                        </div>
                                        <!--====== End - No Sub Categories ======-->
                                        <!--====== No Sub Categories ======-->
                                        <div class="mega-menu-content">
                                            <h5>No Categories</h5>
                                        </div>
                                        <!--====== End - No Sub Categories ======-->
                                        <!--====== No Sub Categories ======-->
                                        <div class="mega-menu-content">
                                            <h5>No Categories</h5>
                                        </div>
                                        <!--====== End - No Sub Categories ======-->
                                    </div>
                                </div>
                                <!--====== End - Mega Menu ======-->
                            </li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div> */ ?>
                <!--====== End - Dropdown Main plugin ======-->
                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation2">
                    <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cog" type="button"></button>
                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">
                        <span class="ah-close">✕ Đóng</span>
                        <!--====== List ======-->
                        <ul class="ah-list ah-list--design2 ah-list--link-color-secondary">



                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="has-dropdown">
                                    <a href="#"><?php echo e($category['category_name']); ?><i <?php if(count($category['subcategories'])): ?> class="fas fa-angle-down u-s-m-l-6" <?php endif; ?>></i></a>
                                    <?php if(count($category['subcategories'])): ?>
                                    <!--====== Dropdown ======-->
                                    <span class="js-menu-toggle"></span>
                                    <ul style="width:170px">
                                        <?php $__currentLoopData = $category['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="has-dropdown has-dropdown--ul-left-100">
                                            <a href="<?php echo e(url($subcategory['url'])); ?>"><?php echo e($subcategory['category_name']); ?><?php if(count($subcategory['subcategories'])): ?><i  class="fas fa-angle-down i-state-right u-s-m-l-6" ></i><?php endif; ?></a>
                                            <?php if(count($subcategory['subcategories'])): ?>
                                            <!--====== Dropdown ======-->
                                            <span class="js-menu-toggle"></span>
                                            <ul style="width:118px">
                                                <?php $__currentLoopData = $subcategory['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(url($subsubcategory['url'])); ?>"><?php echo e($subsubcategory['category_name']); ?></a>
                                                </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <!--====== End - Dropdown ======-->
                                            <?php endif; ?>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <!--====== End - Dropdown ======-->
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->
                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation3">
                    <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-shopping-bag toggle-button-shop" type="button"></button>
                    <span class="total-item-round totalCartItems"><?php echo e($totalCartItems); ?></span>
                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">
                        <span class="ah-close">✕ Đóng</span>
                        <!--====== List ======-->
                        <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                            <li>
                                <a href="<?php echo e(url('/')); ?>"><i class="fas fa-home u-c-brand"></i></a>
                            </li>



                            <li class="has-dropdown">
                                <a class="mini-cart-shop-link" href="<?php echo e(url('/cart')); ?>" ><i class="fas fa-shopping-bag"></i>
                                    <span class="total-item-round totalCartItems"><?php echo e($totalCartItems); ?></span></a>
                                <!--====== Dropdown ======-->
                                <span class="js-menu-toggle"></span>
                                <div class="mini-cart" id="appendMiniCartItems">
                                    <?php echo $__env->make('front.layout.header_cart_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <!--====== End - Dropdown ======-->
                            </li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->
            </div>
            <!--====== End - Secondary Nav ======-->
        </div>
    </nav>
    <!--====== End - Nav 2 ======-->
</header>
<?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/front/layout/header.blade.php ENDPATH**/ ?>