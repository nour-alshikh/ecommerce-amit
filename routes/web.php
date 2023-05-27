<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FacebookController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');
});


// MODERATOR MIDDLEWARE
Route::middleware('IsModerator')->group(function () {
    // Dashboard route
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // Users routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // Categories routes
    Route::get('/cats', [CatController::class, 'index'])->name('cats.index');
    Route::get('/cats/create', [CatController::class, 'create'])->name('cats.create');
    Route::post('/cats', [CatController::class, 'store'])->name('cats.store');

    // Products routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
});




// ADMIN MIDDLEWARE
Route::middleware('IsAdmin')->group(function () {

    // Users routes

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Categories routes

    Route::get('/cats/{id}', [CatController::class, 'show'])->name('cats.show');
    Route::get('/cats/{id}/edit', [CatController::class, 'edit'])->name('cats.edit');
    Route::put('/cats/{id}', [CatController::class, 'update'])->name('cats.update');
    Route::delete('/cats/{id}', [CatController::class, 'destroy'])->name('cats.destroy');

    // Products routes
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});






// USER MIDDLEWARE
Route::middleware('IsLoggedIn')->group(function () {
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    Route::post('/add_to_cart/{product_id}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('/delete_cart/{id}', [CartController::class, 'delete_cart'])->name('cart.delete');
    Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
    Route::get('/orders/{order_id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/make_order', [OrderController::class, 'make_order'])->name('make_order');
    Route::post('/icon_add_to_cart/{product_id}', [CartController::class, 'icon_add_to_cart'])->name('icon_add_to_cart');
    Route::post('/add-to-wish/{product_id}', [WishController::class, 'add_to_wish'])->name('add_to_wishlist');
    Route::get('/wishlist', [WishController::class, 'wishlist'])->name('wishlist');
    Route::get('/wishlist/{wish_id}', [WishController::class, 'destroy'])->name('wishlist.destroy');
    Route::post('/decrease/{item_id}', [CartController::class, 'decrease'])->name('decrease');
    Route::post('/increase/{item_id}', [CartController::class, 'increase'])->name('increase');
    Route::get('/change_password', [HomeController::class, 'change_password'])->name('change_password');
});


Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/shop_cat/{id}', [HomeController::class, 'shop_cat'])->name('shop_cat');
Route::get('/error', [HomeController::class, 'error'])->name('error');

Route::get('/auth/facebook', [FacebookController::class, 'facebook_page']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'facebook_redirect']);

Route::get('/auth/google', [FacebookController::class, 'google_page']);
Route::get('/auth/google/callback', [FacebookController::class, 'google_redirect']);
