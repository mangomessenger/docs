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
        Route::post('/types/{type}', 'Admin\TypeController@update')->name('type.update');
        Route::delete('/types/{type}', 'Admin\TypeController@destroy')->name('type.destroy');

        /* Type-Params */
        Route::get('/types/{type}/params/create', 'Admin\TypeParamController@create')->name('type-param.create');
        Route::post('/types/{type}/params', 'Admin\TypeParamController@store')->name('type-param.store');

        Route::get('/types/params/{type_param}/edit', 'Admin\TypeParamController@edit')->name('type-param.edit');
        Route::post('/types/params/{type_param}', 'Admin\TypeParamController@update')->name('type-param.update');
        Route::delete('/types/params/{type_param}', 'Admin\TypeParamController@destroy')->name('type-param.destroy');
    });
});

/* Auth routes */
\Illuminate\Support\Facades\Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
