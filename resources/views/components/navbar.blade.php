<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="{{route('home')}}">Collection Card</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Services</a></li>

                @auth
                <li class="nav-item"><a class="nav-link text-warning" href="">Stuff</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="{{route('my-account')}}">My Account</a></li>

                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link text-warning dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            My Card
                        </a>
                        <ul class="dropdown-menu bg-dark bg-gradient">
                            <li><a class="dropdown-item bg-dark text-warning" href="/card">Loyalty Card</a></li>
                            <li><a class="dropdown-item bg-dark text-warning"
                                    href="{{route('catalogue.index')}}">Catalog</a></li>
                            <li><a class="dropdown-item bg-dark text-warning" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </li>
                <form id="card-manager" action="{{ route('points-manager') }}" method="GET">
                    @csrf
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="{{ route('points-manager') }}"
                            onclick="event.preventDefault(); document.getElementById('card-manager').submit();">
                            Card Manager
                        </a>
                    </li>
                </form>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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