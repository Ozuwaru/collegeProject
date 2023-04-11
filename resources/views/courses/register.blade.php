@extends('layoutStarted')
@section('content')
{{$last = NULL;}}
<table class="table table-hover">
    <form  method="POST" action="{{route('courses.store')}}">
        @csrf
        <thead>
            <tr>
                <th scope="col">Course:</th>
                <th scope="col">Section:</th>
                <th scope="col">Available:</th>
                <th scope="col">#:</th>

            </tr>
        </thead>
        <tbody>

                
                
            <tr>
                @foreach ($courses as $course)
                    @if ($course['course']!=$last)
                </tr>
                
                @endif
                

                    <th>{{$course['course']}}</th>
                    <td>{{$course['seccion']}}</td>
                    <td>{{$course['cupos']}}</td>
                    <td><input type="radio" name="{{$course['course']}}" value="{{$course['id']}}" ></td>

                
                
                <?php $last = $course['course']?>

            @endforeach
        </tbody>
    </table>
        <input type="submit" value="Register Courses" class="btn btn-warning">
    </form>
@endsection