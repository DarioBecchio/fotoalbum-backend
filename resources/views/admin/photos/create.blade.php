@extends('layouts.admin')

@section('content')

<div class="container mt-5">

    @include('partials.errors')
    @include('partials.successs')
    
        <h2 class="mb-4">Creazione Nuovo Record Photo</h2>
        <form method="post" action="{{route('admin.photos.store')}}" enctype="multipart/form-data">
        @csrf
            <div class="form-group mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo" value="{{old('title')}}">
            </div>
            <div class="form-group mb-3">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione" value="{{old('description')}}"></textarea>
            </div>
            <div class="form-group mb-3">
            <label for="image_path" class="form-label">Upload cover image</label>
            <input type="file" class="form-control" name="image_path" id="image_path" placeholder="image_path" aria-describedby="imagePathHelper" value="{{old('image_path')}}"/>
            <div id="image_path" class="form-text">Upload a cover image for this post</div>
        
            <div class="mb-3">
                <label for="category_id" class="form-label">Photo Category</label>
                <select
                    class="form-select form-select-lg"
                    name="category_id"
                    id="category_id"
                
                >
                    <option selected>Select one</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ old("category_id") == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            
        <button type="submit" class="btn btn-primary">Salva</button>
        </form>
</div>
@endsection