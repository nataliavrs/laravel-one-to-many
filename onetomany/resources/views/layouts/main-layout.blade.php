<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>One to Many</title>
</head>
<body>
    
    <div class="main-container">
        {{-- header --}}
        @include('components.header')
        {{-- main --}}
        @yield('content')
        {{-- footer --}}
        @include('components.footer')

    </div>
    
</body>
</html>