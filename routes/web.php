<?php

use App\Http\Controllers\DemoController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\CategoryAddComponent;
use App\Http\Livewire\Admin\CategoryComponent;
use App\Http\Livewire\Admin\CategoryEditComponent;
use App\Http\Livewire\Admin\CouponAddComponent;
use App\Http\Livewire\Admin\CouponComponent;
use App\Http\Livewire\Admin\CouponEditComponent;
use App\Http\Livewire\Admin\HomeCategoryComponent;
use App\Http\Livewire\Admin\HomeSliderAddComponent;
use App\Http\Livewire\Admin\HomeSliderComponent;
use App\Http\Livewire\Admin\HomeSliderEditComponent;
use App\Http\Livewire\Admin\OrderComponent;
use App\Http\Livewire\Admin\OrderDetailsComponent;
use App\Http\Livewire\Admin\ProductAddComponent;
use App\Http\Livewire\Admin\ProductComponent;
use App\Http\Livewire\Admin\ProductEditComponent;
use App\Http\Livewire\Admin\SaleComponent;

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\ChangePasswordComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOrderComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\WishListComponent;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', HomeComponent::class)->name('Home');
Route::get('/shop', ShopComponent::class)->name('Shop');
Route::get('/cart', CartComponent::class)->name('Cart');
Route::get('/checkout', CheckoutComponent::class)->name('Checkout');
Route::get('/detail/{slug}', DetailsComponent::class)->name('detail');
Route::get('/search', SearchComponent::class)->name('search');
Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');
Route::get('/wish-list', WishListComponent::class)->name('wish-list');
Route::post('/demo', [DemoController::class, 'index'])->name('demo');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::middleware(['auth:sanctum', config('jetstream.auth_session', 'verified', 'authadmin')])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    //Category
    Route::get('/admin/categories', CategoryComponent::class)->name('admin.categories');
    Route::get('/admin/categories/add', CategoryAddComponent::class)->name('admin.categories.add');
    Route::get('/admin/categories/{slug}/edit', CategoryEditComponent::class)->name('admin.categories.edit');
    //Product
    Route::get('/admin/products', ProductComponent::class)->name('admin.products');
    Route::get('/admin/products/add', ProductAddComponent::class)->name('admin.products.add');
    Route::get('/admin/products/{slug}/edit/', ProductEditComponent::class)->name('admin.products.edit');
    // Slider
    Route::get('/admin/homeslider', HomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/homeslider/add', HomeSliderAddComponent::class)->name('admin.homeslider.add');
    Route::get('/admin/homeslider/{id}/edit/', HomeSliderEditComponent::class)->name('admin.homeslider.edit');
    // Coupon
    Route::get('/admin/coupon', CouponComponent::class)->name('admin.coupon');
    Route::get('/admin/coupon/add', CouponAddComponent::class)->name('admin.coupon.add');
    Route::get('/admin/coupon/{code}/edit/', CouponEditComponent::class)->name('admin.coupon.edit');
    //HomeCategory
    Route::get('/admin/homecategory', HomeCategoryComponent::class)->name('admin.homecategory');
    //Sale
    Route::get('/admin/sales', SaleComponent::class)->name('admin.sales');
    // Order
    Route::get('/admin/orders', OrderComponent::class)->name('admin.orders');
    // Order Details
    Route::get('/admin/orders/{order_id}/details', OrderDetailsComponent::class)->name('admin.orders.details');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session', 'verified')])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    // User Order
    Route::get('/user/orders', UserOrderComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}/details', UserOrderDetailsComponent::class)->name('user.orders.details');
    // Review
    Route::get('/user/orders/{order_item_id}/review', UserReviewComponent::class)->name('user.orders.review');
    // Change Password
    Route::get('/user/change-password', ChangePasswordComponent::class)->name('user.change.password');
});
