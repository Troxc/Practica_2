<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ProWeb II Sistema</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="d-flex flex-column min-vh-100">

        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-white fw-bold" href="{{ route('cata') }}">CATALOGOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="{{ route('horarios') }}">HORARIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="{{ route('proyectos') }}">PROYECTOS
                                INDIVIDUALES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="#">INSTRUMENTACION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="#">TUTORIAS</a>
                        </li>
                        <li class="nav-item ms-2">
                            <select class="form-select">
                                <option selected>PERIODO</option>
                                <option value="1">ENE-JUN 24</option>
                                <option value="2">AGO-DIC 24</option>
                                <option value="3">ENE-JUN 25</option>
                            </select>
                        </li>
                    </ul>
                    <form class="ms-auto" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger me-3">Log out</button>
                    </form>
                </div>
            </div>
        </nav>



        <div class="container">


            @yield('contenido')


        </div>

        <footer class="bg-primary text-white py-3 mt-auto d-flex justify-content-between">
            @auth
                <div class="d-flex align-items-center">
                    <h3 class="ms-3 mb-0">{{ Auth::user()->name }}</h3>
                    <h3 class="ms-3 mb-0">{{ Auth::user()->email }}</h3>
                </div>
            @endauth
        </footer>
    </div>
    
</body>

</html>
