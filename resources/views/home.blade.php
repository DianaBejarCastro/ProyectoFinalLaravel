@extends('layout')

@section('content')
    Bienvenido al Home
@endsection

@auth
<h3>Bienvenid@ {{auth()->user()->name}} </h3> 
@endauth

