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
    });
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
