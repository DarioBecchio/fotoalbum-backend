@extends('layouts.admin')
@section('content')

<div class="container mt-5">
    <h3>{{ $photo->title }}</h3>
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                @if (Str::startsWith($photo->image_path, 'https://'))
                    <img loading="lazy" class="card-img-top" src="{{ $photo->image_path }}" alt="{{ $photo->title }}">
                @else
                    <img loading="lazy" class="card-img-top" src="{{ asset('storage/' . $photo->image_path) }}" class="img-fluid mb-3" alt="{{ $photo->title }}">
                @endif
                <div class="card-body">
                    <p>{{ $photo->description }}</p>
                    <div>
                        <strong>Category: </strong>
                        <p class="my-4">{{ $photo->category?->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection