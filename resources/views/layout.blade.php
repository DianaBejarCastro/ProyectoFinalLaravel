<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

<link rel="stylesheet" href="{{ mix('css/app.css') }}">
  
</head>
<body>

    <div id="app" class="d-flex flex-column h-screen
    justify-content-between">

   
    <nav class="navbar bg-white shadow-sm navbar-expand-lg navbar-light">

        <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"></a>
        {{config('app.name')}}


    <button class="navbar-toggler" type="button" 
    data-toggle="collapse"
    data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" 
    aria-expanded="false" 
    aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav">

            

            <li class="nav-item " >
                <a class="nav-link {{setActive('home')}}" href="{{route('home')}}">Home</a></li>

            <li class="nav-item">
                <a class="nav-link {{setActive('estudiantes.index')}}" href="{{route('estudiantes.index')}}"> Estudiantes</a></li>

          @auth
                <li class="nav-item">
                    <a class="nav-link {{setActive('estudiantes.registro')}} "href="{{route('estudiantes.registro')}}">Registro Estudiantes</a></li>
            @endauth
            
            <li class="nav-item">
                <a class="nav-link {{setActive('materias.index')}}" href="{{route('materias.index')}}">Materias</a></li>

            @auth
                 <li class="nav-item">
                    <a class="nav-link {{setActive('materias.registro')}}" href="{{route('materias.registro')}}">Agregar Materia</a></li>
            @endauth
           
             <li class="nav-item">
                <a class="nav-link {{setActive('est-mat.index')}}" href="{{route('est-mat.index')}}">Materias Tomadas</a></li>

           {{-- comment 
            @auth
                 <li class="nav-item">
                    <a class="nav-link {{setActive('materias.registro')}}" href="{{route('est-mat.index')}}">Registro Materia</a></li>
            @endauth
            
            --}}

            {{-- Si es invitado  --}}
            
        @auth
            <li class="nav-item">
                <a class="nav-link {{setActive('login')}}" href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Cerrar Sesión </a></li>
        @else
            <li class="nav-item">
                <a class="nav-link {{setActive('login')}}" href="{{route('login')}}">Login</a></li>
        @endauth
    
        </ul>
    </div>
    </div>
    </nav>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
        </form>
    @yield('content')

    <footer class="bg-white text-black-50 text-center py-3 shadow">
        {{config('app.name')}} | Copyright @ {{date('Y')}}
    </footer>
 </div>
   

</body>
 <script src="{{mix('js/app.js')}}"></script>
 @stack('js')
</html>