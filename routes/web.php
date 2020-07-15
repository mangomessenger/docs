<?php

use Illuminate\Support\Facades\Route;

/* Main Page */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::namespace('Docs')->group(function(){
    Route::get('/api', 'ApiController@index')->name('api');
    Route::get('/methods', 'ApiController@methods')->name('methods');
    Route::get('/methods/{method}', 'ApiController@method')->name('method');
    Route::get('/types', 'ApiController@types')->name('types');
    Route::get('/types/{type}', 'ApiController@type')->name('type');
    Route::get('/errors', 'ApiController@errors')->name('errors');
});


/* Admin Panel */

Route::group([
    'middleware' => 'auth',
    'prefix' => 'panel',
    'namespace' => 'Admin'
], function () {

    /* Admin Panel */
    Route::get('/', 'PanelController@index')->name('admin.panel');

    /* Types */
    Route::resource('types', 'TypeController', [
        'names' => ['index' => 'admin.types.index'],
    ])->except(['show']);
    /* Type-Params */
    Route::prefix('types')->name('types.params.')->group(function() {
        Route::get('/{type}/params/create', 'TypeParamController@create')->name('create'); // type-params.create
        Route::post('/{type}/params', 'TypeParamController@store')->name('store'); // type-params.store
        Route::get('/params/{type_param}/edit', 'TypeParamController@edit')->name('edit'); // type-params.edit
        Route::put('/params/{type_param}', 'TypeParamController@update')->name('update'); // type-params.update
        Route::delete('/params/{id}', 'TypeParamController@destroy')->name('destroy'); // type-params.destroy
    });

    /* Methods */
    Route::resource('methods', 'MethodController', [
        'names' => ['index' => 'admin.methods.index'],
    ])->except('show');

    Route::prefix('methods')->group(function () {
        /* Method Errors */
        Route::post('/{method}/errors/add', 'MethodController@addError')->name('method.errors.add');
        Route::delete('/{method}/errors/{error}', 'MethodController@removeError')->name('method.errors.remove');
        /* Method-Params */
        Route::name('methods.params.')->group(function () {
            Route::get('/{method}/params/create', 'MethodParamController@create')->name('create'); // methods.params.create
            Route::post('/{method}/params', 'MethodParamController@store')->name('store'); // methods.params.store
            Route::get('/params/{method_param}/edit', 'MethodParamController@edit')->name('edit'); // methods.params.edit
            Route::put('/params/{method_param}', 'MethodParamController@update')->name('update'); // methods.params.update
            Route::delete('/params/{id}', 'MethodParamController@destroy')->name('destroy'); // methods.params.destroy
        });
        /* Method-Tags */
        Route::get('/tags', 'MethodTagController@index')->name('admin.methods.tags.index');
        Route::resource('tags', 'MethodTagController', [
            'as' => 'methods'
        ])->except(['show', 'index']);
    });

    /* Errors */
    Route::resource('errors', 'ErrorController', [
        'names' => ['index' => 'admin.errors.index'],
    ])->except(['show']);
    /* Error Categories */
    Route::prefix('errors')->name('errors.')->group(function () {
        Route::resource('categories', 'ErrorCategoryController')->except(['show']);
    });
});

/* Auth routes */
\Illuminate\Support\Facades\Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
