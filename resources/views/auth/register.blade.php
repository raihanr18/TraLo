<!DOCTYPE html>
<html>
<head>
    <title>TraLo | Sign Up</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center font-urbanist">
    <div class="w-full h-screen flex flex-col md:flex-row">
        <!-- Image Section -->
        <div class="w-full md:w-1/2 h-full overflow-hidden relative">
            <div class="absolute top-2.5 left-2.5 z-10">
                <a href="{{ route('index') }}" class="block">
                    <img src="img/logo.png" alt="Logo" class="h-12 sm:h-16 w-auto brightness-200">
                </a>
            </div>
            <img src="/img/asset/register.jpg" alt="Register Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-15 flex items-center justify-center">
            </div>

            <!-- Description Text -->
            <div class="absolute bottom-4 left-4 bg-black bg-opacity-50 text-white p-4 rounded-lg">
                <p class="text-sm">Pangalengan - Bandung</p>
            </div>
        </div>

        <!-- Register Form Section -->
        <div class="w-full md:w-1/2 h-full flex items-center justify-center bg-white p-8">
            <div class="w-full max-w-sm">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Silahkan Daftar</h2>
                <form method="POST" action="{{ route('signup') }}">
                    @csrf
                    <!-- Social Login Button -->
                    <div class="flex items-center justify-center mb-6">
                        <button type="button" class="flex items-center bg-white border border-gray-300 px-24 py-3 rounded-2xl text-gray-800 hover:bg-gray-100">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo" class="w-5 mr-2">
                            Daftar dengan Google
                        </button>
                    </div>

                    <div class="relative flex items-center my-4">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="flex-shrink mx-4 text-gray-600">atau</span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>
                    
                    <!-- Full Name Input -->
                    <div class="relative z-0 mb-6">
                        <input type="text" id="fullname" name="fullname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                        <label for="fullname" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Lengkap</label>
                    </div>

                    <!-- Email Address Input -->
                    <div class="relative z-0 mb-6">
                        <input type="email" id="email" name="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                        <label for="email" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat Email</label>
                    </div>

                    <!-- Password Input -->
                    <div class="relative z-0 mb-6">
                        <input type="password" id="password" name="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer js-password" placeholder=" ">
                        <label for="password" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        <svg class="toggle-password h-6 w-6 text-gray-600 cursor-pointer js-password-toggle" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        </svg>
                    </div>
                
                    <!-- Confirm Password Input -->
                    <div class="relative z-0 mb-6">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer js-password" placeholder=" ">
                        <label for="password_confirmation" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Konfirmasi Password</label>
                        <svg class="toggle-password h-6 w-6 text-gray-600 cursor-pointer js-password-toggle" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        </svg>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-3 rounded-2xl hover:bg-blue-600">Daftar</button>
                </form>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded-lg mt-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Sign In Link -->
                <p class="text-center mt-4 text-gray-600">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a></p>
            </div>
        </div>
    </div>

    <script src="js/password-visibility.js"></script>
</body>
</html>
