<!DOCTYPE html>
<html>
<head>
    <title>TraLo | Verifikasi Akun</title>
    
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-urbanist">
    <div class="w-full max-w-md bg-white border border-gray-200 rounded-lg shadow-md p-6">
        <div class="text-center mb-6">
            <a href="{{ route('index') }}" class="block">
                <img src="img/logo.png" alt="Logo" class="mx-auto w-12 h-12">
            </a>
            <h1 class="text-2xl font-semibold text-gray-800">Masukan Kode Verifikasi</h1>
        </div>
        <p class="text-center text-gray-600 mb-6">Kami telah mengirimkan kode verifikasi 6 digit ke alamat email Anda. Masukkan kode di bawah ini untuk memverifikasi akun Anda.</p>
        
        <form id="verification-form" action="{{ route('verify') }}" method="POST" class="flex flex-col items-center space-y-4">
            @csrf
            <div class="flex space-x-2">
                <!-- Verification Code Inputs -->
                <input type="text" id="code1" name="code1" class="w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" maxlength="1" required>
                <input type="text" id="code2" name="code2" class="w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" maxlength="1" required>
                <input type="text" id="code3" name="code3" class="w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" maxlength="1" required>
                <input type="text" id="code4" name="code4" class="w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" maxlength="1" required>
                <input type="text" id="code5" name="code5" class="w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" maxlength="1" required>
                <input type="text" id="code6" name="code6" class="w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" maxlength="1" required>
            </div>
            
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Verifikasi Kode</button>
        </form>
        

        <div class="text-center mt-6">
            <p id="timer" class="timer">Meminta kode baru dalam <span id="time">02:00</span></p>
            <p id="resend-message" class="text-gray-500 mt-2 hidden">Tidak menerima kode? <a href="{{ route('verify') }}" id="resend-link" class="text-blue-500 hover:underline cursor-pointer">Kirim ulang kode</a></p>
        </div>
    </div>

    <script src="js/verification.js"></script>

</body>
</html>
