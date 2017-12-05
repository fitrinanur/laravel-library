<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<body class="main_page">
    @include('partials._navbar_page')
    <main class="">
        @yield('content')
    </main>
</div>

<footer class="footer-page fixed-bottom">
    @include('partials._footer_page')
</footer>
@include('partials._script')
</body>
</html>