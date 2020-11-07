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

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return 'Hello Laravel8!';
});



//Route::get('/user', [UserController::class, 'index']);

Route::get('/index', 'UserController@index');
Route::get('/userList', 'UserController@userList');
Route::get('/userAdd', 'UserController@userAdd');
Route::get('/userUpdate', 'UserController@userUpdate');
