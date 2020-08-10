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

Route::resource('/categoria','CategoriaController')->middleware('auth'); //auction.- subasta

Route::any('searchproduct','ProductController@searchproduct')   ->name('product.search')->middleware('auth'); //buscar productos

Route::any('searchsubasta','SubastaController@searchsubasta')   ->name('subasta.search')->middleware('auth'); //buscar subasta

Route::any('searchhome','HomeController@searchhome')            ->name('home.search')->middleware('auth'); //buscar home

Route::get('/showimage','ImageController@showImage')->middleware('auth');

// Route::get('/products/{{categoria}}', 'ProductController@categoria');
