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
    Route::get('/showAllEmployee','EmployeeController@showAllEmployee')->name('showAllEmployee');
    Route::post('/insertEmployee','EmployeeController@insert')->name('insertEmployee');
    Route::post('/updateEmployee','EmployeeController@update')->name('updateEmployee');
    Route::get('/deleteEmployee/{id}','EmployeeController@delete')->name('deleteEmployee');
    Route::post('/deleteEmployeeChecked','EmployeeController@deleteChecked')->name('deleteEmployeeChecked');
});
