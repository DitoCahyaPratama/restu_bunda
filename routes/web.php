<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/roles', 'PermissionController@Permission');

Route::group(['middleware' => 'role:admin'], function(){
    Route::get('/dashboard', 'HomeController@index');

    Route::resource('/category', 'CategoryController');
    Route::resource('/supply', 'SupplierController');
    Route::resource('/product', 'ProductController');

});