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

Route::get('combos_index', 'CombosController@index')->name('combos.index');
Route::get('/', 'CombosController@welcome')->name('welcome');
Route::get('about', 'CombosController@about')->name('about');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ログイン認証
Route::resource('combos', 'CombosController', ['only' => ['store', 'destroy']]);
Route::get('combo_post', 'CombosController@combo_post')->name('combo_post');

Route::group(['prefix' => 'users/{id}'], function () {
    Route::get('/', 'UsersController@adopts_index')->name('users.adopts_index');
    // ログイン認証
    Route::get('edit','UsersController@edit')->name('users.edit');
    Route::post('update', 'UsersController@update')->name('users.update');

    Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    Route::get('favorites_index', 'UsersController@favorites_index')->name('users.favorites_index');
    Route::get('mycombos', 'UsersController@mycombos')->name('users.mycombos_index');
    Route::get('adopts_serch', 'CombosController@adopts_serch')->name('users.adopts_serch');
    Route::get('favorites_index_serch', 'CombosController@favorites_index_serch')->name('users.favorites_serch');
    Route::get('mycombos_serch', 'CombosController@mycombos_serch')->name('users.mycombos_serch');
});

// ログイン認証
Route::group(['prefix' => 'combos/{id}'], function () {
    Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
    Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    Route::post('adopt', 'AdoptsController@store')->name('adopts.adopt');
    Route::delete('unadopt', 'AdoptsController@destroy')->name('adopts.unadopt');
});

Route::get('serch', 'CombosController@serch')->name('combos.serch');