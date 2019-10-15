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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/login', 'HomeController@login')->name('login');
Route::post('/actionLogin', 'HomeController@actionLogin')->name('actionLogin');
Route::get('/notAuthorized', 'HomeController@notAuthorized')->name('notAuthorized');
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', 'HomeController@logout')->name('logout');
    Route::get('/home', 'HomeController@home')->name('home');
});