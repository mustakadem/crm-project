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
Route::post('/register/validate/{dato}','Auth\RegisterController@validateRegister');
Auth::routes();

/**
 *Rutas del Controlador User
 */
Route::get('/home','UserController@home')->name('user.home')->middleware('auth');
Route::get('/home/profile/{user}','UserController@show')->name('user.profile');
Route::get('/home/{user}/edit','UserController@edit')->name('user.edit')->middleware('auth');
Route::put('/home/{user}/edit','UserController@update')->name('user.update')->middleware('auth');


/**
 * Rutas del Controlador Customer
 */
Route::group(['prefix' => 'home/{user}/customers'],function (){
    Route::get('list', 'CustomersController@index')->name('customer.home')->middleware('auth');
    Route::get('new','CustomersController@create')->name('customer.new')->middleware('auth');
    Route::post('new','CustomersController@store')->name('customer.store')->middleware('auth');
    Route::delete('','CustomersController@destroy')->name('customer.delete')->middleware('auth');
});

Route::get('customers/panel','CustomersController@panel');

/**
 * Rutas del Controlador Product
 */
Route::group(['prefix' => 'home/{user}/products'],function (){
    Route::get('list','ProductController@index')->name('product.list')->middleware('auth');
    Route::get('new','ProductController@create')->name('product.new')->middleware('auth');
    Route::post('new','ProductController@store')->name('product.store')->middleware('auth');
    Route::delete('','ProductController@destroy')->name('product.delete')->middleware('auth');
});



/**
 * Bills Controller
 */
Route::group(['prefix' => 'home/{user}/bills'],function (){
    Route::get('','BillsController@index')->name('bills.list')->middleware('auth');
    Route::get('new','BillsController@create')->name('bill.new')->middleware('auth');
    Route::post('new','BillsController@store')->name('bill.store')->middleware('auth');
});

Route::post('/bill/price','BillsController@price')->name('bill.price')->middleware('auth');


/**
 * Statistics Controller
 */
Route::get('/statistics','StatisticsController@count');


