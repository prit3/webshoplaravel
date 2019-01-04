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

use Illuminate\Support\Facades\Input;
use App\Product;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/profile', function () {
    return view('users.profile');
})->name('profile');


Route::resource('products', 'ProductController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/{searchTerm}/search', 'ProductController@search')->name('search');

// Route::any('/search',function(){
//     $search = Input::get ( 'search' );
//     $products = product::orderBy('created_at', 'desc')->where('name','LIKE','%'.$search.'%')->get();
//     if(count($products) > 0)
//         return view('products.search')->withDetails($products)->withQuery ( $search );
//     else return view ('products.search')->withMessage('No Details found. Try to search again !');
// });
