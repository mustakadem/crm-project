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
})->name('raiz');

/**
 * Rutas de los controladores de la carpeta Auth
 */
Auth::routes();
Route::post('/register/username','Auth\RegisterController@validarFetch');

/**
 *Rutas del Controlador Home
 */
Route::get('/profile','HomeController@profile')->name('profile')->middleware('auth');




/**
 * Rutas del Controllador Customer
 */
Route::get('/customer/new','CustomersController@create')->name('customer.new')->middleware('auth');
Route::post('/customer/new','CustomersController@store')->name('customer.store');
Route::get('/customers/list', 'CustomersController@list')->name('customer.list')->middleware('auth');
