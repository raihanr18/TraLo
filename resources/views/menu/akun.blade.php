@extends('master.master_menu')

@section('title', 'Profil')
    
@section('konten')
<h2 class="text-4xl font-extrabold dark:text-white">Halaman Profil Pengguna</h2>
<hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

<body class="bg-gray-100">

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4 rounded">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <div class="flex items-center mb-4">
            <div class="relative">
                <div id="photo-preview" class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center mr-4">
                    @if ($user->foto)
                        <img src="{{ Storage::url('foto_user/' . basename($user->foto)) }}" alt="Profile Photo" class="w-full h-full rounded-full object-cover">
                    @else
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V4a1 1 0 011-1zm7 2a2 2 0 110 4 2 2 0 010-4zm-1 7h2v2h-2v-2z"></path>
                        </svg>
                    @endif
                </div>
                <input type="file" id="file-upload" name="foto" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)">
            </div>
            <label for="file-upload" class="cursor-pointer flex items-center justify-center w-24 h-24 rounded-full border-2 border-dashed border-green-300 bg-gray-100 hover:bg-gray-200 transition duration-300 ease-in-out">
                <span class="text-gray-500">Pilih Foto</span>
            </label>
        </div>
        

        <div class="relative z-0 mb-6">
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-green-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required />
            <label for="name" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
        </div>

        <div class="relative z-0 mb-6">
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-green-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " required />
            <label for="email" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat Email</label>
        </div>

        <div class="relative z-0 mb-6">
            <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-green-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
            <label for="phone" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor Telepon</label>
        </div>

        <div class="relative z-0 mb-6">
            <input type="password" id="password" name="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-green-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
            <label for="password" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kata Sandi</label>
        </div>

        <div class="relative z-0 mb-6">
            <input type="password" id="password_confirmation" name="password_confirmation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-green-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
            <label for="password_confirmation" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Konfirmasi Kata Sandi</label>
        </div>

        <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ubah Profil</button>
    </form>

@endsection


<script>
    function previewImage(event) {
        const input = event.target;
        const file = input.files[0];
        const preview = document.getElementById('photo-preview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" alt="Profile Photo" class="w-full h-full rounded-full object-cover">`;
            }

            reader.readAsDataURL(file);
        } else {
            // Jika tidak ada file, tampilkan default atau foto lama
            preview.innerHTML = `<svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V4a1 1 0 011-1zm7 2a2 2 0 110 4 2 2 0 010-4zm-1 7h2v2h-2v-2z"></path>
            </svg>`;
        }
    }
</script>
