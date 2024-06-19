@extends('layouts.admin')

@section('content')
    
<div class="container mt-5">

    @include('partials.errors')
    @include('partials.success')

        <h2 class="mb-4">Modifica {{$photo->title}}</h2>
        <form method="post" action="{{route('admin.photos.update', $photo)}}"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <div class="mb-3">
                <label for="title">Titolo</label>
                <input type="text" class="form-label" id="title" name="title" placeholder="Inserisci il titolo" value="{{old('title',$photo->title)}}" required>
            </div>

            <div class="mb-3">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione" value="{{old('description',$photo->description)}}"></textarea>
            </div>

            <div class="d-flex gap-3">
                <img width="140" src="{{ asset('storage/' . $photo->image_path) }}" alt="">
                <div class="mb-3">
                    <label for="image_path" class="form-label">Upload cover image</label>
                    <input type="file" class="form-control" name="image_path" id="image_path" placeholder="image_path" aria-describedby="imagePathHelper" value="{{old('image_path')}}"/>
                    <div id="image_path" class="form-text">Upload a cover image for this post</div>
                </div>
            </div>
            
            
            <div class="mb-3">
                <label for="category_id" class="form-label">Photo Category</label>
                <select
                    class="form-select form-select-lg"
                    name="category_id"
                    id="category_id"
                    value=
                
                >
                    <option selected disabled>Select one</option>
                    @foreach($categories as $category)
                    
                    @if ($category->id == null)
                    
                    @elseif(isset($photo->category) && $category->id == $photo->category->id)
                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                    @else
                    <option value="{{$category->id}}" {{ old("category_id", $category) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                    @endif
                    
                    @endforeach
                </select>
            </div>

            <div class="form-check mb-3">
            <label for="featured_id" class="form-label">State</label>
                <select
                    class="form-select form-select-lg"
                    name="featured_id"
                    id="featured_id"
                
                >
                    <option selected>Select one</option>
                    @foreach($featureds as $featured)
                    @if ($featured->id && $photo->featured && $featured->id == $photo->featured->id)
                        <option value="{{ $featured->id }}" selected>{{ $featured->option }}</option>
                    @else
                        <option value="{{ $featured->id }}" {{ old("featured_id") == $featured->id ? 'selected' : '' }}>{{ $featured->option }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
</div>

@endsection