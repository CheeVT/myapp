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




Route::get('/login', 'UsersController@loginShow')->name('login');
Route::post('/login', 'UsersController@loginAction')->name('loginAction');
Route::get('/logout', 'UsersController@logout')->name('logout');
Route::get('/register', 'UsersController@registerShow')->name('register');
Route::post('/register', 'UsersController@registerAction')->name('registerAction');
Route::get('/', 'HomeController@index')->name('home');
