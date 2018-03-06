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




Route::group(['middleware' => 'auth'], function(){

    /**
     *Rutas del Controlador User
     */
    Route::get('/home','UserController@home')->name('user.home');
    Route::get('/home/profile/{user}','UserController@show')->name('user.profile');

    Route::get('edit/data','UserController@edit')->name('user.edit');
    Route::patch('edit/data','UserController@update');
    Route::get('edit/password','UserController@edit')->name('edit.password');
    Route::patch('edit/password','UserController@update');
    Route::get('edit/avatar','UserController@edit')->name('edit.avatar');


    /**
     * Rutas del Controlador Customer
     */
    Route::get('/home/{user}/customers/panel','CustomersController@panel')->name('customer.panel');
    Route::get('/home/{user}/customers/list', 'CustomersController@index')->name('customer.list');
    Route::get('/home/{user}/customers/profile/{customer}', 'CustomersController@show')->name('customer.profile');
    Route::get('/home/{user}/customer/new','CustomersController@create')->name('customer.new');
    Route::post('/home/{user}/customer/new','CustomersController@store')->name('customer.store');
    Route::delete('home/{user}/customer/delete','CustomersController@destroy')->name('customer.delete');
    Route::post('/customer/new/validate/{campo}','CustomersController@validateNewCustomer');

    /**
     * Contacts Controller
     */

    Route::get('/home/{user}/contacts','ContactsController@index')->name('contacts.panel');

    /**
     * Rutas del Controlador Product
     */
    Route::get('/home/{user}/products/panel','ProductController@panel')->name('product.panel');
    Route::get('/home/{user}/products/list','ProductController@index')->name('product.list');
    Route::get('/home/{user}/products/new','ProductController@create')->name('product.new');
    Route::post('/home/{user}/products/new','ProductController@store')->name('product.store');
    Route::delete('/home/{user}/products/{product}','ProductController@destroy')->name('product.delete');



    /**
     * Bills Controller
     */

    Route::get('/home/{user}/bills/panel','BillsController@panel')->name('bill.panel');
    Route::get('/home/{user}/bills/list','BillsController@index')->name('bills.list');
    Route::get('/home/{user}/bills/new','BillsController@create')->name('bill.new');
    Route::post('/home/{user}/bills/new','BillsController@store')->name('bill.store');

    Route::post('/bill/price','BillsController@price')->name('bill.price');



});




/**
 * Statistics Controller
 */
Route::get('/statistics','StatisticsController@count');


