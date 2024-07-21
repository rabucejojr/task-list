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

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
    {{-- <header class="w-full text-black p-4">
        <h1 class="text-2xl font-bold text-center">Task List App</h1>
    </header> --}}

    <main class="w-full max-w-4xl mt-8 p-4 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-gray-800 text-center">@yield('title')</h2>
        <div class="space-y-4">
            @yield('content')
        </div>
    </main>
</body>

</html>
