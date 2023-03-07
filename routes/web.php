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


Route::get('addadmin',function(){

    User::create([
        'name'=>'محمد محروس',
        'email'=>'admin@admin.com',
        'password'=>Hash::make('password'),
    ]);

    return redirect('/');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('sublimation','App\Http\Controllers\sublimationController@index');
Route::get('sublimation/create','App\Http\Controllers\sublimationController@create');
Route::post('sublimation/store','App\Http\Controllers\sublimationController@store')->name('sublimation/store');
Route::get('viewfile/{cust_name}/{images_name}','App\Http\Controllers\sublimationController@openfile');
Route::post('sublimation/delete','App\Http\Controllers\sublimationController@destroy');
Route::get('sublimation/edit_order/{id}','App\Http\Controllers\sublimationController@edit');
Route::post('sublimation/update','App\Http\Controllers\sublimationController@update');


Route::get('emps','App\Http\Controllers\empsController@index');
Route::post('emps.create','App\Http\Controllers\empsController@create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{page}', 'App\Http\Controllers\AdminController@index');




