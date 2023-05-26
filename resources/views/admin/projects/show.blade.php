@extends('layouts.admin')

@section('content')

<h2 class="text-center">Language used: {{$project->type->name ?? 'undefined'}}</h2>

<div class="d-flex py-3">
  @foreach($project->technologies as $item)
    <span class="badge rounded-pill mx-1" style="background-color: {{$item->color}}">{{$item->name}}</span>
  @endforeach
</div>


<div class="container">
  <img src="{{asset ('storage/' . $project->cover_image) }}" alt="fnf">
</div>

<main class="container-fluid text-dark py-4">
  <div class="row justify-content-center">
    <div class="col-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title text-center">{{ $project->title }}</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <strong>Type:</strong> {{ $project->type }}
          </li>
          <li class="list-group-item">
            <strong>Content:</strong> {{ $project->content }}
          </li>
          <li class="list-group-item">
            <strong>Slug:</strong> {{ $project->slug }}
          </li>
        </ul>
        <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-primary">Edit Project</a>
            
            <form method="POST" action="{{route('admin.projects.destroy', ['project' => $project->slug])}}"  class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Confermi di voler cancellare questo elemento dalla libreria? Questa azione non è reversibile')">Delete</button>
            </form>
        </div>

          <a href="{{ route('admin.projects.index')}}" class="btn btn-success">Back to List</a>

        </div>
      </div>
    </div>
  </div>
</main>

@endsection
