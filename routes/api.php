<?php

use App\Http\Controllers\API\FeaturedController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PhotoController;
use App\Models\Category;
use App\Models\Featured;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Option 1 - basic json response
/*Route::get('photos', function(){
    return Photo::all();
});*/

Route::get('photos',[PhotoController::class , 'index']);
Route::get('photos/{photo}',[PhotoController::class , 'show']);

Route::get('categories',[CategoryController::class , 'index']);
Route::get('categories/{category}',[CategoryController::class , 'show']);

Route::get('featureds',[FeaturedController::class , 'index']);
Route::get('featureds/{featured}',[FeaturedController::class , 'show']);

