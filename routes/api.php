<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\SmartShopApi\Auth\AuthController;
use App\Http\Controllers\SmartShopApi\Categories\CategoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Auth::routes(['verify' => true]);

// Group routing (Auth App Smart-Shop)
Route::controller(AuthController::class)
    ->prefix('auth')
    ->middleware(['api', 'checkPassword'])
    ->group(function (){

        Route::post('/register', 'register');
        Route::post('/login', 'login');
        Route::post('/logout', 'logout');
        Route::post('/refresh', 'refresh');
        Route::get('/user-profile', 'userProfile')->name('user.profile');
});

// Routing to manage users features
Route::controller(UserController::class)
    ->group(function (){

        Route::apiResource('/user', UserController::class);
});


// Routing to manage category features
Route::controller(CategoriesController::class)
    ->prefix('category')
    ->middleware('api')
    ->group(function (){

        Route::get('all', 'index');
        Route::get('/{id}', 'getSingleCategory');
        Route::post('add', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
        Route::get('/{id}/products', 'showByCategory')->name('showBy.Category');

});

// Routing to manage product features
Route::controller(ProductController::class)
    ->group(function (){

        Route::apiResource('/product', ProductController::class);

});

// Routing to manage review features
Route::prefix('/product')->group(function () {

    Route::apiResource('/{product}/reviews', ReviewController::class);

});

// Routing to manage cart features
Route::controller(CartController::class)
    ->group(function (){

        Route::apiResource('/cart', CartController::class);
});

// Routing to manage wishlist features
Route::controller(WishlistController::class)
    ->group(function (){

        Route::apiResource('/wishlist', WishlistController::class);
});

// Routing to manage ContactUs features
Route::controller(ContactUsController::class)
    ->group(function (){

        Route::apiResource('/contact-us', ContactUsController::class);
});
