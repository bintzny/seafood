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

Route::get('/', 'ProductController@allListProduct');
Route::get('/productGroup/{id}', 'ProductController@productGroup');

Route::group(['middleware' => 'auth'], function() {
    Route::get('orders', 'fontend\ProductController@index');

    Route::get('/add-cart/{id}', [
        'uses' => 'fontend\ProductController@getAddToCart',
        'as' => 'product.addToCart'
    ]);


    Route::get('/cart-add/{id}', [
        'uses' => 'fontend\ProductController@cartAddItem',
        'as' => 'product.cartAddItem'
    ]);


    Route::get('/cart-remove/{id}', [
        'uses' => 'fontend\ProductController@cartRemoveItem',
        'as' => 'product.cartRemoveItem'
    ]);
    

    Route::get('/cart-delete/{id}', [
        'uses' => 'fontend\ProductController@cartDeleteItem',
        'as' => 'product.cartDeleteItem'
    ]);

    Route::get('/shopping-cart', [
        'uses' => 'fontend\ProductController@getCart',
        'as' => 'product.shoppingCart'
    ]);

    Route::get('/chkOrder', 'fontend\OrdersController@chkOrder');
    Route::get('/order/orderDetail/{id}', 'fontend\OrdersController@orderDetail');
    Route::get('/order/{id}/pdf', 'fontend\OrdersController@orderPDF');
    Route::post('/order/payment', 'fontend\OrdersController@payment');
    Route::post('/order/delete', 'fontend\OrdersController@orderDelete');
    Route::resource('/order', 'fontend\OrdersController');
    Route::resource('/transport', 'TransportController');
});

Auth::routes();


Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', function () {
        return view('welcome');
    });

    Route::resource('admin/customer', 'CustomerController');
    Route::resource('admin/product', 'ProductController');
    Route::resource('admin/productgroup', 'ProductGroupController');
    Route::get('/admin/orders/{id}', 'OrdersController@detailOrder');
    Route::get('/admin/order/{id}/pdf', 'OrdersController@orderPDF');
    Route::resource('admin/orders', 'OrdersController');
    //Product Stock ******************************
    Route::resource('/admin/stock', 'ProductStockController');
});





Route::get('/faculty',
    function ()
{
    return view('faculty.index');
}
);
Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout_admin', 'AdminAuth\LoginController@logout_admin');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
