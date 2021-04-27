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
});
Route::get('/users', function () {
    return view('welcome');
});
Route::get('/managers', function () {
    return view('managers.managers');
});

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ユーザ認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['show']]);
    Route::resource('managers', 'ManagaersController', ['only' => ['show']]);
    Route::resource('reservations', 'ReservationsController', ['only' => ['store']]);
});
Route::get('reservations', 'ReservationsController@create')->name('Reservation.get'); // 入力フォーム
Route::get('reservations', 'ReservationsController@index')->name('Reservation.index'); 