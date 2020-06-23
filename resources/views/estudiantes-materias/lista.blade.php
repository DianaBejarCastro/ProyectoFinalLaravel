@extends('layout')
@section('title')
Lista de Materias Registradas
@endsection
{{-- PARA INGRESAR EL FORMULARIO --}}


@auth
<h3>Bienvenid@ {{auth()->user()->name}} </h3> 
@endauth
@section('content')

@include('partials.session-status')


<div class="container">

    <h1>@lang('Bienvenido a la lista de estudiantes')</h1>


<h4> Buscar</h4>




<table>
    <thead>
        <tr>
           
            <td> nombre </td>
            <td> materia </td>
          
           

        </tr>

    </thead>

      <tbody>


   {{-- comment 
    @foreach ($dataEs as $itemEs)
        @foreach ($dataMa as $Itemdata)
             
               @if($Itemdata->estudiante_id == $itemEs->id){
             <tr>
                <td>{{$itemEs->nombre}}</td>
                <td>{{$Itemdata->materia_id}}</td>       
          </tr> 
           }
           @endif
        @endforeach    
    @endforeach
--}}

@foreach ($data as $itemdata)

     <tr>
                <td>{{$itemdata->nombre}}</td>
                <td>{{$itemdata->materianame}}</td>       
          </tr> 
    
@endforeach


    </tbody>
  
    
</table>

</div>



@endsection
