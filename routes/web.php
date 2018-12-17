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
})->name('home');

Route::get('/view', function () {
    return view('products.view');
})->name('view');

Route::get('/productform', function () {
    return view('products.productform');
})->name('productform');

Route::get('/profile', function () {
    return view('users.profile');
})->name('profile');

Route::get('/Login', function () {
    return view('users.login');
})->name('login');

Route::get('/logout', function () {
    return view('users.logout');
})->name('logout');
