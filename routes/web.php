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


    Route::get('/', function () {
        return view('welcome');
    })->name('/home');
    
    Route::get('/home', 'App\Http\Controllers\HomeController@index');

    Route::get('sublimation','App\Http\Controllers\sublimationController@index');
    Route::get('sublimation/create','App\Http\Controllers\sublimationController@create');
    Route::post('sublimation/store','App\Http\Controllers\sublimationController@store')->name('sublimation/store');
    Route::get('viewfile/{cust_name}/{images_name}','App\Http\Controllers\sublimationController@openfile');
    Route::post('sublimation/delete','App\Http\Controllers\sublimationController@destroy');
    Route::get('sublimation/edit_order/{id}','App\Http\Controllers\sublimationController@edit');
    Route::post('sublimation/update','App\Http\Controllers\sublimationController@update');
    Route::get('Operationpermissions','App\Http\Controllers\OperationpermissionsController@index');
    Route::get('Operationpermissions/addOperation/{printer}','App\Http\Controllers\OperationpermissionsController@show');
    Route::post('Operationpermissions/addOperation/store','App\Http\Controllers\OperationpermissionsController@store');
    Route::get('Operationpermissions/print/{id}','App\Http\Controllers\OperationpermissionsController@moveDataToPrint');
    Route::get('Operationpermissions/edit/{id}','App\Http\Controllers\OperationpermissionsController@edit');
    Route::post('Operationpermissions/update','App\Http\Controllers\OperationpermissionsController@update');
    Route::post('Operationpermissions/destroy','App\Http\Controllers\OperationpermissionsController@destroy');
    Route::get('Operationpermissions/print/{id}','App\Http\Controllers\sublimationController@goToAddOrder');
    Route::post('Operationpermissions/storeFrompermissions','App\Http\Controllers\sublimationController@storeFrompermissions');
    Route::get('emps','App\Http\Controllers\empsController@index');
    Route::post('emps.create','App\Http\Controllers\empsController@create');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    
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