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

Route::middleware('auth')->group(function(){
    Route::get('dashboard','App\Http\Controllers\IndexController@dashboard')->name('dashboard');
    Route::get('logout','App\Http\Controllers\UserController@logout')->name('logout');
    Route::get('system','App\Http\Controllers\SystemController@index')->name('system');
    Route::post('system','App\Http\Controllers\SystemController@update')->name('systemUpdate');
    Route::get('manager','App\Http\Controllers\UserController@index')->name('manager');
    Route::get('unused','App\Http\Controllers\CardController@unused')->name('unused');
    Route::post('updateManager','App\Http\Controllers\UserController@update')->name('updateManager');
    Route::get('managerDelete/{id?}','App\Http\Controllers\UserController@delete')->name('managerDelete');
    Route::get('create','App\Http\Controllers\CardController@create')->name('create');
    Route::post('createCard', 'App\Http\Controllers\CardController@createCard')->name('createCard');
    Route::get('used/{type?}', 'App\Http\Controllers\CardController@used')->name('used');
    Route::get('deleteCard/{id?}', 'App\Http\Controllers\CardController@deleteCard')->name('deleteCard');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('login', 'App\Http\Controllers\UserController@login')->name('login');
Route::post('login', 'App\Http\Controllers\UserController@auth')->name('auth');
Route::post('exchange', 'App\Http\Controllers\CardController@exchange')->name('exchange');
