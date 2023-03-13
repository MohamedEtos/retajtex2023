<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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








Auth::routes();



Route::group([ 'middleware'=>'auth'], function(){
    
    Route::get('/index', 'App\Http\Controllers\HomeController@index');
    Route::get('/', 'App\Http\Controllers\HomeController@index');
    Route::get('/home', 'App\Http\Controllers\HomeController@index');

    Route::get('sublimation','App\Http\Controllers\SublimationController@index');
    Route::get('sublimation/create','App\Http\Controllers\SublimationController@create');
    Route::post('sublimation/store','App\Http\Controllers\SublimationController@store')->name('sublimation/store');
    Route::get('viewfile/{cust_name}/{images_name}','App\Http\Controllers\SublimationController@openfile');
    Route::post('sublimation/delete','App\Http\Controllers\SublimationController@destroy');
    Route::get('sublimation/edit_order/{id}','App\Http\Controllers\SublimationController@edit');
    Route::post('sublimation/update','App\Http\Controllers\SublimationController@update');
    Route::get('Operationpermissions','App\Http\Controllers\OperationpermissionsController@index');
    Route::get('Operationpermissions/addOperation/{printer}','App\Http\Controllers\OperationpermissionsController@show');
    Route::post('Operationpermissions/addOperation/store','App\Http\Controllers\OperationpermissionsController@store');
    Route::get('Operationpermissions/print/{id}','App\Http\Controllers\OperationpermissionsController@moveDataToPrint');
    Route::get('Operationpermissions/edit/{id}','App\Http\Controllers\OperationpermissionsController@edit');
    Route::post('Operationpermissions/update','App\Http\Controllers\OperationpermissionsController@update');
    Route::post('Operationpermissions/destroy','App\Http\Controllers\OperationpermissionsController@destroy');
    Route::get('Operationpermissions/print/{id}','App\Http\Controllers\SublimationController@goToAddOrder');
    Route::post('Operationpermissions/storeFrompermissions','App\Http\Controllers\SublimationController@storeFrompermissions');
    Route::get('emps','App\Http\Controllers\EmpsController@index');
    Route::post('emps.create','App\Http\Controllers\EmpsController@create');
    Route::post('commints.store','App\Http\Controllers\CommintsController@store');
    // Route::get('home','App\Http\Controllers\CommintsController@view');
    
});


Route::get('addadmin',function(){
    
    User::create([
        'name'=>'محمد محروس',
        'email'=>'admin@admin.com',
        'password'=>Hash::make('password'),
    ]);
    
    return redirect('/');
    
});






Route::get('/{page}', 'App\Http\Controllers\AdminController@index');