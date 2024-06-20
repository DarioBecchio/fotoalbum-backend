@extends('layouts.admin')
@section('content')

<header class="bg-dark text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h1>
        {{ $photo->title }}
        </h1>
        <a class="btn btn-primary" href="{{route('admin.photos.index')}}">
            <i class="fas fa-chevron-left fa-sm fa-fw"></i> All Posts</a>
    </div>
</header>

<div class="container mt-5">
    <h3>{{ $photo->title }}</h3>
    <div class="row">
        <div class="col">
            
            @if (Str::startsWith($photo->image_path, 'https://'))
                <img  loading="lazy" class="card-img-top" src="{{ $photo->image_path }}" alt="{{ $photo->title }}">
            @else
                <img loading="lazy" class="card-img-top" src="{{ asset('storage/' . $photo->image_path) }}" class="img-fluid mb-3" alt="{{ $photo->title }}">
             @endif
        </div>
                <div class="col">
                    <div>
                        <strong>Description:</strong><p  class="my-4">{{ $photo->description }}</p>  
                    </div>    
                    <div>
                        <strong>Category:</strong><p class="my-4">{{ $photo->category ? $photo->category->name : 'Uncategorized' }}</p>                       
                    </div>
                    <div>
                        <strong>Featured:</strong>
                            @if ($photo->featured ? $photo->featured->option : "Unknow")                
                            
                                @if ($photo->featured_id == 1)
                                <i class="fa fa-star text-warning"></i>
                                @elseif ($photo->featured_id == 2)
                                <i class="far fa-circle"></i>
                                @else
                                @endif
                                
                            @endif
                    </div>
                </div>
           
        </div>
    </div>
</div>

@endsection