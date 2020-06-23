@extends('layout')
@section('title')
Lista de materias
@endsection
{{-- PARA INGRESAR EL FORMULARIO --}}
@section('content')

<div class="container">
    <h1>@lang('Bienvenido a la lista de materias')</h1>


<table>
    <thead>
        <tr>
            <td> nombre </td>
            <td> Turno </td>
            <td> fecha de Inicio </td>
            <td> fecha Final </td>
        </tr>

    </thead>
    <tbody>
        @foreach ($data as $Itemdata)
        <tr>
           
            <td>{{$Itemdata->nombre}}</td>
            <td>{{$Itemdata->turno}}</td>
            <td>{{$Itemdata->fechaInicio}}</td>
            <td>{{$Itemdata->fechaFinal}}</td>
            <td><button><a href="{{route('materias.getDates', $Itemdata->id)}}">Editar</a></button></td>
            <td><button><a href="{{route('materias.destroy', $Itemdata->id)}}">Eliminar</a></button></td>
        </tr>  
       
        @endforeach
        
    </tbody>
  
</table>


</div>

@endsection