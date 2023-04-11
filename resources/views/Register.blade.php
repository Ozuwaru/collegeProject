@extends('layout')
@section('content')
    
    <form  method="POST" action="{{route('registerF')}}">
    @csrf
    
    <div class="form-group">
        <label for="email">Correo: </label>
        <input type="email" class="form-control" id="email"name="email" placeholder="Ingrese el correo"required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña: </label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Minimo 8 caracteres"required>
    </div>
    
    <div class="form-group" >
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese un nombre" required>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-failure">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
        
    @endif   
        

        <button  class="btn btn-primary" style="margin-top: 10px">Crear</button>

        
    </form>
@endsection

