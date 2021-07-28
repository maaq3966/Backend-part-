<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterAdminController;
use Illuminate\Http\Request;
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


Route::post('/register',[RegisterAdminController::class,"register"]);
Route::post('/login',[RegisterAdminController::class,"login"]);


Route::get('/get-pages', [PageController::class, 'index']);
Route::post('/create-content', [ContentController::class, 'store']);
Route::get('/show-contents', [ContentController::class, 'showContent']);
Route::post('/delete-contents', [ContentController::class, 'deleteContent']);
Route::post('/create-pages', [PageController::class, 'store']);
Route::get('/pages/delete/{id}', [PageController::class, 'destroy']);
Route::put('/pages/{id}', [PageController::class, 'update']);

Route::group(['middleware' => 'auth:sanctum'], function(){

});
