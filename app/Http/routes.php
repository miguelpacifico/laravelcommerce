<?php

Route::pattern('id','[0-9]+');

Route::group(['prefix' => 'admin','middleware'=>'auth','middleware'=>'auth.admin'], function()
{

    Route::get('/', [
        'as' => 'admin.index', 'uses' => 'LoginController@admin'
    ]);


    Route::group(['prefix' => 'categories'], function()
    {
        Route::get('/', [
            'as' => 'categories', 'uses' => 'AdminCategoriesController@index'
        ]);

        Route::post('/', [
            'as' => 'categories.store', 'uses' => 'AdminCategoriesController@storage'
        ]);

        Route::get('create', [
            'as' => 'categories.create', 'uses' => 'AdminCategoriesController@create'
        ]);

        Route::get('{id}/destroy', [
            'as' => 'categories.destroy', 'uses' => 'AdminCategoriesController@destroy'
        ]);

        Route::get('{id}/edit', [
            'as' => 'categories.edit', 'uses' => 'AdminCategoriesController@edit'
        ]);

        Route::put('{id}/update', [
            'as' => 'categories.update', 'uses' => 'AdminCategoriesController@update'
        ]);
    });

    Route::group(['prefix' => 'products'], function()
    {
        Route::get('/', [
            'as' => 'products', 'uses' => 'AdminProductsController@index'
        ]);

        Route::post('/', [
            'as' => 'products.store', 'uses' => 'AdminProductsController@storage'
        ]);

        Route::get('create', [
            'as' => 'products.create', 'uses' => 'AdminProductsController@create'
        ]);

        Route::get('{id}/destroy', [
            'as' => 'products.destroy', 'uses' => 'AdminProductsController@destroy'
        ]);

        Route::get('{id}/edit', [
            'as' => 'products.edit', 'uses' => 'AdminProductsController@edit'
        ]);

        Route::put('{id}/update', [
            'as' => 'products.update', 'uses' => 'AdminProductsController@update'
        ]);
        //ROTAS IMAGENS
        Route::group(['prefix' => 'images'], function(){

            Route::get('{id}/product', [
                'as' => 'products.images', 'uses' => 'AdminProductsController@images'
            ]);

            Route::get('create/{id}/product', [
                'as' => 'products.images.create', 'uses' => 'AdminProductsController@createImage'
            ]);

            Route::post('store/{id}/product', [
                'as' => 'products.images.store', 'uses' => 'AdminProductsController@storeImage'
            ]);

            Route::get('destroy/{id}/image', [
                'as' => 'products.images.destroy', 'uses' => 'AdminProductsController@destroyImage'
            ]);

        });

    });
});


Route::group(['prefix' => 'cart'], function(){


    Route::get('/', [
        'as' => 'cart', 'uses' => 'CartController@index'
    ]);

    Route::get('add/{id}', [
        'as' => 'cart.add', 'uses' => 'CartController@add'
    ]);

    Route::get('remove/{id}', [
        'as' => 'cart.remove', 'uses' => 'CartController@removeQtd'
    ]);


    Route::get('destroy/{id}', [
        'as' => 'cart.destroy', 'uses' => 'CartController@destroy'
    ]);

});

Route::get('/', [
    'as' => 'store', 'uses' => 'StoreController@index'
]);


Route::get('category/{id}', [
    'as' => 'store.category', 'uses' => 'StoreController@category'
]);

Route::get('product/{id}', [
    'as' => 'store.product', 'uses' => 'StoreController@product'
]);

Route::get('tag/{id}', [
    'as' => 'store.tag', 'uses' => 'StoreController@tag'
]);

Route::get('checkout/placeOrder',[
    'as' => 'checkout.place', 'uses' => 'CheckoutController@place'
]);

Route::get('checkout/order',[
    'as' => 'checkout.order', 'uses' => 'CheckoutController@order'
]);

Route::get('auth/login', [
    'as' => 'auth.login', 'uses' => 'LoginController@index'
]);

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
