<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

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
        Route::get('/', 'Admin\PanelController@index')->name('panel');
        Route::get('/types', 'Admin\TypeController@index')->name('admin.types');
        Route::delete('/types/{type}', 'Admin\TypeController@destroy')->name('type.destroy');
        Route::get('/types/create', 'Admin\TypeController@create')->name('type.create');
        Route::post('/types/', 'Admin\TypeController@store')->name('type.store');
        Route::get('/types/{type}/edit', 'Admin\TypeController@edit')->name('type.edit');
        Route::post('/types/{type}', 'Admin\TypeController@update')->name('type.update');
        Route::get('/params/{type}', 'Admin\TypeParamController@index')->name('type.params');

        Route::get('/type-params/{type}/create', 'Admin\TypeParamController@create')->name('type-param.create');
        Route::post('/type-params/{type}', 'Admin\TypeParamController@store')->name('type-param.store');
    });
});

\Illuminate\Support\Facades\Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
