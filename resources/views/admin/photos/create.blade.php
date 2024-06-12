@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    @include('partials.errors')
    
        <h2 class="mb-4">Creazione Nuovo Record Photo</h2>
        <form method="post" action="{{route('admin.photos.store')}}">
        @csrf
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-label" id="title" name="title" placeholder="Inserisci il titolo" required>
            </div>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione"></textarea>
            </div>
            <div class="form-group">
                <label for="image_path">Path Immagine</label>
                <input type="text" class="form-control" id="image_path" name="image_path" placeholder="Inserisci il path dell'immagine" required>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
</div>
@endsection