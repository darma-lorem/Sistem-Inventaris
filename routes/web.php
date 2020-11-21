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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('role:admin')->get('/home', 'HomeController@index')->name('home');
Route::get('/uhome', 'UhomeController@index')->name('uhome');

Route::resource('users', 'UserController');
Route::resource('products', 'ProductController');
Route::get('products/export', 'ProductController@exprot');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');
Route::get('/uprofile', 'UprofileController@index')->name('uprofile');
Route::put('/uprofile', 'UprofileController@update')->name('uprofile.update');
Route::get('/transaksi/export','AmbilproductController@export');
Route::get('/transaksi/destroy/{id}','AmbilproductController@destroy');
Route::resource('transaksi', 'AmbilproductController');
Route::resource('satuan', 'SatuanController');
Route::resource('kategori', 'KategoriController');

Route::get('/about', function () {
    return view('about');
})->name('about');
