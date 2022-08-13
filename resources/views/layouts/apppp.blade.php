<html>
    <head>
        <title>
            App - @yield ('title')
        </title>
    </head>
    <body>
        @section('navbar')
        @include('includes.navbar')
        @show
        <div class="container">
            @yield('content')
        </div>
        <div class="container">
            @yield('form')
        </div>
        <div class="container">
            @yield('formm')
        </div>
        <div class="container">
            @yield('delete')
        </div>
    </body>
</html>