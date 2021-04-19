@extends('admin.layouts.master')
@section('content')
<section class='index'>
    <div class="row justify-content-end">
        <div class="col-3 m-2">
            <a href="{{route('book.index')}}" class="btn btn-danger">Cancelar</a>
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
        <form method="Post" action="{{route('book.store')}}">
        <input type="hidden" name="_token" value={{csrf_token()}}>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Nombre</label>
                    <input type="text" name='name' class="form-control" placeholder="Nombre del libro" @if(old('name') != null) value="{{ old('name') }}" @endif>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">IBAN</label>
                    <input type="text" name='iban' class="form-control" placeholder="Iban" @if(old('iban') != null) value="{{ old('iban') }}" @endif>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">pvp</label>
                <input type="decimal" name='pvp' class="form-control" id="inputAddress" placeholder="precio" @if(old('pvp') != null) value="{{ old('pvp') }}" @endif>
            </div>
            <div class="form-group">
                <label for="inputAddress2">pvp_discounted</label>
                <input type="decimal" name='pvp_discount' class="form-control" placeholder="pvp_discounted" @if(old('pvp_discounted') != null) value="{{ old('pvp_discounted') }}" @endif>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">stock</label>
                    <input type="number" name='stock'  class="form-control" @if(old('stock') != null) value="{{ old('stock') }}" @endif>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Autor</label>
                    <select name="author" id="">
                        <option value="">Selecciona un autor</option>
                        @foreach($autores as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-end">
              <button ype="submit" class="btn btn-primary text-right">Guardar</button>
            </div>
        </form>
    </div>
</div>

@endsection
