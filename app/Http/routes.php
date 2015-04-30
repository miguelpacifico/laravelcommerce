<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::pattern('id','[0-9]+');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function()
{

    Route::group(['prefix' => 'categories'], function()
    {
        Route::get('list', [
            'as' => 'categories.list', 'uses' => 'AdminCategoriesController@index'
        ]);

        Route::get('add', [
            'as' => 'categories.add', 'uses' => 'AdminCategoriesController@index'
        ]);

        Route::get('show/{id}', [
            'as' => 'categories.show', 'uses' => 'AdminCategoriesController@index'
        ]);

        Route::get('edit/{id}', [
            'as' => 'categories.edit', 'uses' => 'AdminCategoriesController@index'
        ]);

    });

    Route::group(['prefix' => 'products'], function()
    {
        Route::get('list', [
            'as' => 'products.list', 'uses' => 'AdminProductsController@index'
        ]);

        Route::get('add', [
            'as' => 'products.add', 'uses' => 'AdminProductsController@index'
        ]);

        Route::get('show/{id}', [
            'as' => 'products.show', 'uses' => 'AdminProductsController@index'
        ]);

        Route::get('edit/{id}', [
            'as' => 'products.edit', 'uses' => 'AdminProductsController@index'
        ]);

    });


    //Route::get('categories', 'AdminCategoriesController@index');

    //Route::get('products', 'AdminProductsController@index');
});



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
