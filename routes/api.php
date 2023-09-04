<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SmartShopApi\Auth\AuthController;
use App\Http\Controllers\SmartShopApi\Products\ProductsController;
use App\Http\Controllers\SmartShopApi\Categories\CategoriesController;
use App\Http\Controllers\smartShopApi\Auth\Sociallite\GoogleController;

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
        Route::get('/user-profile', 'userProfile');
});

// Group routing Categories
Route::controller(CategoriesController::class)
    ->prefix('categories')
    ->middleware('api')
    ->group(function (){

        Route::get('all', 'index');
        Route::post('add', 'store');
        Route::put('update', 'update');
        Route::delete('delete', 'destroy');
});

// Group routing Categories
Route::controller(ProductsController::class)
    ->prefix('products')
    ->middleware('api')
    ->group(function (){

        Route::get('all', 'getAllProducts');
        Route::post('add', 'store');
        Route::put('update', 'update');
        Route::delete('delete', 'destroy');
        // Route::delete('delete-all', 'truncateAllProduct');
        Route::get('single-Product', 'getSingleProduct');
        Route::get('popular-products', 'popularProduct');
        Route::get('similar-products', 'similarProducts');
        Route::get('lowest-price', 'sortingASC');
        Route::get('highest-price', 'sortingDESC');

});



//Route::get('/auth/google/callback', function () {
//    $user = Socialite::driver('google')->stateless()->user();
//
//    // Return the user's information as JSON
//    return response()->json([
//        'email' => $user->email,
//        'name' => $user->name,
//    ]);
//})->middleware('api');

//Route::controller(GoogleController::class)
//    ->middleware(['api', 'checkPassword'])
//    ->group(function () {
//
//        Route::get('auth/google/redirect', 'handleGoogleRedirect')->name('google');
//        Route::get('auth/google/callback', 'handleGoogleCallback');
//});
