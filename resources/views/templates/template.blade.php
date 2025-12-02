<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
</head>
<body>
    <div class="flex container">
        {{-- Sidebar --}}
       @if(empty($noChrome))
           @include('templates.sidebar')
       @endif
        <div class="flex flex-col w-full"> 
            {{-- Navbar --}}
            @if(empty($noChrome))
                @include('templates.navbar')
            @endif
        
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>