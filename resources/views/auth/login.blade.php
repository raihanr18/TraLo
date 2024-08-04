<!DOCTYPE html>
<html>
<head>
    <title>Tralo | Login</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

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
            <img src="/img/asset/login.jpg" alt="Login Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-15 flex items-center justify-center">
            </div>

            <!-- Description Text -->
            <div class="absolute bottom-4 left-4 bg-black bg-opacity-50 text-white p-4 rounded-lg">
                <p class="text-sm">Kawah Upas - Bandung</p>
            </div>
        </div>

        <!-- Form Section -->
        <div class="w-full md:w-1/2 h-full flex items-center justify-center bg-white p-8">
            <div class="w-full max-w-sm">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded-lg mb-6 relative">
                        <span onclick="this.parentElement.style.display='none'"
                        class="absolute top-0 right-0 p-2 cursor-pointer">&times;</span>
                        <h3 class="text-xl font-bold">Sukses!</h3>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-6 relative">
                        <span onclick="this.parentElement.style.display='none'"
                        class="absolute top-0 right-0 p-2 cursor-pointer">&times;</span>
                        <h3 class="text-xl font-bold">Error!</h3>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Custom Alert Messages -->
                @if(session('message'))
                    <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                        {{ session('message') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Login Form -->
                <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Silahkan Login</h2>
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <!-- Social Login Button -->
                    <div class="flex items-center justify-center mb-6">
                        <button type="button" class="flex items-center bg-white border border-gray-300 px-24 py-3 rounded-2xl text-gray-800 hover:bg-gray-100">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google Logo" class="w-5 mr-2">
                            Masuk dengan Google
                        </button>
                    </div>
                    
                    <div class="relative flex items-center my-4">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="flex-shrink mx-4 text-gray-600">atau</span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>

                    <!-- Email and Password Inputs -->
                    <div class="relative z-0 mb-4">
                        <input type="text" id="email" name="email" value="{{ old('email') }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="email" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat Email</label>
                    </div>
                    <div class="relative z-0 mb-4">
                        <input type="password" id="password" name="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="password" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        <svg class="toggle-password h-6 w-6 text-gray-600 cursor-pointer js-password-toggle" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        </svg>
                    </div>
                    <!-- Remember Me -->
                    <div class="flex items-center mb-4">
                        <input type="checkbox" id="rememberMe" name="remember" class="mr-2">
                        <label for="rememberMe" class="text-gray-800">Ingat saya</label>
                    </div>
                    <!-- Forgot Password Link -->
                    <a href="{{ route('forgotpassword') }}" class="text-blue-500 hover:underline mb-4 block text-right">Lupa Password?</a>
                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-3 rounded-2xl hover:bg-blue-600">Login</button>
                </form>
                <!-- Create Account Link -->
                <p class="text-center mt-4 text-gray-600">Belum memiliki akun? <a href="{{ route('signup') }}" class="text-blue-500 hover:underline">Buat akun</a></p>
            </div>
        </div>
    </div>

    <script src="js/password-visibility"></script>
</body>
</html>