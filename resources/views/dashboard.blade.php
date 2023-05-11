@extends('layoutStarted')
@section('content')

    

        <h2>hola {{$user['name']}}</h2>
        <a href="{{route("student.create")}}">Inscribir: </a>

    
        
@endsection