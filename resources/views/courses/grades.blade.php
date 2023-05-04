@extends('layoutStarted')
@section('content')



<table class="table table-hover">
        @csrf
        <thead>
            <tr>
                <th scope="col">Course:</th>
                <th scope="col">First Cut:</th>
                <th scope="col">Second Cut:</th>
                <th scope="col">Third Cut:</th>
                <th scope="col">Total:</th>

            </tr>
        </thead>
        <tbody>

                
                
            @foreach ($studentData as $course)
                <tr>


                    <th>{{$course[1]['course']}}</th>

                    <td>{{$course[0]["first_cut"]}}</td>
                    <td>{{$course[0]["second_cut"]}}</td>
                    <td>{{$course[0]["third_cut"]}}</td>
                    <td>{{$course[0]["total"]}}</td>
                    <td>
                        <div class="col">
                            <a href="{{route('courses.edit',['course'=>$course[0]["id"]])}}" class="btn btn-warning" value >Modificar</a>
                             
                           </div>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    {{-- @foreach ($studentData as $data)
        <h2>{{$data[1]["course"]}}</h2>
        <h2>{{$data[0]["first_cut"]}}</h2>
        <h2>{{$data[0]["second_cut"]}}</h2>
        <h2>{{$data[0]["third_cut"]}}</h2>
        <?php
            
        ?>
    @endforeach --}}
@endsection