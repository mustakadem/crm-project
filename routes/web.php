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
})->name('/home');

/**
 * Rutas de los controladores de la carpeta Auth
 */
Route::post('/register/validate/{dato}','Auth\RegisterController@validateRegister');
Auth::routes();

/**
 *Rutas del Controlador User
 */
Route::get('/home','UserController@home')->name('user.home')->middleware('auth');
Route::get('/home/profile/{user}','UserController@show')->name('user.profile');

Route::get('/home/profile/{user}/edit','UserController@edit')->name('user.edit')->middleware('auth');
Route::get('/home/edit/password','UserController@edit')->name('edit.password')->middleware('auth');
Route::get('/home/edit/avatar','UserController@edit')->name('edit.avatar')->middleware('auth');





/**
 * Rutas del Controlador Customer
 */
    Route::get('/home/{user}/customers/panel','CustomersController@panel')->name('customer.panel');
    Route::get('/home/{user}/customers/list', 'CustomersController@index')->name('customer.list')->middleware('auth');
    Route::get('/home/{user}/customer/new','CustomersController@create')->name('customer.new')->middleware('auth');
    Route::post('/home/{user}/customer/new','CustomersController@store')->name('customer.store')->middleware('auth');
    Route::delete('home/{user}/customer/delete','CustomersController@destroy')->name('customer.delete')->middleware('auth');
    Route::post('/customer/new/validate/{campo}','CustomersController@validateNewCustomer');

/**
 * Rutas del Controlador Product
 */
    Route::get('/home/{user}/products/panel','ProductController@panel')->name('product.panel');
    Route::get('/home/{user}/products/list','ProductController@index')->name('product.list')->middleware('auth');
    Route::get('/home/{user}/products/new','ProductController@create')->name('product.new')->middleware('auth');
    Route::post('/home/{user}/products/new','ProductController@store')->name('product.store')->middleware('auth');
    Route::delete('/home/{user}/products/delete','ProductController@destroy')->name('product.delete')->middleware('auth');



/**
 * Bills Controller
 */

    Route::get('/home/{user}/bills/panel','BillsController@panel')->name('bill.panel');
    Route::get('/home/{user}/bills/list','BillsController@index')->name('bills.list')->middleware('auth');
    Route::get('/home/{user}/bills/new','BillsController@create')->name('bill.new')->middleware('auth');
    Route::post('/home/{user}/bills/new','BillsController@store')->name('bill.store')->middleware('auth');

Route::post('/bill/price','BillsController@price')->name('bill.price')->middleware('auth');


/**
 * Statistics Controller
 */
Route::get('/statistics','StatisticsController@count');


