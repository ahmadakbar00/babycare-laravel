<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\User\BabyController;
use App\Http\Controllers\User\BabyDetailController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ReportController;
use App\Http\Controllers\User\ArticleUserController;

// use App\Http\Controllers\Admin\DataTrainingController;
use App\Http\Controllers\Admin\AdminBabyController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\ArticleController;
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

    Route::get('data-training',[AdminController::class,'dataTrainingMenu'])->name('admin.data-training');
    Route::get('addData',[AdminController::class,'addData'])->name('admin.addData');
    Route::post('data-training/add-data-training',[AdminController::class,'addDataTraining'])->name('admin.addData');
    Route::get('data-training/edit-data-training/{id}',[AdminController::class,'dataTraining']);
    Route::post('data-training/update-data-training',[AdminController::class,'updateDataTraining'])->name('admin.editData');
    Route::post('data-training/delete-data',[AdminController::class,'deleteDataTraining'])->name('admin.deleteData');
    
    Route::get('users',[DataUserController::class,'index'])->name('admin.users');
    Route::get('users/edit-data-user/{id}',[AdminController::class,'dataUser']);
    Route::post('data-user/update-data-user',[AdminController::class,'updateDataUser'])->name('admin.editData');
    Route::post('data-user/delete-data',[AdminController::class,'deleteDataUser'])->name('admin.deleteData');
    
    Route::get('article',[ArticleController::class,'index'])->name('admin.article');
    Route::get('article/edit-data-article/{id}',[ArticleController::class,'dataArticle']);
    Route::post('data-article/update-data-article',[ArticleController::class,'updateDataArticle'])->name('admin.data-article.update-data-article');
    Route::post('data-article/delete-data',[ArticleController::class,'deleteDataArticle'])->name('admin.data-article.delete-data');

    Route::post('addArticle',[ArticleController::class,'addArticle'])->name('admin.addArticle');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
    Route::post('addBaby',[AdminBabyController::class,'addData'])->name('admin.addBaby');
   
    // Route::get('/edit-data-training','App\Http\Controllers\Admin\DataTrainingController@editData');

    // admin/article/add-article
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
    // Route::get('babyDetail/baby',[BabyController::class,'baby_view']);
    Route::get('babyDetail',[UserController::class,'babyDetail'])->name('user.babyDetail');
    Route::get('addBaby',[UserController::class,'addBaby'])->name('user.addBaby');
    Route::get('babyDetail/baby/{id}',[BabyController::class,'retrieveData']);
    Route::post('babyDetail/baby/{id}/add-data',[BabyDetailController::class,'addData']);
    Route::post('add',[BabyController::class,'addData']);
    Route::post('baby/add-report/',[ReportController::class,'addData']);
    Route::post('baby/edit-baby/',[BabyController::class,'editBaby']);
    Route::post('baby/delete-baby/',[BabyController::class,'deleteBaby']);
    Route::get('article',[UserController::class,'article'])->name('user.article');
    Route::get('history',[UserController::class,'history'])->name('user.history');
});

// Route::get('dashboards.users.profile',[ProfileController::class,'retrieveData']);