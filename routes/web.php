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
     * [middleware]
     */
    Route::get('/home','UserController@home')->name('user.home');
    Route::get('/home/profile/{user}','UserController@show')->name('user.profile');
    Route::get('/edit/data','UserController@edit')->name('user.edit');
    Route::patch('/edit/data','UserController@update');
    Route::get('/edit/password','UserController@edit')->name('edit.password');
    Route::patch('/edit/password','UserController@update');
    Route::get('/edit/avatar','UserController@edit')->name('edit.avatar');


    /**
     * Rutas del Controlador Customer
     * [middleware]
     */
    Route::get('/home/{user}/customers/panel','CustomersController@panel')->name('customer.panel');
    Route::get('/home/{user}/customers/list', 'CustomersController@index')->name('customer.list');
    Route::get('/home/{user}/customers/profile/{customer}', 'CustomersController@show')->name('customer.profile');
    Route::get('/home/{user}/customers/new','CustomersController@create')->name('customer.new');
    Route::post('/home/{user}/customers/new','CustomersController@store')->name('customer.store');
    Route::get('/home/{user}/customers/edit/{customer}','CustomersController@edit')->name('customer.edit');
    Route::put('/customers/edit/{customer}','CustomersController@update')->name('customer.update');
    Route::delete('/customers/delete/{customer}','CustomersController@destroy')->name('customer.delete');

    /**
     * Contacts Controller
     */

    Route::get('/home/{user}/contacts','ContactsController@index')->name('contacts.panel');

    /**
     * Rutas del Controlador Product
     * [middleware]
     */
    Route::get('/home/{user}/products/panel','ProductController@panel')->name('product.panel');
    Route::get('/home/{user}/products/list','ProductController@index')->name('product.list');
    Route::get('/home/{user}/products/profile/{product}','ProductController@show')->name('product.profile');
    Route::get('/home/{user}/products/edit/{product}','ProductController@edit')->name('product.edit');
    Route::put('/home/{user}/products/edit/{product}','ProductController@update')->name('product.update');
    Route::get('/home/{user}/products/new','ProductController@create')->name('product.new');
    Route::post('/home/{user}/products/new','ProductController@store')->name('product.store');
    Route::delete('/home/{user}/products/delete/{product}','ProductController@destroy')->name('product.delete');



    /**
     * Bills Controller
     * [middleware]
     */

    Route::get('/home/{user}/bills/panel','BillsController@panel')->name('bill.panel');
    Route::get('/home/{user}/bills/list','BillsController@index')->name('bills.list');
    Route::get('/home/{user}/bills/new','BillsController@create')->name('bill.new');
    Route::post('/home/{user}/bills/new','BillsController@store')->name('bill.store');
    Route::delete('bills/delete/{bill}','BillsController@destroy')->name('bill.delete');






});

/**
 * Bills Controller
 */
Route::post('/bill/price','BillsController@price')->name('bill.price');


/**
 * Validate Controller
 */

Route::post('/customer/new/validate/{campo}','ValidateController@validateNewCustomer');

Route::post('/product/new/validate/{campo}','ValidateController@validateNewProduct');

Route::post('/bill/new/validate','ValidateController@validateNewBill');



/**
 * Statistics Controller
 */
Route::get('/statistics','StatisticsController@count');


