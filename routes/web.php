<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\BabyController;
use App\Http\Controllers\User\BabyDetailController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\AdminBabyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
    Route::post('addBaby',[AdminBabyController::class,'addData'])->name('admin.addBaby');
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
    Route::get('baby',[BabyController::class,'baby_view']);
});

Route::post('add',[BabyController::class,'addData']);
Route::get('/baby/{id}',[BabyController::class,'retrieveData']);
Route::post('/baby/{id}/add-data',[BabyDetailController::class,'addData']);
// Route::get('dashboards.users.profile',[ProfileController::class,'retrieveData']);