@extends('layout')
@section('title')
Formulario de materias
@endsection
{{-- PARA INGRESAR EL FORMULARIO --}}



@auth
<h3>Bienvenid@ {{auth()->user()->name}} </h3> 
@endauth

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <section class="formulario">


<form class=" shadow rounded py-3 px-4"  name="registroMateriaForm" id="registroMateriaForm" method="POST" action="{{route('materias.store')}}">
    @csrf

    <h1>@lang('Registro Materias')</h1>


    <hr>
    <div  class="form-group">
        <label for="nombre">Nombre: </label>
        <input class="form-control bg-light shadow-sm 
        @error('ci') is-invalid @else border-0 @enderror" 
        type="text"
         name="nombre" 
         id="nombre" 
         placeholder="Ingrese el nombre del estudiante"
          value="{{old('nombre')}}">
        @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>   
            @enderror
    </div>



    <div  class="form-group">

        <label for="turno">Turno: </label>
        <select class="form-control bg-light shadow-sm"
         id="turno" name="turno" placeholder="Seleccione el turno de la materia">
            <option value="mañana">Turno-Mañana</option>
            <option value="tarde">Turno-Tarde</option>
            <option value="noche">Turno-Noche</option>
        </select>
    </div>


    <div  class="form-group">
        <label for="fechaInicio">fecha de Inicio: </label>
        <input class="form-control bg-light shadow-sm
         @error('ci') is-invalid @else border-0 @enderror" 
         type="date"
         name="fechaInicio" 
         id="fechaInicio" 
         placeholder="Seleccione fecha Inicio" 
         value="{{old('fechaInicio')}}">
        @error('fechaInicio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>   
            @enderror
    </div>



    <div  class="form-group">
        <label for="fechaFinal">Fecha Final</label>
        <input class="form-control bg-light shadow-sm 
        @error('ci') is-invalid @else border-0 @enderror" type="date" 
        name="fechaFinal" 
        id="fechaFinal"
        placeholder="Seleccione la fecha final" 
        value="{{old('fechaFinal')}}">
        @error('fechaFinal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>   
            @enderror
    </div>



    <div>
        <button class="btn btn-primary btn-block btn-lg" id="idSubmit" name="idSubmit" type="submit">Registrar</button>
    </div>
</form>
</section>

        </div>
    </div>


</div>
@endsection