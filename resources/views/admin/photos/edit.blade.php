@extends('layouts.admin')

@section('content')
<div class="container mt-5">
        <h2 class="mb-4">Modifica {{$photo->title}}</h2>
        <form method="post" action="{{route('admin.photos.update', $photo)}}"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-label" id="title" name="title" placeholder="Inserisci il titolo" value="{{old('title',$photo->title)}}" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione" value="{{old('description',$photo->description)}}"></textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Path Immagine</label>
                <input type="text" class="form-control" id="image_path" name="image_path" placeholder="Inserisci il path dell'immagine"  value="{{old('image_path',$photo->image_path)}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
</div>
@endsection