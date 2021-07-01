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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('category')->group(function(){
    Route::get('/', 'CategoryController@index')->name('category');
    Route::get('/add', 'CategoryController@add')->name('category.add');
    Route::post('/store', 'CategoryController@store')->name('category.store');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::put('/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/delete/{id}', 'CategoryController@destroy')->name('category.delete');
});
Route::prefix('unit')->group(function(){
    Route::get('/', 'UnitController@index')->name('unit');
    Route::get('/add', 'UnitController@add')->name('unit.add');
    Route::post('/store', 'UnitController@store')->name('unit.store');
    Route::get('/edit/{id}', 'UnitController@edit')->name('unit.edit');
    Route::put('/update/{id}', 'UnitController@update')->name('unit.update');
    Route::get('/delete/{id}', 'UnitController@delete')->name('unit.delete');
});

Route::prefix('products')->group(function(){
    Route::get('/','ProductsController@index')->name('products');
    Route::get('/add','ProductsController@add')->name('products.add');
    Route::post('/store','ProductsController@store')->name('products.store');
    Route::get('/edit/{id}','ProductsController@edit')->name('products.edit');
    Route::put('/update/{id}','ProductsController@update')->name('products.update');
    Route::delete('delete/{id}','ProductsController@destroy')->name('products.delete');
});
