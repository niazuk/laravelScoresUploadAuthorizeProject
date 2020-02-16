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

Route::get('/', 'IndexPageController@index')->name('index');

Route::post('/search', 'IndexPageController@search')->name('search');

Auth::routes();

Route::get('/home', 'ScoreController@index')->name('home');

Route::get('/scores', 'ScoreController@create')->name('create');

Route::post('/scores', 'ScoreController@store')->name('store');

Route::post('/scores/{score}', 'ScoreController@edit')->name('edit');

Route::put('/scores/{score}', 'ScoreController@update')->name('update');

Route::delete('/scores/{score}', 'ScoreController@destroy')->name('delete');

Route::post('/search_auth', 'ScoreController@search')->name('search_auth');
