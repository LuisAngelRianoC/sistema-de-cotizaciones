<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    {{-- estilos --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM1jI8P9i5cV9y4u2Q9xgNU0s8V8/1P2e9s7tx" crossorigin="anonymous">
    {{-- favicon  --}}
</head>
<body>
    {{-- header --}}
    @yield('contenedor')
    {{-- footer --}}
    {{-- js --}}
</body>
</html>