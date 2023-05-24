@extends('layouts.admin')

@section('content')
  
<div class="container">
    
<h1 class="m-3">Type Controller</h1>




<table class="mt-5 table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Slug</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->slug}}</td>

            {{-- <td class="line-height">
                <div class="d-flex gap-2">
                    <a href="{{route('admin.types.show', $type)}}" class="btn btn-primary">View</a>
                    
                    <a href="{{route('admin.projects.edit', ['project' => $item->slug])}}" class="btn btn-warning">Edit</a>

                    <form method="POST" action="{{route('admin.projects.destroy', ['project' => $item->slug])}}"  class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Confermi di voler cancellare questo elemento dalla libreria? Questa azione non è reversibile')">Delete</button>
                    </form>

                </div>
            </td> --}}


            {{-- <td>
                <a href="{{route('admin.projects.show', $item->slug)}}" class="btn btn-primary btn-sm">
                    <i class="fas fa-search"></i>
                </a>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>




</div>
 
@endsection