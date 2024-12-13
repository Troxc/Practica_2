<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido al Sistema Administrativo</title>

    @vite(['resources/js/app.js'])
</head>

<body>

    <nav class="navbar sticky-top bg-primary">
        <div class="container-fluid d-flex justify-content-center">
            <h1>BIENVENIDO</h1>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="w-100 w-sm-75 w-md-50 w-lg-25 p-4 rounded">
            <h2 class="text-center mb-3">Proyecto Integrador U3 PROWEB-II</h2>
            <p class="text-center mb-4">Sistema de Gestion :</p>
            <div class="d-flex justify-content-center gap-3">
                <div class="border border-black rounded p-2">
                    <a href="" class="btn btn-secondary">Acerca de...</a>
                    <a href="" class="btn btn-secondary">Contáctanos</a>
                    <a href="" class="btn btn-secondary">Ayuda</a>
                    <a href="{{ route('login') }}" class="btn btn-success">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar sticky-bottom bg-primary">
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand" href="https://styde.net/que-es-composer-y-como-usarlo/" target="_blank">COMPOSER |</a>
            <a class="navbar-brand" href="https://desarrolloweb.com/home/npm" target="_blank">NPM |</a>
            <a class="navbar-brand" href="https://desarrolloweb.com/articulos/laravel-eloquent.html" target="_blank">LARAVEL ELOQUENT |</a>
            <a class="navbar-brand" href="https://dev.to/billiramirez/que-es-vitejs-que-bueno-tiene-para-ofrecer-nap" target="_blank">VITEJS |</a>
            <a class="navbar-brand" href="https://desarrolloweb.com/home/nodejs" target="_blank">NODEJS</a>
        </div>
    </nav>


</body>

</html>
