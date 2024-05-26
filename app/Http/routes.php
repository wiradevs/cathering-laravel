<?php

Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'CatalogsController@index');

    Route::get('/catalogs', 'CatalogsController@index');

    Route::post('cart', 'CartController@addProduct');

    Route::get('cart', "CartController@show");

    Route::delete('cart/{product_id}', 'CartController@removeProduct');

    Route::put('cart/{product_id}','CartController@changeQuantity');

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::resource('categories', 'CategoriesController');

    Route::resource('products','ProductsController');

    Route::get('checkout/login','CheckoutController@login');

    Route::post('checkout/login','CheckoutController@postlogin');

    Route::get('checkout/address', 'CheckoutController@address');
    Route::post('checkout/address', 'CheckoutController@postAddress');
    Route::get('address/regencies', 'AddressController@regencies');
    Route::get('checkout/payment', 'CheckoutController@payment');
    Route::post('checkout/payment', 'CheckoutController@postPayment');

    Route::get('checkout/success', 'CheckoutController@success');

    Route::resource('orders','OrdersController', ['only'=>[
        'index', 'edit', 'update'
    ]]);

    Route::get('/home/orders', 'HomeController@viewOrders');

    Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('/profile', 'UsersController@index');

    Route::group(['middleware'=>'auth'], function(){
        Route::get('/profile/edit', ['as' => 'profile.edit','uses' => 'UsersController@edit']);
        Route::post('/profile/edit', ['as' => 'profile.edit', 'uses' => 'UsersController@update']);
    });
});


    Route::group(['middleware'=>'api'], function() {
    Route::get('address/regencies', 'AddressController@regencies');
});
