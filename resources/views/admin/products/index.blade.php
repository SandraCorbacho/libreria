@extends('admin.layouts.master')
@section('content')
<section class='index'>
    <div class="row justify-content-end">
        <div class="col-3 m-2">
            <a href="{{route('book.create')}}" class="btn btn-primary">Nuevo {{$location}}</a>
        </div>
    </div>
</section>

<table class="table">
  <thead class="thead-light">
    <tr>
      
      <th scope="col" class='text-left'>Nombre*</th>
      <th scope="col" class='text-left'>IBAN*</th>
      <th scope="col" class='text-left'>pvp*</th>
      <th scope="col" class='text-center'>pvp_discounted</th>
      <th scope="col" class='text-left'>stock*</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  @foreach($books as $book)
  
    <tr>
      
      <th scope="row" class='text-left'>{{$book->name}}</th>
      <td class='text-left'>{{$book->IBAN}}</td>
      <td class='text-left'>{{$book->pvp}}</td>
      <td class='text-center'>@if($book->pvp_discount != null) {{$book->pvp_discount}} @else -- @endif</td>
      <td class='text-left'>{{$book->stock}}</td>
      <th scope="row"><a href="{{route('book.edit', $book->id)}}"><img style='width:20px' src="{{asset('images/icons/pencil.svg')}}" alt=""></a></th>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection