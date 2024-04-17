<?php
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\MainController as HomeController;
use App\Http\Controllers\MenuHeaderController;
use App\Http\Controllers\ProductController as DetailProductController;
use App\Http\Controllers\CartController; 
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



Route::get('admin/users/login',[LoginController::class,'index'])->name('login')->middleware(LoginMiddleware::class);
Route::POST('admin/users/login/store',[LoginController::class,'store'])->name('auth.login');
Route::GET('logout',[LoginController::class,'logout'])->name('auth.logout');


// Middleware: Nếu chưa đăng nhập mà cố tình vào dashboard admin thì sẽ redirect vào lại form login
Route::middleware(['auth.admin'])->group(function(){

    // admin
    Route::prefix('admin')->group(function () {
        Route::GET('/',[MainController::class,'index'])->name('admin');
    });


    // Menu 
    Route::prefix('menus')->group(function () {
        Route::GET('add',[MenuController::class,'create'])->name('create');
        Route::POST('add',[MenuController::class,'store'])->name('store');
        Route::GET('list',[MenuController::class,'list'])->name('list.menu');
        Route::GET('{id}/edit',[MenuController::class,'edit'])->name('edit.menu');
        Route::PUT('{id}',[MenuController::class,'update'])->name('update.menu');
        Route::DELETE('delete/{id}',[MenuController::class,'destroy'])->name('destroy.menu');
    });

   

    // Sản phẩm
    Route::prefix('products')->group(function(){
        Route::GET('add',[ProductController::class,'create'])->name('create.product');
        Route::POST('add',[ProductController::class,'store'])->name('store.product');
        Route::GET('list',[ProductController::class,'index'])->name('list.product');
        Route::GET('{id}/edit',[ProductController::class,'show'])->name('edit.product');
        Route::PUT('{id}',[ProductController::class,'update'])->name('update.product');
        Route::DELETE('delete/{id}',[ProductController::class,'destroy'])->name('destroy.product');

         // Search
        Route::GET('search',[ProductController::class,'search'])->name('search.product');
    });

    //Upload
    Route::POST('upload/services',[UploadController::class,'store'])->name('upload');

    // Slider
    Route::prefix('sliders')->group(function(){
        Route::GET('add',[SliderController::class,'create'])->name('create.slider');
        Route::POST('add',[SliderController::class,'store'])->name('store.slider');
        Route::GET('list',[SliderController::class,'index'])->name('list.slider');
        Route::GET('{id}/edit',[SliderController::class,'show'])->name('edit.slider');
        Route::PUT('{id}',[SliderController::class,'update'])->name('update.slider');
        Route::DELETE('delete/{id}',[SliderController::class,'destroy'])->name('destroy.slider');
           // Search
        Route::GET('search',[SliderController::class,'search'])->name('search.slider');
    });
});

Route::Get('/',[HomeController::class,'index'])->name('home');

Route::GET('show/{id}',[HomeController::class,'show'])->name('showmodal.product.home');

// Quick view 
Route::GET('quickview/{id}',[HomeController::class,'quickView'])->name('quickview');
// Load more
Route::POST('services/load-product',[HomeController::class,'loadProduct'])->name('load.product');

//Danh mục sản phẩm
Route::GET('{slug}',[MenuHeaderController::class,'index'])->name('category.product');

// Chi tiết sản phẩm
Route::GET('san-pham/{id}',[DetailProductController::class,'index'])->name('detail.product');

// Thêm vào giỏ hàng
Route::POST('add-cart',[CartController::class,'index'])->name('add.cart');

// Danh sách sản phẩm trong giỏ hàng
Route::GET('list/cart',[CartController::class,'show'])->name('show.cart');

// Update giỏ hàng
Route::POST('/update-cart',[CartController::class,'update'])->name('update.cart');