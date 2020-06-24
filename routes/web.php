<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get("/api", "API\ApiController@index");
Route::get("/methods", "API\MethodController@index");

Route::get("/method/{method}", "API\MethodController@show")->name('method');

//Auth::routes();
