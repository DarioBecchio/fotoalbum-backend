<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;


class PhotoController extends Controller
{
    public function index(){
        return response()->json([
            'success' => true,
            'results' => Photo::with(['category'])->paginate(),
        ]);
    }

    public function show($id){

        
    
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
        

    }
}