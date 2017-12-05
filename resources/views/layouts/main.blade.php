<!DOCTYPE html>
<html lang="en">
@include('partials._head')
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
@include('partials._navbar')
<div class="app-body">
    @include('partials._sidebar')
    <main class="main">
    
    @yield('content')
  
       
    </main>
</div>

<footer class="app-footer">
@include('partials._footer')
</footer>
@include('partials._script')
@yield('js')
</body>
</html>