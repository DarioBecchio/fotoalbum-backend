<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Featured;
use Illuminate\Http\Request;

class FeaturedController extends Controller
{
    public function index(Request $request){
        
        if ($request->has('featured')) {
            return response()->json([
            'success' => true,
            'results' => Featured::where('featured_id', $request->featured)->paginate()
        ]);
        }
                       
        return response()->json([
            'success' => true,
            'results' => Featured::all(),
        ]);
    }

    public function show($id){

        
    
            $photo = Featured::with(['featured'])->where('id' , $id)->first();
            
        
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
