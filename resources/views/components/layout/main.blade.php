<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{$title ?? ''}}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap) Vite loading-->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <!-- Responsive navbar-->
        <main class="" id="main">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="{{route('home')}}">Collection Card</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Services</a></li>

                            @auth
                            <li class="nav-item"><a class="nav-link text-warning" href="">Stuff</a></li>
                            <li class="nav-item"><a class="nav-link text-warning" href="{{route('my-account')}}">My Account</a></li>
                            
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="nav-link text-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                       My Card
                                    </a>
                                    <ul class="dropdown-menu bg-dark bg-gradient">
                                    <li><a class="dropdown-item bg-dark text-warning" href="/card">Loyalty Card</a></li>
                                    <li><a class="dropdown-item bg-dark text-warning" href="#">Smare</a></li>
                                    <li><a class="dropdown-item bg-dark text-warning" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li class="nav-item">
                                    <a class="nav-link text-warning" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                            </form>
                            @else
                            <li class="nav-item"><a class="nav-link text-warning" href="/login">Login</a></li>
                            <li class="nav-item"><a class="nav-link text-warning" href="/register">Register</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
            {{$slot}}
        </main>
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>

        
    </body>
</html>