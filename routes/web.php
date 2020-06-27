<?php

use Illuminate\Support\Facades\Route;

/* Main Page */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/api', 'Docs\ApiController@index')->name('api');
Route::get('/methods', 'Docs\ApiController@methods')->name('methods');
Route::get('/method/{method}', 'Docs\ApiController@method')->name('method');
Route::get('/types', 'Docs\ApiController@types')->name('types');
Route::get('/type/{type}', 'Docs\ApiController@type')->name('type');

/* Admin Panel */
Route::middleware('auth')->group(function () {
    Route::prefix('panel')->group(function (){
        /* Admin Panel */
        Route::get('/', 'Admin\PanelController@index')->name('panel');
        /* Types */
        Route::get('/types', 'Admin\TypeController@index')->name('admin.types');
        Route::delete('/types/{type}', 'Admin\TypeController@destroy')->name('type.destroy');
        Route::get('/types/create', 'Admin\TypeController@create')->name('type.create');
        Route::post('/types/', 'Admin\TypeController@store')->name('type.store');
        Route::get('/types/{type}/edit', 'Admin\TypeController@edit')->name('type.edit');
        Route::post('/types/{type}', 'Admin\TypeController@update')->name('type.update');
        Route::get('/params/{type}', 'Admin\TypeParamController@index')->name('type.params');

        /* Type-Params */
        Route::get('/type-params/{type}/create', 'Admin\TypeParamController@create')->name('type-param.create');
        Route::post('/type-params/{type}', 'Admin\TypeParamController@store')->name('type-param.store');
    });
});

/* Auth routes */
\Illuminate\Support\Facades\Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
