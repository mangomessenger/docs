<?php

use Illuminate\Support\Facades\Route;

/* Main Page */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/api', 'Docs\ApiController@index')->name('api');
Route::get('/methods', 'Docs\ApiController@methods')->name('methods');
Route::get('/methods/{method}', 'Docs\ApiController@method')->name('method');
Route::get('/types', 'Docs\ApiController@types')->name('types');
Route::get('/types/{type}', 'Docs\ApiController@type')->name('type');

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
        'names' => ['index' => 'admin.types']
    ])->except(['show']);
    /* Type-Params */
    Route::get('/types/{type}/params/create', 'TypeParamController@create')->name('type-params.create');
    Route::post('/types/{type}/params', 'TypeParamController@store')->name('type-params.store');
    Route::get('/types/params/{type_param}/edit', 'TypeParamController@edit')->name('type-params.edit');
    Route::put('/types/params/{type_param}', 'TypeParamController@update')->name('type-params.update');
    Route::delete('/types/params/{id}', 'TypeParamController@destroy')->name('type-params.destroy');

    /* Methods */
    Route::resource('methods', 'MethodController', [
        'names' => ['index' => 'admin.methods'],
    ])->except('show');

    Route::post('/methods/{method}/errors/add', 'MethodController@addError')->name('method.errors.add');
    Route::delete('/methods/{method}/errors/{error}', 'MethodController@removeError')->name('method.errors.remove');
    /* Method-Params */
    Route::get('/methods/{method}/params/create', 'MethodParamController@create')->name('methods.params.create');
    Route::post('/methods/{method}/params', 'MethodParamController@store')->name('methods.params.store');
    Route::get('/methods/params/{method_param}/edit', 'MethodParamController@edit')->name('methods.params.edit');
    Route::put('/methods/params/{method_param}', 'MethodParamController@update')->name('methods.params.update');
    Route::delete('/methods/params/{id}', 'MethodParamController@destroy')->name('methods.params.destroy');
    /* Method-Tags */
    Route::get('/methods/tags', 'MethodTagController@index')->name('admin.methods.tags');
    Route::get('/methods/tags/create', 'MethodTagController@create')->name('methods.tags.create');
    Route::post('/methods/tags/', 'MethodTagController@store')->name('methods.tags.store');
    Route::get('/methods/tags/{tag}/edit', 'MethodTagController@edit')->name('methods.tags.edit');
    Route::put('/methods/tags/{id}', 'MethodTagController@update')->name('methods.tags.update');
    Route::delete('/methods/tags/{id}', 'MethodTagController@destroy')->name('methods.tags.destroy');

    /* Errors */
    Route::resource('errors', 'ErrorController', [
        'names' => ['index' => 'admin.errors'],
    ])->except(['edit', 'show']);
    /* Error Categories */
    Route::prefix('errors')->group(function(){
        Route::get('/categories', 'ErrorCategoryController@index')->name('admin.errors.categories');
        Route::get('/categories/create', 'ErrorCategoryController@create')->name('admin.errors.categories.create');
        Route::post('/categories', 'ErrorCategoryController@store')->name('admin.errors.categories.store');
        Route::get('/categories/{category}/edit', 'ErrorCategoryController@edit')->name('admin.errors.categories.edit');
        Route::put('/categories/{category}', 'ErrorCategoryController@update')->name('admin.errors.categories.update');
        Route::delete('/categories/{id}', 'ErrorCategoryController@destroy')->name('admin.errors.categories.destroy');
    });
});

/* Auth routes */
\Illuminate\Support\Facades\Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
