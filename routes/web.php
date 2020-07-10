<?php

use Illuminate\Support\Facades\Route;

/* Main Page */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/api', 'Docs\ApiController@index')->name('api');
Route::get('/methods', 'Docs\ApiController@methods')->name('methods');
Route::get('/methods/{method}', 'Docs\ApiController@method')->name('method');
Route::get('/types', 'Docs\ApiController@types')->name('types');
Route::get('/types/{type}', 'Docs\ApiController@type')->name('type');

/* Admin Panel */
Route::middleware('auth')->group(function () {
    Route::prefix('panel')->group(function (){
        /* Admin Panel */
        Route::get('/', 'Admin\PanelController@index')->name('panel');

        /* Types */
        Route::get('/types', 'Admin\TypeController@index')->name('admin.types');
        Route::get('/types/create', 'Admin\TypeController@create')->name('type.create');
        Route::post('/types/', 'Admin\TypeController@store')->name('type.store');
        Route::get('/types/{type}/edit', 'Admin\TypeController@edit')->name('type.edit');
        Route::post('/types/{id}', 'Admin\TypeController@update')->name('type.update');
        Route::delete('/types/{id}', 'Admin\TypeController@destroy')->name('type.destroy');
        /* Type-Params */
        Route::get('/types/{type}/params/create', 'Admin\TypeParamController@create')->name('type-param.create');
        Route::post('/types/{type}/params', 'Admin\TypeParamController@store')->name('type-param.store');
        Route::get('/types/params/{type_param}/edit', 'Admin\TypeParamController@edit')->name('type-param.edit');
        Route::post('/types/params/{type_param}', 'Admin\TypeParamController@update')->name('type-param.update');
        Route::delete('/types/params/{id}', 'Admin\TypeParamController@destroy')->name('type-param.destroy');

        /* Methods */
        Route::get('/methods', 'Admin\MethodController@index')->name('admin.methods');
        Route::get('/methods/create', 'Admin\MethodController@create')->name('method.create');
        Route::post('/methods/', 'Admin\MethodController@store')->name('method.store');
        Route::get('/methods/{method}/edit', 'Admin\MethodController@edit')->name('method.edit');
        Route::post('/methods/{id}', 'Admin\MethodController@update')->name('method.update');
        Route::delete('/methods/{id}', 'Admin\MethodController@destroy')->name('method.destroy');

        /* Method-Tags */
        Route::get('/method-tags', 'Admin\TagController@index')->name('admin.method-tags');
        Route::get('/method-tags/create', 'Admin\TagController@create')->name('method-tag.create');
        Route::post('/method-tags/', 'Admin\TagController@store')->name('method-tag.store');

    });
});

/* Auth routes */
\Illuminate\Support\Facades\Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
