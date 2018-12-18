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
})->name('welcome');

Route::get('/view', function () {
    return view('products.view');
})->name('view');

Route::get('/productform', function () {
    return view('products.add');
})->name('productform');

Route::get('/profile', function () {
    return view('users.profile');
})->name('profile');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
