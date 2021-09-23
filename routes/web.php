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

use App\Http\Controllers\CombosController;

Route::get('combos_index', 'CombosController@index')->name('combos.index');
Route::get('/', 'CombosController@welcome')->name('welcome');
Route::get('top', 'CombosController@top_page')->name('top_page');
Route::get('about', 'CombosController@about')->name('about');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
// ログイン認証
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get')->middleware('auth');

// ログイン認証
Route::resource('combos', 'CombosController', ['only' => ['store', 'destroy']])->middleware('auth');
Route::get('combo_post', 'CombosController@combo_post')->name('combo_post')->middleware('auth');

Route::group(['prefix' => 'users/{id}'], function () {
    Route::get('/', 'UsersController@adoptions_index')->name('users.adoptions_index');
    // ログイン認証
    Route::get('edit','UsersController@edit')->name('users.edit')->middleware('auth');
    Route::post('update', 'UsersController@update')->name('users.update')->middleware('auth');

    Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    Route::get('favorites_index', 'UsersController@favorites_index')->name('users.favorites_index');
    Route::get('mycombos', 'UsersController@mycombos')->name('users.mycombos_index');
    Route::get('adoptions_serch', 'SerchController@adoptions_serch')->name('users.adoptions_serch');
    Route::get('favorites_index_serch', 'SerchController@favorites_index_serch')->name('users.favorites_serch');
    Route::get('mycombos_serch', 'SerchController@mycombos_serch')->name('users.mycombos_serch');
});

Route::group(['prefix' => 'combos/{id}'], function () {
    Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite')->middleware('auth');
    Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite')->middleware('auth');
    Route::post('adopt', 'AdoptionsController@store')->name('adoptions.adopt')->middleware('auth');
    Route::delete('unadopt', 'AdoptionsController@destroy')->name('adoptions.unadopt')->middleware('auth');
    Route::get('/', 'CombosController@detail')->name('users.combos.detail');
    Route::post('update', 'CombosController@update')->name('combos.update')->middleware('auth');
    Route::post('report', 'CombosController@report')->name('combos.report')->middleware('auth');
});

Route::get('serch', 'SerchController@serch')->name('combos.serch');