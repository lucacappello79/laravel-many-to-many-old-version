@extends('layouts.admin')

@section('content')

<main class="create-main container-fluid text-dark py-4">
  <div class="row justify-content-center">
    <div class="col-6">
      <div class="create-card">
        <div class="card-header">
          <h5 class="card-title mt-3 mb-4 text-center">Edit Project</h5>
        </div>
        <div class="card-body">

          <form class="text-dark" action="{{ route('admin.projects.update', $project->slug) }}" method="POST" class="text-dark">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')  ?? $project->title}}" required>
            
              @error('title')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="type_id" class="form-label">Type_id</label>

              <select id="type_id" name="type_id" class="form-select @error('type_id') is-invalid @enderror">
                <option value="">Undefined</option>

                @foreach ($types as $item)
                  <option value="{{$item->id}}" {{$item->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{$item->name}}</option>   
                @endforeach

              </select>

              @error('type_id')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>


            <div class="my-3 form-group">
              <h2>Technologies</h2>
        
              @foreach($technologies as $item)
              <div class="form-check">
                <input type="checkbox" id="technology-{{$item->id}}" name="technologies[]" value="{{$item->id}}" @checked($project->technologies->contains($item))>
                <label for="technology-{{$item->id}}">{{$item->name}}</label>
              </div>
              @endforeach
        
            </div>











            <div class="mb-3">
              <label for="content" class="form-label">Content</label>
              <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" required>{{old('content')  ?? $project->content}}</textarea>
            
              @error('content')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="type" class="form-label">Type</label>
              <input type="text" id="type" name="type" class="form-control @error('type') is-invalid @enderror" value="{{old('type')  ?? $project->type}}" required>
            
              @error('type')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>

            {{-- <div class="mb-3">
              <label for="src" class="form-label">Link immagine</label>
              <input type="text" id="src" name="src" class="form-control" required>
            </div> --}}

            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug')  ?? $project->slug}}" required>
            
              @error('slug')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            
            </div>

            {{-- <div class="d-grid">
              <button class="btn btn-primary mt-3" type="submit">Edit</button>
            </div> --}}

            <div class="d-flex justify-content-between align-items-center" style="gap: 1rem; max-width: 300px; margin: auto;">
              <button class="btn btn-primary" type="submit">Edit Project</button>
              <button class="btn btn-success" onclick="location.href='{{ route('admin.projects.index')}}'">Back to List</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection