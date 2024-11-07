<?php

use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\LangController;
use App\Http\Controllers\Front\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('App\Http\Controllers\Front')->group(function () {
    Route::get('/',[IndexController::class,'index']);

    // About Route
    Route::get('/about','IndexController@about');

    // About Route
    Route::get('/contact','IndexController@contact');

    // Listing/Categories Routes
    $catUrls = Category::select('url')->where('status',1)->get()->pluck('url');
//    dd($catUrls);
    foreach ($catUrls as $key => $url) {
        Route::get($url,'ProductController@listing');
    }

    // Product Detail Page
    Route::get('product/{id}','ProductController@detail');

    // Get Product Attribute Price
    Route::post('get-attribute-price','ProductController@getAttributePrice');

    // Add to Cart
    Route::post('/add-to-cart','ProductController@addToCart');

    // Cart Route
    Route::get('/cart','ProductController@cart');

    // Update Cart Item Quantity
    Route::post('update-cart-item-qty','ProductController@updateCartItemQty');

    // Delete Cart Item
    Route::post('delete-cart-item','ProductController@deleteCartItem');

    // Empty Cart
    Route::post('empty-cart','ProductController@emptyCart');

    // User Login
    Route::match(['get','post'],'/user/login','UserController@loginUser')->name('login');

    // User Register
    Route::match(['get','post'],'/user/register','UserController@registerUser');

    // User Confirm Account
    Route::match(['get','post'],'user/confirm/{code}','UserController@confirmAccount');

    // User Login
    Route::post('user/login','UserController@loginUser');

    // Forgot Password
    Route::match(['get','post'],'user/forgot-password','UserController@forgotPassword');

    // Reset Password
    Route::match(['get','post'],'user/reset-password/{code?}','UserController@resetPassword');

    // Search Products
    Route::get('/search-products','ProductController@listing');

    Route::group(['middleware'=>['auth']],function (){

        // User Account
        Route::match(['get','post'],'user/account','UserController@account');

        // User get district and ward
        Route::get('/get-districts','UserController@getDistricts');
        Route::get('/get-wards','UserController@getWards');

        // User Update Password
        Route::match(['get','post'],'user/update-password','UserController@updatePassword');

        // User Logout
        Route::match(['get','post'],'user/logout','UserController@logoutUser');

        // Apply Coupon
        Route::post('/apply-coupon','ProductController@applyCoupon');

        // Checkout
        Route::match(['get','post'],'/checkout','ProductController@checkout');

        // Save Delivery Address
        Route::post('save-delivery-address','AddressController@saveDeliveryAddress');

        // Get Delivery Address
        Route::post('get-delivery-address','AddressController@getDeliveryAddress');

        // Remove Delivery Address
        Route::post('remove-delivery-address','AddressController@removeDeliveryAddress');

        // Set Default Delivery Address
        Route::post('set-default-delivery-address','AddressController@setDefaultDeliveryAddress');

        // Order Thanks Page
        Route::get('/thanks','ProductController@thanks');

        // Users Orders
        Route::get('/user/orders','OrderController@orders');

        // User Order Details
        Route::get('/user/orders/{id}','OrderController@orderDetails');

        // Paypal
        Route::get('/paypal','PaypalController@paypal');
        Route::post('pay','PaypalController@pay')->name('payment');
        Route::get('success','PaypalController@success');
        Route::get('error','PaypalController@error');
    });



});

Route::get('download-order-pdf-invoice/{id}','App\Http\Controllers\Admin\OrderController@printPDFOrderInvoice');

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::match(['get','post'], 'login', 'AdminController@login');


    Route::group(['middleware'=>['admin']],function (){
        Route::get('dashboard', 'AdminController@dashboard');
        Route::match(['get','post'],'update-password', 'AdminController@updatePassword');
        Route::match(['get','post'],'update-details', 'AdminController@updateDetails');
        Route::post('check-current-password', 'AdminController@checkCurrentPassword');
        Route::get('logout', 'AdminController@logout');

        // Display CMS Pages (CRUD - READ)
        Route::get('cms-pages','CmsController@index');
        Route::post('update-cms-page-status', 'CmsController@updateStatus');
        Route::match(['get','post'],'add-edit-cms-page/{id?}','CmsController@edit');
        Route::get('delete-cms-page/{id}','CmsController@destroy');

        // Subadmins
        Route::get('subadmins','AdminController@subadmins');
        Route::post('update-subadmin-status', 'AdminController@updateSubadminStatus');
        Route::match(['get','post'],'add-edit-subadmin/{id?}','AdminController@addEditSubadmin');
        Route::get('delete-subadmin/{id}','AdminController@deleteSubadmin');
        Route::match(['get','post'],'update-role/{id}','AdminController@updateRole');

        // Categories Routes
        Route::get('categories','CategoryController@categories');
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus');
        Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory');
        Route::get('delete-category/{id?}','CategoryController@deleteCategory');
        Route::get('delete-category-image/{id}','CategoryController@deleteCategoryImage');

        // Products Routes
//        Route::get('products','ProductsController@products');
        Route::get('products',[ProductsController::class,'products']);
        Route::post('update-product-status', 'ProductsController@updateProductStatus');
        Route::get('delete-product/{id?}','ProductsController@deleteProduct');
//        Route::match(['get','post'],'add-edit-product/{id?}','ProductsController@addEditProduct');
        Route::match(['get','post'],'add-edit-product/{id?}',[ProductsController::class,'addEditProduct']);

        // Product Images
        Route::get('delete-product-image/{id?}','ProductsController@deleteProductImage');

        // Product Videos
        Route::get('delete-product-video/{id?}','ProductsController@deleteProductVideo');

        // Attributes
        Route::post('update-attribute-status', 'ProductsController@updateAttributeStatus');
        Route::get('delete-attribute/{id?}','ProductsController@deleteAttribute');

        // Brands
        Route::get('brands','BrandController@brands');
        Route::post('update-brand-status', 'BrandController@updateBrandStatus');
        Route::get('delete-brand/{id?}','BrandController@deleteBrand');
        Route::match(['get','post'],'add-edit-brand/{id?}','BrandController@addEditBrand');
        Route::get('delete-brand-image/{id?}','BrandController@deleteBrandImage');
        Route::get('delete-brand-logo/{id?}','BrandController@deleteBrandLogo');

        // Banners
        Route::get('banners','BannersController@banners');
        Route::post('update-banner-status', 'BannersController@updateBannerStatus');
        Route::get('delete-banner/{id?}','BannersController@deleteBanner');
        Route::match(['get','post'],'add-edit-banner/{id?}','BannersController@addEditBanner');

        // Coupons
        Route::get('coupons','CouponsController@coupons');
        Route::post('update-coupon-status', 'CouponsController@updateCouponStatus');
        Route::get('delete-coupon/{id?}','CouponsController@deleteCoupon');
        Route::match(['get','post'],'add-edit-coupon/{id?}','CouponsController@addEditCoupon');

        // Users
        Route::get('users','UserController@users');
        Route::post('update-user-status','UserController@updateUserStatus');

        // View Orders
        Route::get('orders','OrderController@orders');

        // Order Detail
        Route::get('orders/{id}','OrderController@orderDetails');

        // Update Order Status
        Route::post('update-order-status','OrderController@updateOrderStatus');

        // Print HTML Order Invoice
        Route::get('print-order-invoice/{id}','OrderController@printHTMLOrderInvoice');

        // Print PDF Invoice
        Route::get('print-pdf-order-invoice/{id}','OrderController@printPDFOrderInvoice');
    });
});
