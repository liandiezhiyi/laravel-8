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

Route::get('/user', 'UserController@index');
Route::get('/user', 'UserController@user');
Route::get('/index', 'TestController@index');
Route::get('/test', 'TestController@test');
