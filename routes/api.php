<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\dumyApi;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UploadImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnonymousController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WallpaperController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get("data", [dumyApi::class, 'getData']);

// Route::get('devices',[DeviceController::class,'list']);
// Route::post("devices",[DeviceController::class,'add']);
// Route::put("/device/update/{id}",[DeviceController::class,'update']);
// Route::delete("/device/delete/{id}", [DeviceController::class, 'delete']);
// Route::get("/devices/search/{key}",[DeviceController::class, 'search']);

/// using Resource
// Route::apiResource("member", MemberController::class);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource("member", MemberController::class);

    //
    Route::get('devices', [DeviceController::class, 'list']);
    Route::post("devices", [DeviceController::class, 'add']);
    Route::put("/device/update/{id}", [DeviceController::class, 'update']);
    Route::delete("/device/delete/{id}", [DeviceController::class, 'delete']);
    Route::get("/devices/search/{key}", [DeviceController::class, 'search']);
});
// Route::apiResource("member", MemberController::class)->middleware(['middleware' => 'auth:sanctum']);
Route::post("login", [UserController::class, 'index']);
Route::post("register", [UserController::class, 'register']);

Route::post("upload", [FileController::class, 'upload']);


Route::get('anonymous', [AnonymousController::class, 'index']);
Route::post('anonymous', [AnonymousController::class, 'loginAnonymous']);
//show
Route::get('anonymous/{id}', [AnonymousController::class, 'show']);
Route::get('anonymous-by-device/{device_code}', [AnonymousController::class, 'show_by_dive_code']);
//post
Route::get('posts', [PostController::class, 'index']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('posts', [PostController::class, 'store']);
    Route::put('posts/{id}', [PostController::class, 'update']);
    Route::delete('posts/{id}', [PostController::class, 'destroy']);
});
Route::get('posts-by/{user_id}', [PostController::class, 'getByUserId']);
Route::get('posts/{id}', [PostController::class, 'show']);


/// policy
Route::get('policies', [PolicyController::class, 'index']);
Route::get('policy/{id}', [PolicyController::class, 'show']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('policies', [PolicyController::class, 'store']);
    Route::put('policy/{id}', [PolicyController::class, 'update']);
    Route::delete('policy/{id}', [PolicyController::class, 'destroy']);
});

/// category
Route::get('categories', [CategoryController::class, 'index']);
Route::get('category/{id}', [CategoryController::class, 'show']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('categories', [CategoryController::class, 'store']);
    Route::put('category/{id}', [CategoryController::class, 'update']);
    Route::delete('category/{id}', [CategoryController::class, 'destroy']);
});

/// product
Route::get('products', [ProductController::class, 'index']);
Route::get('product/{id}', [ProductController::class, 'show']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('products', [ProductController::class, 'store']);
    Route::put('product/{id}', [ProductController::class, 'update']);
    Route::delete('product/{id}', [ProductController::class, 'destroy']);
});

// upload single image for other app
Route::get('images', [UploadImageController::class, 'index']);
Route::get('image/{id}', [UploadImageController::class, 'show']);
Route::get('image-by-product/{id_product}', [UploadImageController::class, 'getImageByProductId']);
Route::post('images', [UploadImageController::class, 'store']);
Route::put('image/{id}', [UploadImageController::class, 'update']);
Route::delete('image/{id}', [UploadImageController::class, 'destroy']);


/// wallpaper

Route::get('wallpapers', [WallpaperController::class, 'index']);
Route::post('wallpapers', [WallpaperController::class, 'store']);
Route::get('wallpaper/{id}', [WallpaperController::class, 'show']);
Route::put('wallpaper/{id}', [WallpaperController::class, 'update']);
Route::delete('wallpaper/{id}', [WallpaperController::class, 'destroy']);

Route::get('wallpaper-search/{name}', [WallpaperController::class, 'getWallpaperByName']);

Route::get('wallpaper-category/{id_category}', [WallpaperController::class, 'getWallpaperbyCategory']); //


Route::get('wallpaper-same-category/{id}', [WallpaperController::class, 'getWallpaperBySameCategory']);

Route::get('wallpaper-latest', [WallpaperController::class, 'getWallpaperLatest']);
Route::get('wallpaper-common', [WallpaperController::class, 'getWallpaperCommon']);
Route::post('user-like-wallpaper/{id}', [WallpaperController::class, 'user_like_wallpaper']);

Route::get('user-like-wallpapers/{anonymous_id}', [WallpaperController::class, 'list_wallpaper_liked']); // //list wallpaper user liked




// contact
Route::get('contacts', [ContactController::class, 'index']);
Route::post('contacts', [ContactController::class, 'store']);
Route::get('contact/{id}', [ContactController::class, 'show']);
Route::put('contact/{id}', [ContactController::class, 'update']);
Route::delete('contact/{id}', [ContactController::class, 'destroy']);