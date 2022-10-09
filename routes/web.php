<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

/*
|--------------------------------------------------------------------------
| login
|--------------------------------------------------------------------------
*/

Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect('/login');
});



Route::get('/login', '\App\Http\Controllers\Auth\AuthController@index')->name('login');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| Admin route
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', '\App\Http\Controllers\AdminController@adminView')->name('admin.view');
});

/*
|--------------------------------------------------------------------------
| User route
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['user']], function () {
    Route::get('/user', '\App\Http\Controllers\userController@userView')->name('user.view');
});



/*
|--------------------------------------------------------------------------
| logout route
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', '\App\Http\Controllers\Auth\LogoutController@perform')->name('logout.perform');
 });

 