<?php

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

Route::get('/', function () {
    return view('site.index');
});
Route::get('catalog', function () {
    return view('site.catalog');
});
Route::get('cart', function () {
    return view('site.cart');
});
Route::get('orders', function () {
    return view('site.user_profile.orders');
});
Route::get('user_info', function () {
    return view('site.user_profile.user_info');
});
Route::get('product', function () {
    return view('site.product');
});

Auth::routes();

// Admin auth
Route::prefix('admin')->group(function(){
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
    // Authentication Routes...
    Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'AdminAuth\LoginController@login');
    Route::post('logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
    // Registration Routes...
    Route::get('register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'AdminAuth\RegisterController@register');
    // Password Reset Routes...
    Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');;
    Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');;
    Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('admin.password.reset');;
    Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset');
});



Route::get('/home', 'HomeController@index')->name('home');

