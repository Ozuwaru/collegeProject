@extends('layoutStarted')
@section('content')
    <h2>Lista de estudiantes</h2>
 



    <table class="table table-hover">
        @csrf
        <thead>
            <tr>
                <th scope="col">Student:</th>
                <th scope="col">Semester:</th>
                <th scope="col">Acción:</th> 

            </tr>
        </thead>
        <tbody>

                
                
            @foreach ($students as $s)
                <tr>


                    <th>{{$s['name']}}</th>

                    <td>{{$s["semester"]}}</td>
    
                    @role('admin|teacher')
                    <td>
                        <div class="col">
                            <a href="{{route('courses.show',['course'=>$s["id"]])}}" class="btn btn-warning" value >Modificar Notas</a>
                             
                           </div>
                    </td>
                    @endrole
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection