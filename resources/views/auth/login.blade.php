<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        #login-image:hover #welcome-text {
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

    </style>
</head>
<body class="bg-gray-100" style="font-family: 'Poppins', sans-serif;">
    <div class="h-screen w-screen flex items-center justify-center px-4 py-8">
        <div class="max-w-6xl w-full bg-white rounded-[24px] shadow-lg overflow-hidden flex flex-col md:flex-row h-full">
            <!-- Left Side (Background Image with Text) -->
            <div class="hidden md:block w-1/2 flex p-6 items-center justify-center h-full relative">
                <div id="login-image"
                    class="w-full h-full aspect-[9/16] bg-cover bg-center rounded-[20px] transition-all duration-300 relative flex items-center justify-center"
                    style="background-image: url('/images/bglogin-biru.png');">

                    <!-- Teks di Atas Background -->
                    <div id="welcome-text"
                        class="absolute text-white text-center md:text-2xl leading-tight p-6"
                        style="font-family: 'Poppins', sans-serif;">
                        <h2 class="font-bold text-[32px] mb-2">Selamat Datang</h2>
                        <p class="text-[16px]">di Website Pemetaan Penyakit Difteri<br>Kota Surabaya</p>
                    </div>
                </div>
            </div>
            <!-- Right Side (Form Login) -->
            <div class="w-full md:w-1/2 p-20 flex flex-col justify-center">
                <div class="text-left mb-6">
                    <h1 class="text-3xl font-bold text-[#3148A8]">{{ __('Masuk') }}</h1>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- <!-- Username -->
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-[#1B262C]">Username</label>
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus
                            class="w-full mt-1 p-3 border rounded-lg focus:ring focus:ring-blue-300 @error('username') border-red-500 @enderror">
                        @error('username')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-[#1B262C]">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="w-full mt-1 p-3 border rounded-lg focus:ring focus:ring-blue-300 @error('email') border-red-500 @enderror">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-[#1B262C]">Password</label>
                        <input id="password" type="password" name="password" required
                            class="w-full mt-1 p-3 border rounded-lg focus:ring focus:ring-blue-300 @error('password') border-red-500 @enderror">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" id="remember" class="form-checkbox text-blue-600">
                            <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-[#3148A8] hover:underline">Lupa Password?</a>
                        @endif
                    </div>

                    <button type="submit" class="w-full bg-[#3148A8] text-white rounded-lg py-3 hover:bg-[#537FE7]">Masuk</button>
                </form>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')

    <!-- JavaScript untuk Hover Effect -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const imageDiv = document.getElementById("login-image");

            imageDiv.addEventListener("mouseenter", function() {
                imageDiv.style.backgroundImage = "url('/images/bglogin-hover.jpg')";
            });

            imageDiv.addEventListener("mouseleave", function() {
                imageDiv.style.backgroundImage = "url('/images/bgloginbiru (1).png')";
            });
        });

    </script>
</body>
</html>
