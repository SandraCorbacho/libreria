@extends('admin.layouts.master')
@section('content')
<section class='index'>
    <div class="row justify-content-end">
        <div class="col-3 m-2">
            <a href="{{route('author.create')}}" class="btn btn-primary">Nuevo {{$location}}</a>
        </div>
    </div>
</section>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col" class='text-left'>id</th>
      <th scope="col" class='text-left'>Nombre</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  @foreach($authors as $author)
    <tr>
      <th scope="row" class='text-left'>{{$author->id}}</th>
      <th scope="row" class='text-left'>{{$author->name}}</th>
      
      <th scope="row"><a href="{{route('author.edit', $author->id)}}"><img style='width:20px' src="{{asset('images/icons/pencil.svg')}}" alt=""></a></th>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection