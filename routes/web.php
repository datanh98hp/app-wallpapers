<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomAuthController;
use App\Http\Controllers\Admin\WallpaperController as AdminWallpaperController;


use App\Models\Wallpaper;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AnonymousController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\Admin\CustomAuthController;
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

<<<<<<< HEAD
Route::get('/', function () {
    return redirect('/login');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});


Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');   


Route::middleware(['auth'])->group(function(){

    Route::get('/client-users',[AnonymousController::class,'index']);



    Route::get('/girls',[ProductController::class,'index'])->name('list.girl');
    Route::post('/girls',[ProductController::class,'store'])->name('girl.add');
    
    Route::get('/girls-show/{id}',[ProductController::class,'show'])->name('girl.detail');
    Route::put('/girls-update/{id}',[ProductController::class,'update'])->name('girl.update');
    Route::delete('/girls-del/{id}',[ProductController::class,'destroy'])->name('girl.del');

});

Route::post('/create',[EditorController::class,'store']);
Route::post('/upload',[EditorController::class,'uploadImage'])->name('ckeditor.upload');


=======
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    //
    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store'])->name('category.add');
    Route::post('/category/{id}', [CategoryController::class, 'store'])->name('category.show');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category-del/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    //
    Route::get('/wallpapers-admin', [AdminWallpaperController::class, 'index'])->name('wallpapers.list');
    Route::post('/wallpapers-admin', [AdminWallpaperController::class, 'store'])->name('wallpapers.add');
    Route::put('/wallpapers-admin/{id}', [AdminWallpaperController::class, 'update'])->name('wallpapers.update');
    Route::delete('/wallpapers-del/{id}', [AdminWallpaperController::class, 'destroy'])->name('wallpapers.delete');
});

>>>>>>> 814a31c770cfd3a39ddbd4acb2ea9e63de500532
