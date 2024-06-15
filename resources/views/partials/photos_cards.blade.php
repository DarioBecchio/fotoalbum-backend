
<div class="col">
        <div class="card h-100">
          <a href="{{route('photos.show', $photo)}}">
            @if (Str::startsWith($photo->cover_image, 'https://'))
                <img class="card-img-top" src="{{ $photo->image_path }}" alt="">
              @else
                <img class="card-img-top" src="{{ asset('storage/' . $photo->image_path) }}" alt="">
              @endif
          </a>
              
              <div class="card-body">
                {{$photo->title}}
              </div>
        </div>
</div>