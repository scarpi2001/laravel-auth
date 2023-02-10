<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
    
</head>
<body>
    <div id="app">

        @include('components.header')
        
        <main>
            @include('components.errors')
            @yield('content')
        </main>

        @include('components.footer')
        
    </div>
</body>                 
</html>