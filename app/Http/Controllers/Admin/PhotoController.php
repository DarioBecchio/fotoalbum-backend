<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;




class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Photos::orderByDesc('id')->paginate());
        return view('admin.photos.index', ['photos'=>Photo::orderByDesc('id')->paginate(30)]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view ('admin.photos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        //dd($request->all());
        
        $val_data = $request->validated();
        $img_path = Storage::put('uploads', $request->image_path);
        //dd($img_path);
        $val_data['image_path'] = $img_path;
        //dd($val_data);
        
        Photo::create($val_data);
        
        return to_route('admin.photos.index')->with('success', 'Foto creata con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //dd($photo);
        return view('admin.photos.show', compact('photo'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        $categories = Category::all();
        return view('admin.photos.edit', compact('photo', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //dd($request->all());

        $val_data = $request->validated();
        //dd($val_data);

        if($request->has('image_path')){

            if($photo->image_path){
                Storage::delete($photo->image_path);
            }
            $img_path = Storage::put('uploads', $request->image_path);
            //dd($img_path);
            $val_data['image_path'] = $img_path;
        }
        
        $photo->update($val_data);

        return to_route('admin.photos.index')->with('success', 'Foto aggiornata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        return to_route('admin.photos.index')->with('success', 'Foto cancellata correttamente');

    }
}
