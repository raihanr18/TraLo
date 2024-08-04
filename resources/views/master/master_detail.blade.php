<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraLo | @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-gray-100 font-urbanist">
    <div class="max-w-full mx-auto p-5 mt-1">
        <div class="fixed top-0 left-0 right-0 bg-white z-10 shadow-md">
            <div class="flex justify-between items-center p-4">
                <a href="@yield('back-link')" class="text-lg text-black font-bold">&larr; Kembali</a>
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-10">
            </div>
        </div>
        <div class="pt-16"> 
            @yield('konten')
        </div>
    </div>
</body>
</html>
