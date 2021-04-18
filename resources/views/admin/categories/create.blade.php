@extends('admin.layouts.master')
@section('content')
<section class='index'>
    <div class="row justify-content-end">
        <div class="col-3 m-2">
            <a href="{{route('categories.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
    <div class="col-10">
  
      @if($errors->any())
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <span class=''>{{$error}}</span><br>
          @endforeach
          </div>
      @endif
      
    </div>
    
</section>
<div class="row justify-content-center">
    <div class="col-10">
        <form method="Post" action="{{route('categories.store')}}">
        <input type="hidden" name="_token" value={{csrf_token()}}>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Nombre</label>
                    <input type="text" name='name' class="form-control" placeholder="Nombre de la categoria" @if(old('name') != null) value="{{ old('name') }}" @endif>
                </div>
            </div>
            <div class="row justify-content-end">
              <button ype="submit" class="btn btn-primary text-right">Guardar</button>
            </div>
        </form>
    </div>
</div>

@endsection
