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
//Route::get('catalog', function () { return view('site.catalog'); });
Route::get('cart', function () {
    return view('site.cart');
});


Route::get('product', function () {
    return view('site.product');
});

// User auth
Auth::routes();

// User
Route::prefix('user')->group(function(){
    Route::get('orders','UserController@orders')->name('user.orders');
    Route::get('info','UserController@info')->name('user.info');
    Route::get('videos','UserController@videos')->name('user.videos');
    Route::post('save_info','UserController@saveInfo')->name('save.info');
});

// Cart
Route::prefix('cart')->group(function(){
    Route::get('/', 'CartController@index')->name('cart.index');
    Route::post('add','CartController@add')->name('cart.add');
    Route::get('clear','CartController@clear')->name('cart.clear');
    Route::post('update_product_qty','CartController@updateProductQty')->name('cart.update_product_qty');
    Route::get('get_cart','CartController@getCart')->name('cart.get');
});

// Category
Route::get('categories/{alias}','CatalogController@category')->name('catalog.category');
Route::get('catalog','CatalogController@catalog')->name('catalog');

// Product
Route::get('product/{alias}','ProductController@show')->name('product.show');



// Admin auth
Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::namespace('Admin')->group(function(){
        Route::resource('categories', 'CategoryController'); // Категории товаров
        Route::resource('products', 'ProductController'); // Товаровы
        Route::post('delete_image', 'ProductController@deleteImaga')->name('delete_image');
        Route::resource('manufacturers', 'ManufacturerController'); // Производители
        Route::resource('countries', 'CountriesController'); // Страны
        Route::resource('materials', 'MaterialController'); // Материал
    });
    // Authentication Routes...
    Route::namespace('AdminAuth')->group(function(){
        Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('admin.logout');
        // Registration Routes...
        Route::get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('register', 'RegisterController@register');
        // Password Reset Routes...
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');;
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');;
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');;
        Route::post('password/reset', 'ResetPasswordController@reset');
    });

});



Route::get('/home', 'HomeController@index')->name('home');

