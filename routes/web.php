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
    Route::get('/success', 'CartController@success')->name('cart.success');
    Route::post('add','CartController@add')->name('cart.add');
    Route::post('remove','CartController@remove')->name('cart.remove');
    Route::get('clear','CartController@clear')->name('cart.clear');
    Route::post('update_product_qty','CartController@updateProductQty')->name('cart.update_product_qty');
    Route::get('get_cart','CartController@getCart')->name('cart.get');
    Route::post('checkout','CartController@checkout')->name('cart.checkout');
});

// Category
Route::get('c','CatalogController@catalog')->name('catalog');
Route::get('c/{category}','CatalogController@category')->name('catalog.category');
Route::get('c/{category}/{brand}','CatalogController@brand')->name('catalog.brand');
// Product

Route::get('c/{category}/{brand}/{product}','ProductController@show')->name('product.show');



// Admin auth
Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::namespace('Admin')->group(function(){
        Route::resource('categories', 'CategoryController'); // Категории товаров
        Route::resource('products', 'ProductController'); // Товаровы
        Route::post('delete_image', 'ProductController@deleteImaga')->name('delete_image');
        Route::resource('manufacturers', 'ManufacturerController'); // Производители
        Route::resource('countries', 'CountriesController'); // Страны
        Route::resource('attribute_types', 'AttributeTypeController'); // Типы атрибутов
        Route::resource('materials', 'MaterialController'); // Материал
        Route::get('export', 'ExcelExportController@export'); // Excel export
        Route::get('import', 'ExcelImportController@import'); // Excel import
        Route::prefix('order')->group(function(){
            Route::get('/', 'OrderController@index')->name('order.index');
            Route::get('{order}', 'OrderController@show')->name('order.show');
        });
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

