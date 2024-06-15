@extends('layouts.app')

@section('content')
<div class="jumbotron p-5 mb-4 rounded-3" style="background-image: url({{asset('storage/' . $photos[1]->image_path}}); background-size:cover;">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Photos</h1>


        <p class="col-md-8 fs-4">
            These are my amazing photos
        </p>
        <a class="btn btn-outline-dark" href="#photos">
          <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</div>

<section id="photos">
<div class="container mt-4">

    <div class="row row-cols-1 row-cols-sm-3 g-4">
      @forelse ($photos as $photo)
      @include('partials.photos_cards')

      @empty
      <div class="col-12">
       <p>No photos here</p>
      </div>
      @endforelse
    </div>
    {{$photos->links('pagination::bootstrap-5')}}

  </div>
</section>
  
      
@endsection