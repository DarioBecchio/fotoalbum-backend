@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-4">
                <div class="card-header">
                    <h3>{{ $photo->title }}</h3>
                </div>
                <div class="card-body">
                    <img src="{{ asset('storage/' . $photo->image_path) }}" class="img-fluid mb-3" alt="{{ $photo->title }}">
                    <p>{{ $photo->description }}</p>
                    <p><strong>Category:</strong> {{ $photo->category }}</p>
                    <p><strong>Featured:</strong> {{ $photo->featured ? 'Yes' : 'No' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection