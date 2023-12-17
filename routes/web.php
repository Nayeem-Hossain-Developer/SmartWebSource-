<?php

use Illuminate\Support\Facades\Route;
// admin
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

//frontend
use App\Http\Controllers\Frontend\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//admin route start
Route::get('admin/login',[AdminAuthController::class,'login'])->name('admin.login');
Route::post('login/post',[AdminAuthController::class,'postLogin'])->name('admin.login.post');

Route::group(['prefix'=>'admin','as'=> 'admin.','middleware'=>'auth:admin'],function(){
    //city controller start
    Route::prefix('city')->as('city.')->controller(CityController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/data','data')->name('data');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/view/{id}','view')->name('view');
    });

});

//frontend route start
Route::get('/',[HomeController::class,'index'])->name('frontend.home');

