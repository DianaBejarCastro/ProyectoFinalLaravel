@extends('layout')
@section('title')
Editar de materias
@endsection
{{-- PARA INGRESAR EL FORMULARIO --}}
@section('content')
<section class="formulario">


<form name="registroMateriaForm" id="registroMateriaForm" method="POST" action="{{route('materias.edit')}}">
    @csrf

    <input type="hidden" name="id" id="id" value="{{$data->id}}">
    <div>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del estudiante" value="{{$data->nombre}}"/>
       
    </div>
    <div>
        <label for="turno">Turno: </label>
        <select id="turno" name="turno" placeholder="Seleccione el turno de la materia" value="{{$data->turno}}">
            <option value="mañana">Turno-Mañana</option>
            <option value="tarde">Turno-Tarde</option>
            <option value="noche">Turno-Noche</option>
        </select>
    </div>
    <div>
        <label for="fechaInicio">fecha de Inicio: </label>
        <input type="date" name="fechaInicio" id="fechaInicio" placeholder="Seleccione fecha Inicio" value="{{$data->fechaInicio}}"/>
       
    </div>
    <div>
        <label for="fechaFinal">Fecha Final</label>
        <input type="date" name="fechaFinal" id="fechaFinal" placeholder="Seleccione la fecha final"value="{{$data->fechaFinal}}"/>
      
    </div>
    <div>
        <button id="idSubmit" name="idSubmit" type="submit">Editar</button>
    </div>
</form>
</section>
@endsection