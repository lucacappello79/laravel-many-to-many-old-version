@extends('layouts.admin')

@section('content')
  
<div class="container">
    
<h1 class="m-3">Type: {{$type->name}}</h1>


@if (count($type->projects) > 0)

<table class="mt-5 table table-striped">

    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Slug</th>
        </tr>
    </thead>

    <tbody>
        @foreach($type->projects as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->slug}}</td>
        </tr>           
        @endforeach
    </tbody>

</table>
    
@else
    <strong>No project found</strong>
@endif

</div>
@endsection


