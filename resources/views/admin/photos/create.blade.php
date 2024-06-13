@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @include('partials.errors')
    
        <h2 class="mb-4">Creazione Nuovo Record Photo</h2>
        <form method="post" action="{{route('admin.photos.store')}}">
        @csrf
            <div class="form-group mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo" >
            </div>
            <div class="form-group mb-3">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione"></textarea>
            </div>
            <div class="form-group mb-3">
            <label for="cover_image" class="form-label">Upload cover image</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="cover image" aria-describedby="coverImageHelper" />
            <div id="coverImageHelper" class="form-text">Upload a cover image for this post</div>
        </div>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
</div>
@endsection