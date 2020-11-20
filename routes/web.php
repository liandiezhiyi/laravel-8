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



//空间路由
/*
Route::namespace("Admin")->group(function (){
  //  Route::any("/login",[LoginController::class,'login']);
    Route::any('login','LoginController@login');

});
*/



//空间分组路由
Route::namespace('Admin')->prefix('admin')->group(function (){

        Route::any('login','LoginController@login');
        Route::any('login/login','LoginController@login');

        Route::any('login/index','LoginController@index');




        Route::get('index','indexController@index');
});






/*
Route::get('/index', 'UserController@index');
Route::get('/userList', 'UserController@userList');
Route::get('/userAdd', 'UserController@userAdd');
Route::get('/userUpdate', 'UserController@userUpdate');
    */

