<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacebookAuthController;
use Illuminate\Auth\Events\Logout;

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


    //Adding auth guard group to the admin panel.

    Route::group(['middleware' => ['admin']] , function(){

        Route::get('dashboard' , 'AdminController@dashboard');
        Route::get('logout' , 'AdminController@logout');

        // update admin pass and details route
        Route::match(['get' , 'post'] , 'update-admin-password' , 'AdminController@updateAdminPassword');
        
        //check current admin password
        Route::post('check-admin-password' , 'AdminController@checkAdminPassword');
    });
    
});

