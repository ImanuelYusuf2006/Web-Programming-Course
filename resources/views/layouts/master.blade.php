<!DOCTYPE html>
<html>

    <head>
        <title>@yield('title')</title>
        {{ app('Illuminate\Foundation\Vite')
            (['resources/css/app.css', 'resources/js/app.js']);
        }}
    </head>
    <body>
        @yield('content')
    </body>
</html>
