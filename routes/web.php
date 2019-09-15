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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// user 
Route::get('/users', 'UsersController@index')->name('index');

// foods
Route::get('/foods', 'FoodsController@index')->name('index');
Route::get('/foods/create-new', 'FoodsController@create_page')->name('create_page');
Route::post('/foods/create-new', 'FoodsController@save_page')->name('save_page');
Route::get('/foods/update/{foods}', 'FoodsController@update_page')->name('edit');
Route::post('/foods/update/{foods}', 'FoodsController@update_save')->name('edit');
Route::post('/foods/change-image/{foods}', 'FoodsController@change_image')->name('edit');



// Sellings
Route::get('/sellings', 'SellingsController@index')->name('index');
Route::get('/sellings/create-new', 'SellingsController@create_page')->name('create_page');
Route::post('/sellings/create-new', 'SellingsController@save_page')->name('save_page');
Route::post('/sellings/create-new', 'SellingsController@save_page')->name('save_page');
Route::get('/sellings/update/{selling}', 'SellingsController@update_page')->name('edit');
Route::post('/sellings/update/{selling}', 'SellingsController@update_save')->name('edit');
Route::delete('/sellings/delete/{selling}', 'SellingsController@delete')->name('delete');