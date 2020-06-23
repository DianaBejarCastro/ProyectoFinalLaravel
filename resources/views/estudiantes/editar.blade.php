@extends('layout')
@section('title')
Formulario Editar
@endsection
{{-- PARA INGRESAR EL FORMULARIO --}}


@auth
<h3>Bienvenid@ {{auth()->user()->name}} </h3> 
@endauth

@section('content')



<div class="containerForm">
<section class="formulario">
<form name="registroEstudianteForm" id="registroEstudianteForm" method="POST" action="{{route('estudiantes.edit')}}">
    @csrf

    <input type="hidden" name="id" id="id" value="{{$data->id}}">
    
    <div>
        <label for="ci">Carnet de Identidad: </label>
        <input type="text" name="ci" id="ci" placeholder="Ingrese el carnet de identidad" value="{{$data->ci}}"/>
        {!!$errors->first('ci','<br><small class="errorMsg">:message</small>')!!}
    </div>
    <div>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del estudiante" value="{{$data->nombre}}"/>
            {!!$errors->first('nombre','<br><small class="errorMsg">:message</small>')!!}
    </div>
    <div>
        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido" id="apellido" placeholder="Ingrese el apellido del estudainte" value="{{$data->apellido}}"/>
            {!!$errors->first('apellido','<br><small class="errorMsg">:message</small>')!!}
    </div>
    <div>
        <label for="correo">Correo Electronico: </label>
        <input type="email" name="correo" id="correo" placeholder="Ingrese el correo del estudiante" value="{{$data->correo}}"/>
            {!!$errors->first('correo','<br><small class="errorMsg">:message</small>')!!}
    </div>
    <div>
        <button id="idSubmit" name="idSubmit" type="submit">Editar</button>
    </div>
</form>
</section>

</div>
@endsection