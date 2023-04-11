@extends('layoutStarted')
@section('content')


    @if (!$student)
        <h2>hola {{$user['name']}}</h2>
        <a href="{{route("student.create")}}"></a>
    @else
        <h3>Es un estudiante</h3>
    @endif

@endsection