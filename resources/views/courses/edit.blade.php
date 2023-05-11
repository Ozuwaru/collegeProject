@extends('layoutStarted')
@section('content')

<form  method="POST" action="{{route('courses.update',['course'=>$course->id])}}">

    @role('escritor')
        <p>Este contenido es para admins</p>
    @endrole
<table class="table table-hover">
    @method('PUT')
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

                
                

                <tr>


                    <th>Cambiar notas:</th>

                    <td> <input type="number" name="first_cut" id="first_cut" value="{{$course["first_cut"]}}"></td>
                    <td> <input type="number" name="second_cut" id="second_cut" value="{{$course["second_cut"]}}"></td>
                    <td> <input type="number" name="third_cut" id="third_cut" value="{{$course["third_cut"]}}"></td>
                    {{-- <td> <input type="number" name="total" id="total" value="{{$course["total"]}}"></td> --}}
 
                    <td>
                        <div class="col">
                            <input type="submit"class="btn btn-warning"  value="Enviar">
                             
                           </div>
                    </td>
                </tr>
        </tbody>
    </table>
  
@endsection