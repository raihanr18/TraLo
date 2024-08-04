<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraLo | @yield('title')</title>
    <style>
        input[type="file"] {
            display: none; 
        }
    </style>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 font-urbanist">
    <!-- component -->
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">
        <div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r">
            <div class="flex items-center justify-center h-14 border-b">
                <img src="{{ asset('storage/foto_user/' . basename($user->foto)) }}" alt="Profile" class="rounded-full w-12 h-12">
                <h4 class="ml-4 text-xl font-semibold">{{ $user->name }}</h4>
            </div>
            <div class="overflow-y-auto overflow-x-hidden flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                        </div>
                    </li>
                    <!-- Other menu items -->
                    <li>
                        <a href="{{ route('dashboard') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent @if(Route::currentRouteName() == 'dashboard') border-green-500 bg-green-100 @else hover:border-green-500 @endif pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Menu Utama</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('tiket.page') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent @if(Route::currentRouteName() == 'tiket.page') border-green-500 bg-green-100 @else hover:border-green-500 @endif pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15h16M4 19h16M4 11h16M4 7h16M10 15l2 2l2-2m-2-2l-2-2m2 2v6"></path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Tiket</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('pesanan.page') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent @if(Route::currentRouteName() == 'pesanan.page') border-green-500 bg-green-100 @else hover:border-green-500 @endif pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l1 4h12l1-4h2m-1 12h-14v-8h14v8z"></path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Pesanan </span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('profile.page') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent @if(Route::currentRouteName() == 'profile.page') border-green-500 bg-green-100 @else hover:border-green-500 @endif pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V4a1 1 0 011-1zm7 2a2 2 0 110 4 2 2 0 010-4zm-1 7h2v2h-2v-2z"></path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Akun</span>
                        </a>
                    </li>
                    
                    <li>
                        <form id="logout-form" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-green-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent pr-6">
                            @csrf
                            <button type="button" class="flex flex-row items-center w-full h-full" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m8 4H3a2 2 0 01-2-2V4a2 2 0 012-2h12a2 2 0 012 2v6"></path>
                                    </svg>
                                </span>
                                <span class="ml-2 text-sm tracking-wide truncate">Keluar</span>
                            </button>
                        </form>
                    </li>
                    
                </ul>
            </div>
        </div>
        
        <!-- Main content -->
        <div class="ml-64 p-6">
            @yield('konten')
        </div>
    </div>

    <!-- Modal -->
    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-green-100 rounded-lg shadow dark:bg-green-800">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6-6m-6 6l6 6m-6-6l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-green-400 w-12 h-12 dark:text-green-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 12v2m0-8v4m-7 0a7 7 0 1114 0 7 7 0 01-14 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-green-500 dark:text-green-400">Apakah kamu yakin ingin keluar?</h3>
                    <div class="flex justify-between">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya, keluar
                            </button>
                        </form>
                        <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak, batalkan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const modalId = button.getAttribute('data-modal-target');
                const modal = document.getElementById(modalId);
                modal.classList.toggle('hidden');
                modal.classList.toggle('flex');
            });
        });

        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', () => {
                const modal = button.closest('.fixed');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        });
    </script>
</body>
</html>
