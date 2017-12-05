<header class="navbar-page">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">STMIK SINAR NUSANTARA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="{{ route('home.welcome') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('home.about') }}">About</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('home.arrival') }}">New Arrival</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('home.news') }}">Library News</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('home.librarian') }}">Librarian</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        </ul>
        <span class="navbar-text">
            Navbar text with an inline element
        </span>
        </div>
    </nav>
</header>