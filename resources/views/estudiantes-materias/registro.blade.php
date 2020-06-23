@extends('layout')
@section('title')
Registro Tomar una Materia
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
<form class=" shadow rounded py-3 px-4" name="Estudiante-MateriaForm" id="Estudiante-MateriaForm">
    @csrf

        <h1>@lang('Tomar Materia')</h1>
            <hr>

                <input type="hidden" id="id" name="id" value="{{$data->id}}">
                

        <div class="form-group">
        <label for="ci">Carnet de Identidad: </label>

        <select name="materia" id="materia">

                @foreach ($dataMa as $ItemdataMa)
                <option value="{{$ItemdataMa->id}}">{{$ItemdataMa->nombre}} </option>
                @endforeach
        
            
        </select>

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

        var validator = $('#Estudiante-MateriaForm').validate({
            rules:{
                materia:{
                    required:true,
                },
            },
            messages:{
                materia:{
                    required:"Ingrese ci please",
                },
                
            },
            submitHandler:function(form){
                $.ajax({
                    type: "POST",
                    url: "{{route('estudiantesMateria.store')}}",
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