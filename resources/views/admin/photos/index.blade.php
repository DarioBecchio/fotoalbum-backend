@extends('layouts.admin')

@section('content')
<div class="container mt-4">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Dashboard Fotografo</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.photos.index', $photos)}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.photos.create', $photos)}}">Aggiungi Foto</a>
          </li>
        </ul>
      </div>
  </nav>
</div> 
  

    @include('partials.errors')
    @include('partials.success')

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <h2>Elenco Foto</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Description</th>
              <th>Photo</th>
              <th>Category</th>
              <th>In evidenza</th>
              <th>Azioni</th>
            </tr>
          </thead>

          <tbody>
            @forelse ($photos as $photo)
            <tr>
              <td>{{$photo->id}}</td>
              <td>{{$photo->title}}</td>
              <td>{{$photo->description}}</td>
              <td>
              @if (Str::startsWith($photo->cover_image, 'https://'))
                <img width="140" height ="100%" src="{{ $photo->image_path }}" alt="">
              @else
                <img width="140" height ="100%" src="{{ asset('storage/' . $photo->image_path) }}" alt="">
              @endif
                </td>
              <td>{{$photo->category?->name}}</td>
              <td>
                @if ($photo->featured_id == 1)
                  <i class="fa fa-star text-warning"></i>
                @elseif ($photo->featured_id == 2)
                  <i class="far fa-circle"></i>
                @else
                @endif
              </td>
              <td>
              
                <a href="{{route('admin.photos.show', $photo)}}" class="btn btn-primary btn-sm mb-1">
                <i class="fas fa-eye"></i>
                  Show
                </a>
                <a href="{{route('admin.photos.edit', $photo)}}" class="btn btn-secondary btn-sm mb-1">
                <i class="fas fa-pencil-alt"></i></i>
                  Edit
                </a>
                <!-- Modal trigger button -->
                <button
                  type="button"
                  class="btn btn-danger btn-small mb-1"
                  data-bs-toggle="modal"
                  data-bs-target="#modalId-{{$photo->id}}"
                >
                <i class="fas fa-trash"></i>
                  Delete
                </button>
                
                <!-- Modal Body -->
                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div
                  class="modal fade"
                  id="modalId-{{$photo->id}}"
                  tabindex="-1"
                  data-bs-backdrop="static"
                  data-bs-keyboard="false"                  
                  role="dialog"
                  aria-labelledby="modalTitle-{{$photo->id}}"
                  aria-hidden="true"
                >
                  <div
                    class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                    role="document"
                  >
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle{{$photo->id}}">
                          Delete photo
                        </h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">You are about to destroy this photo</div>
                      <div class="modal-footer">
                        <button
                          type="button"
                          class="btn btn-secondary"
                          data-bs-dismiss="modal"
                        >
                          Close
                        </button>
                        <form action="{{route('admin.photos.destroy', $photo)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">
                            Confirm
                          </button>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Optional: Place to the bottom of scripts -->
                
                
              </td>
            </tr>
            @empty

            <tr class="">
                <td scope='row' colspan='4'> No records to show </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{$photos->links('pagination::bootstrap-5')}}
@endsection