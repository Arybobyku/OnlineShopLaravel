<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user','userController@index')->name('user');
Route::get('/produk','produkController@index')->name('produk');
Route::post('/produk','produkController@store');
Route::Delete('/produk/destroy/{id}','produkController@destroy')->name('produk.destroy');
