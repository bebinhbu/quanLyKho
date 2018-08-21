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
Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    //employee
    Route::get('/showAllEmployee','EmployeeController@showAllEmployee')->name('showAllEmployee');
    Route::post('/insertEmployee','EmployeeController@insert')->name('insertEmployee');
    Route::post('/updateEmployee','EmployeeController@update')->name('updateEmployee');
    Route::get('/deleteEmployee/{id}','EmployeeController@delete')->name('deleteEmployee');
    Route::post('/deleteEmployeeChecked','EmployeeController@deleteChecked')->name('deleteEmployeeChecked');

    //provider
    Route::get('/showAllProvider','ProviderController@showAllProvider')->name('showAllProvider');
    Route::post('/insertProvider','ProviderController@insert')->name('insertProvider');
    Route::post('/updateProvider','ProviderController@update')->name('updateProvider');
    Route::get('/deleteProvider/{id}','ProviderController@delete')->name('deleteProvider');
    Route::post('/deleteProviderChecked','ProviderController@deleteChecked')->name('deleteProviderChecked');

    //customer
    Route::get('/showAllCustomer','CustomerController@showAllCustomer')->name('showAllCustomer');
    Route::post('/insertCustomer','CustomerController@insert')->name('insertCustomer');
    Route::post('/updateCustomer','CustomerController@update')->name('updateCustomer');
    Route::get('/deleteCustomer/{id}','CustomerController@delete')->name('deleteCustomer');
    Route::post('/deleteCustomerChecked','CustomerController@deleteChecked')->name('deleteCustomerChecked');
});
