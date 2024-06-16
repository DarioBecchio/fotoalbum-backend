<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PhotoController extends Controller
{
    public function index(Request $request){
        
        if ($request->has('category')) {
            return response()->json([
            'success' => true,
            'results' => Category::where('category_id', $request->category)->paginate()
        ]);
        }
                       
        return response()->json([
            'success' => true,
            'results' => Category::with(['category'])->paginate(),
        ]);
    }

    public function show($id){

        
    
            $photo = Category::with(['category'])->where('id' , $id)->first();
            
        
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