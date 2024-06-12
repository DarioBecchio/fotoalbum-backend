<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Controllers\Controller;
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
        $photos = Photo::all();
        return view ('admin.photos.create',compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        //dd($request->all());
        
        $val_data = $request->validated();
        $image_path = Storage::put('uploads', $request->image_path);
        dd($image_path);
    
        
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
        return view('admin.photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //dd($request->all());

        $val_data = $request->validated();
        //dd($val_data);
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