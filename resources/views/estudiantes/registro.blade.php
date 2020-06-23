@extends('layout')
@section('title')
Formulario Registro Estudiante
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
<form class=" shadow rounded py-3 px-4" name="registroEstudianteForm" id="registroEstudianteForm">
    @csrf

        <h1>@lang('Registro Estudiantes')</h1>
         <hr>
    <div class="form-group">
        <label for="ci">Carnet de Identidad: </label>
        <input class="form-control bg-light shadow-sm"
        type="text"
         name="ci" 
         id="ci"
          placeholder="Ingrese el carnet de identidad" 
          value="">
           

    </div>

    <div class="form-group">
        <label for="nombre">Nombre: </label>
        <input class="form-control bg-light shadow-sm"
        type="text"
         name="nombre" 
         id="nombre" 
         placeholder="Ingrese el nombre del estudiante" 
         value=""/>
         
    </div>
    <div class="form-group">
        <label for="apellido">Apellido: </label>
        <input class="form-control bg-light shadow-sm "
        type="text" 
        name="apellido" 
        id="apellido"
         placeholder="Ingrese el apellido del estudainte"
          value=""/>
           
    </div>
    <div class="form-group">
        <label for="correo">Correo Electronico: </label>
        <input class="form-control bg-light shadow-sm "
        type="email" 
        name="correo" 
        id="correo" 
        placeholder="Ingrese el correo del estudiante"
        value=""/>
        
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

@push('js')
<script>

    
    $(document).ready(function(){

        var validator = $('#registroEstudianteForm').validate({
            rules:{
                ci:{
                    required:true,
                },
                nombre:{
                    required:true,
                },
                apellido:{
                    required:true,
                },
                correo:{
                    required:true,
                    email:true,
                },
            },
            messages:{
                ci:{
                    required:"Ingrese ci please",
                },
                nombre:{
                    required:"Ingrese nombre please",
                },
                apellido:{
                    required:"Ingrese Apellido por favor",
                },
                correo:{
                    required:"Ingrese su correo electronico por favor ",
                    email:"Ingrese un email valido"
                },


            },
            submitHandler:function(form){
                $.ajax({
                    type: "POST",
                    url: "{{route('estudiantes.store')}}",
                    data: $(form).serialize(),
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                       
                    },
                    error: function(response){
                        console.log(response.responseJSON.errors);
                        $(form).validate().showErrors(response.responseJSON.errors);
                    }
                });
            }

        });
    })
</script>

    
@endpush