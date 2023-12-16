<?php

use Illuminate\Support\Facades\Route;
// admin
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

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

Route::get('admin/login',[AdminAuthController::class,'login'])->name('admin.login');
Route::post('login/post',[AdminAuthController::class,'postLogin'])->name('admin.login.post');

Route::group(['prefix'=>'admin','as'=> 'admin.','middleware'=>'auth:admin'],function(){
    //city controller start
    Route::prefix('city')->as('city.')->controller(CityController::class)->group(function(){
        Route::get('/','index')->name('index');
    });

});

