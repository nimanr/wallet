<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    dd(\Illuminate\Support\Facades\Auth::user());
//    return view('welcome');
//});

Auth::routes(['verify'=>true]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard','UserController@index');

Route::get('/wallets/create', 'WalletController@create')->name('CreateWallet');
Route::post('/wallets', 'WalletController@store');
Route::get('/wallets/{wallet}', 'WalletController@show');

Route::get('/wallets/{wallet}/payments/create', 'PaymentController@create');
Route::post('/wallets/{wallet}/payments', 'PaymentController@store');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

