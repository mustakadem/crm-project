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
    return view('home');
})->name('raiz');

/**
 * Rutas de los controladores de la carpeta Auth
 */
Route::post('/register/validate','Auth\RegisterController@validarFetch');
Auth::routes();

/**
 *Rutas del Controlador User
 */
Route::get('/home','UserController@home')->name('user.home')->middleware('auth');
Route::get('home/profile/{user}','UserController@show')->name('user.profile');
Route::get('home/{user}/edit','UserController@edit')->name('user.edit')->middleware('auth');
Route::put('home/{user}/edit','UserController@update')->name('user.update')->middleware('auth');


/**
 * Rutas del Controlador Customer
 */

//Route::get('home/{user}/customers/new','CustomersController@create')->name('customer.new')->middleware('auth');
//Route::post('home/{user}/customers/new','CustomersController@store')->name('customer.store')->middleware('auth');
Route::get('home/{user}/customers/', 'CustomersController@index')->name('customer.home')->middleware('auth');

/**
 * Rutas del Controlador Product
 */
//Route::get('home/{user}/product/{product}','ProductController@index')->name('product.index')->middleware('auth');
//Route::get('home/{user}/product/new','ProductController@create')->name('product.new')->middleware('auth');


