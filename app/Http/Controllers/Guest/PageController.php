<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index (){
        return view('welcome', ['latest_photos' => Photo::orderby('id')->take(4)->get()]);
    }
}
