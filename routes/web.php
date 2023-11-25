<?php

use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\CustomersLoginController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');


//frontend
Route::get('/', [FrontendController::class, 'welcome'])->name('index');
Route::get('/product/details/{product_slug}', [FrontendController::class, 'product_details'])->name('product.details');
Route::post('/getSize', [FrontendController::class, 'getSize']);
Route::get('/cart', [FrontendController::class, 'cart'])->name ('cart');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name ('checkout');




//user

Route::get('/user', [UserController::class, 'user'])->name('user');
Route::get('/delete/user/{user_id}', [UserController::class, 'delete'])->name('del.user');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/name/change', [UserController::class, 'name_change'])->name('name.change');
Route::post('/password/change', [UserController::class, 'password_change'])->name('password.change');
Route::post('/photo/change', [UserController::class, 'photo_change'])->name('photo.change');

//category
Route::get('/category/list',[CategoryController::class, 'category'])->name('category');
Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');
Route::get('/category/delete/{category_id}',[CategoryController::class, 'delete'])->name('category.delete');
Route::get('/category/edit/{category_id}',[CategoryController::class, 'category_edit'])->name('category.edit');
Route::post('/category/update',[CategoryController::class, 'category_update'])->name('category.update');

//Subcategory
Route::get('subcategory', [SubcategoryController::class, 'subcategory'])->name('subcategory');
Route::post('subcategory/store', [SubcategoryController::class, 'subcategory_store'])->name('subcategory.store');



//product
Route::get('add/product',[ProductController::class, 'add_product'])->name('add.product');
Route::post('/getSubcategory',[ProductController::class, 'getSubcategory']);
Route::post('/product/store',[ProductController::class, 'product_store'])->name('product.store');
Route::get('/product/list',[ProductController::class, 'product_list'])->name('product.list');
Route::get('/product/color/size',[ProductController::class, 'color_size'])->name('add.color.size');
Route::post('/product/color',[ProductController::class, 'add_color'])->name('add.color');
Route::post('/product/size',[ProductController::class, 'add_size'])->name('add.size');
Route::get('inventory/{product_id}',[ProductController::class, 'inventory'])->name('inventory');
Route::post('add.inventory',[ProductController::class, 'add_inventory'])->name('add.inventory');

//customer
Route::get('/customer/register/', [CustomerRegisterController::class, 'customer_register'])->name('customer.login.register');
Route::post('/customer/register/store', [CustomerRegisterController::class, 'customer_register_store'])->name('customer.register.store');
Route::post('/customer/login', [CustomersLoginController::class, 'customer_login'])->name('customer.login');
Route::get('/customer/logout', [CustomersLoginController::class, 'customer_logout'])->name('customer.logout');


//cart
Route::post('/cart/store', [cartcontroller::class, 'cart_store'])->name('cart.store');
Route::get('/cart/remove/{cart_id}', [cartcontroller::class, 'cart_remove'])->name('remove.cart');

//coupon
Route::get('/coupon', [CouponController::class, 'coupon'])->name('coupon');
Route::post('/coupon/store', [CouponController::class, 'coupon_store'])->name('coupon.store');

//checkout
Route::post('/order/store', [CheckoutController::class, 'order_store'])->name('order.store');
Route::get('/order/success', [CheckoutController::class, 'order_success'])->name('order.success');






