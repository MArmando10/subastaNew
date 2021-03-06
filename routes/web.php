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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('/product','ProductController')->middleware('auth');//product.- producto

Route::resource('/offer','OffersController')->middleware('auth'); //offer.- oferta

Route::resource('/subasta','SubastaController')->middleware('auth'); //auction.- subasta

Route::get('/buscar','SubastaController@search')->name('buscar.show')->middleware('auth'); //buscar productos