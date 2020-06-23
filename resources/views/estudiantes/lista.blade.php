@extends('layout')
@section('title')
Lista de estudiantes
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

<form>

<input type="text" name="search" id="search" placeholder="Ingrese dato a buscar">

 <button id="idSubmit" name="idSubmit" type="submit">Buscar</button>



<table>
    <thead>
        <tr>
            <td> ci </td>
            <td> nombre </td>
            <td> apellido </td>
            <td> correo </td>
            @auth
                <td> Editar </td>
            @endauth
             @auth
                <td> Eliminar </td>
            @endauth
             @auth
                <td>Registrar Materia </td>
            @endauth

        </tr>

    </thead>
    <tbody>
        @foreach ($data as $Itemdata)
        <tr>
            <td>{{$Itemdata->ci}}</td>
            <td>{{$Itemdata->nombre}}</td>
            <td>{{$Itemdata->apellido}}</td>
            <td>{{$Itemdata->correo}}</td>
            @auth
                <td><button><a class="btn-list" href="{{route('estudiantes.getDates',$Itemdata->id)}}">Editar</a></button></td>
            @endauth
            @auth
                 <td><button><a class="btn-list" href="{{route('estudiantes.destroy',$Itemdata->id)}}">Eliminar</a></button></td>
            @endauth
            @auth
                 <td><button><a class="btn-list" href="{{route('est-mat.getDates',$Itemdata->id)}}">Materia</a></button></td> 
            @endauth
           
        </tr>  
       
        @endforeach
        
    </tbody>
  
</table>

</div>



@endsection
