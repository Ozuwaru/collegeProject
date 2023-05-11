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


                    <th>{{$course['name']}}</th>

                    <td>{{$course["fir"]}}</td>
                    <td>{{$course["sec"]}}</td>
                    <td>{{$course["thi"]}}</td>
                    <td>{{$course["total"]}}</td>
                    @role('admin')
                    <td>
                        <div class="col">
                            <a href="{{route('courses.edit',['course'=>$course["id"]])}}" class="btn btn-warning" value >Modificar</a>
                             
                           </div>
                    </td>
                    @endrole
                </tr>

            @endforeach
        </tbody>
    </table>



    {{ $percentage = NULL;}}

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @foreach ($studentData as $course)
                <?php
                    $percentage = ($course['total']*100)/20;
         
                ?>
                <h4>{{$percentage}}</h4>
                
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{$percentage}}%;" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100">{{$percentage}}%</div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- @foreach ($studentData as $data)
        <h2>{{$data[1]["course"]}}</h2>
        <h2>{{$data[0]["first_cut"]}}</h2>
        <h2>{{$data[0]["second_cut"]}}</h2>
        <h2>{{$data[0]["third_cut"]}}</h2>
        <?php
            
        ?>
    @endforeach --}}



@endsection