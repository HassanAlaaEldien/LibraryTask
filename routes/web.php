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


Route::get('/', 'MainController@index')->name('home');
Route::get('/login', 'MainController@loginPage')->name('login');
Route::get('/logout', 'MainController@logout')->name('logout');
Route::post('/login', 'MainController@login')->name('userLogin');

Route::group(['prefix' => 'users'], function () {

    Route::get('/', 'UsersController@index')->name('listUsers');
    Route::get('/create', 'UsersController@create')->name('createUser');
    Route::post('/store', 'UsersController@store')->name('storeUser');

    Route::group(['prefix' => '{user}'], function () {
        Route::get('/', 'UsersController@show')->name('showUser');
        Route::get('/edit', 'UsersController@edit')->name('editUser');
        Route::post('/update', 'UsersController@update')->name('updateUser');
        Route::get('/delete', 'UsersController@destroy')->name('deleteUser');
    });

});