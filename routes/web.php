<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ControllerDownloadFile;
use App\Http\Controllers\ControllerUploadFile;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\Admin\DashboardController;
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


Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => ['isAdmin'],'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/downloadfile', [ControllerDownloadFile::class, 'index_download'])->name('index_download'); 
     Route::get('/downloadfile/search', [ControllerDownloadFile::class, 'searchdownload'])->name('searchdownload'); 
    Route::get('/user', [ControllerUser::class, 'indexuser'])->name('indexuser'); 
    Route::get('/users', [ControllerUser::class, 'index_users'])->name('index_users'); 
    Route::get('/user/create', [ControllerUser::class, 'create_user'])->name('create_user'); 
    Route::post('/user/store_user/{user}', [ControllerUser::class, 'store_user'])->name('store_user'); 
    Route::get('/user/edit', [ControllerUser::class, 'edit_user'])->name('edit_user'); 
    Route::post('user/update/{user}', [ControllerUser::class, 'update_user'])->name('update_user'); 
    Route::get('users/search', [ControllerUser::class, 'searchuser'])->name('searchuser'); 
    Route::delete('users/delete/{user}', [ControllerUser::class, 'delete_user'])->name('delete_user'); 
   
    //Route::get('/downloadfile/{id}', [ControllerDownloadFile::class, 'download'])->name('download_file');
    Route::get('/downloadfile/{id}', [ControllerDownloadFile::class, 'downloadFile'])->name('download.file');
});
});
    Route::patch('user/{user}', [ControllerUser::class, 'update_profile'])->name('update_profile'); 
    Route::get('/user', [ControllerUser::class, 'index_user'])->name('index_user');
   Route::get('/uploadfile', [ControllerUploadFile::class, 'index_uploadfile'])->name('index-uploadfile');
    Route::get('/uploadfile/create_upload', [ControllerUploadFile::class, 'create_upload'])->name('create_upload'); 
    Route::delete('/uploadfile/delete/{uploadfile}', [ControllerUploadFile::class, 'delete_upload'])->name('delete_upload');
    Route::post('/uploadfile/store_upload', [ControllerUploadFile::class, 'store_upload'])->name('store_upload');
    Route::get('/uploadfile/edit', [ControllerUploadFile::class, 'edit_upload'])->name('edit_upload'); 
    Route::get('/uploadfile/search', [ControllerUploadFile::class, 'searchupload'])->name('searchupload');

Auth::routes();
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
