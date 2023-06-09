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
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->slug}}</td>
            <td>{{count($item->projects)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>




</div>
 
@endsection