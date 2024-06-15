<?php

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

Route::get('photos', function(){
    return response()->json([
        'success' => true,
        'results' => Photo::with(['category'])->paginate(),
    ]);
});

Route::get('photos/{photo}',function ($id){
    
    $photo = Photo::with(['category'])->where('id' , $id)->first();
    

    if ($photo) {
        return response()->json([
            'success'=>true,
            'results'=>$photo
        ]);
    } else {
        return response()->json([
            'success'=>false,
            'results'=>'404 not found'
        ]);
    }
});