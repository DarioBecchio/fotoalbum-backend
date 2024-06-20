<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PhotoController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            //dd($request->search);
            return response()->json([
                'success' => true,
                'results' => Photo::with(['category' , 'featured'])->where('title', 'LIKE', '%' . $request->search . '%')->paginate(),
            ]);
        }


        if ($request->has('category')) {
            return response()->json([
            'success' => true,
            'results' => Photo::where('category_id','LIKE', '%' . $request->category . '%')->paginate()
            ]);
        }
        
        if ($request->has('featured')) {
            return response()->json([
            'success' => true,
            'results' => Photo::where('featured_id','LIKE', '%' . $request->featured . '%')->paginate()
            ]);
        }
        
        
        
        
        return response()->json([
            'success' => true,
            'results' => Photo::with(['category','featured'])->paginate(),
        ]);
    }

    public function show($id){

        
    
            $photo = Photo::with(['category','featured'])->where('id' , $id)->first();
            
        
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