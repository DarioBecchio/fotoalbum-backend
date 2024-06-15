<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
   public function index(){
        return view('guests.photos.index',['photos'=> Photo::orderByDesc('id')->paginate()]);
   }

   public function show(Photo $photo){
         return view ('guests.photos.show',compact('photo'));
   }
}
