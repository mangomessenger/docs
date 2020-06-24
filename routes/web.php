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

Route::get("/api", "Docs\ApiController@index")->name('api');
Route::get("/methods", "Docs\ApiController@methods")->name('methods');

Route::get("/method/{method}", "Docs\ApiController@method")->name('method');

\Illuminate\Support\Facades\Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
