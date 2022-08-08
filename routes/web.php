<?php

use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacebookAuthController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);


Route::get('auth/google' , [GoogleAuthController::class,'redirect'])->name('google-auth');

Route::get('auth/google/call-back' , [GoogleAuthController::class,'callbackGoogle']);


Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    

    Route::match(['get','post'] , 'login' , 'AdminController@login');

    Route::get('dashboard' , 'AdminController@dashboard');

});

