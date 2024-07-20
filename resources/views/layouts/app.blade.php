<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11 Task List App</title>
    @vite('resources/css/app.css')
    @yield('styles')
</head>

<body>
    <h2>@yield('title')</h2>
    <div>
        @yield('content')
    </div>
</body>

</html>
