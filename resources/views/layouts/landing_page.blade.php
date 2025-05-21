@extends('layouts.user_app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
<section id="hero" class="hero-section sm:py-16 md:py-20">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 mt-2 sm:mt-12 md:mt-16 bg-[#3148A8] rounded-[24px]">
        <div class="flex flex-col md:flex-row items-center bg-[#3148A8] rounded-lg overflow-hidden">
            <!-- Left Section: Text -->
            <div class="flex-1 text-center md:text-left text-white p-6 sm:p-8 md:p-10 space-y-4 md:space-y-6">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-semibold" style="font-family: 'Poppins', sans-serif; line-height: 1.2;">
                    Selamat Datang
                </h1>
                <p class="text-white text-lg sm:text-xl md:text-2xl lg:text-3xl font-medium" style="font-family: 'Poppins', sans-serif;">
                    di Website Pemetaan Penyakit Difteri Kota Surabaya
                </p>
                <p class="text-gray-200 text-base sm:text-lg" style="font-family: 'Poppins', sans-serif;">
                    Temukan informasi akurat dan terkini tentang penyakit difteri serta langkah pencegahannya.
                </p>
                <a href="#about" class="inline-block bg-[#D9EAFD] hover:bg-[#86B6F6] text-[#3148A8] hover:text-white font-semibold py-2 px-12 sm:py-3 sm:px-8 rounded-lg transition-all text-sm sm:text-base mt-4 md:mt-6" style="font-family: 'Poppins', sans-serif;">
                    Jelajahi
                </a>
            </div>
            <!-- Right Section: Full Image -->
            <div class="flex-1 flex justify-center mt-8 mb-8">
                <img src="{{ asset('images/herosection.png') }}" alt="Ilustrasi Difteri" class="w-full h-auto max-w-md md:max-w-lg lg:max-w-xl object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Section Informasi Umum -->
<section id="informasi-umum" class="py-12 sm:py-16 md:py-20">
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <!-- Judul Section -->
        <h2 class="text-3xl sm:text-4xl md:text-6xl lg:text-[54px] font-bold text-left mb-8 md:mb-12 relative" style="font-family: 'Poppins', sans-serif;">
            <span class="text-[#3148A8]">Informasi</span>
            <span class="text-[#86B6F6]">Umum</span>
        </h2>

        <!-- Grid untuk Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 md:gap-8">
            <!-- Card 1: Apa itu Penyakit Difteri -->
            <a href="#apa-itu-difteri" class="bg-[#3148A8] rounded-[30px] p-8 sm:p-8 flex flex-col justify-between transition-transform transform hover:scale-105 relative bg-no-repeat" style="background-image: url('images/apa-difteri.png'); background-size: 180px 180px; background-position: bottom right;">
                <div>
                    <h3 class="text-[23px] font-normal text-white" style="font-family: 'Poppins', sans-serif;">
                        Apa itu
                    </h3>
                    <h3 class="text-[30px] font-bold text-white" style="font-family: 'Poppins', sans-serif;">
                        Penyakit Difteri?
                    </h3>
                </div>
                <button class="bg-white text-[#0F4C75] font-semibold py-2 px-6 mt-12 rounded-lg text-sm sm:text-base w-fit" style="font-family: 'Poppins', sans-serif;">
                    Jelajahi
                </button>
            </a>

            <!-- Card 2: Gejala Penyakit Difteri -->
            <a href="#gejala-difteri" class="bg-[#86B6F6] rounded-[30px] p-8 sm:p-8 flex flex-col justify-between transition-transform transform hover:scale-105 relative bg-no-repeat" style="background-image: url('images/yuk-ketahui.png'); background-size: 180px 180px; background-position: bottom right;">
                <div>
                    <h3 class="text-[23px] font-normal text-white" style="font-family: 'Poppins', sans-serif;">
                        Yuk Ketahui
                    </h3>
                    <h3 class="text-[30px] font-bold text-white" style="font-family: 'Poppins', sans-serif;">
                        Gejala Difteri
                    </h3>
                </div>
                <button class="bg-white text-[#0F4C75] font-semibold py-2 px-6 mt-12 rounded-lg text-sm sm:text-base w-fit" style="font-family: 'Poppins', sans-serif;">
                    Jelajahi
                </button>
            </a>

            <!-- Card 3: Pengobatan Difteri -->
            <a href="#pengobatan-difteri" class="bg-[#86B6F6] rounded-[30px] p-8 sm:p-8 flex flex-col justify-between transition-transform transform hover:scale-105 relative bg-no-repeat" style="background-image: url('images/pengobatan-difteri.png'); background-size: 180px 180px; background-position: bottom right;">
                <div>
                    <h3 class="text-[23px] font-normal text-white" style="font-family: 'Poppins', sans-serif;">
                        Bagaimana Cara
                    </h3>
                    <h3 class="text-[30px] font-bold text-white" style="font-family: 'Poppins', sans-serif;">
                        Pengobatannya?
                    </h3>
                </div>
                <button class="bg-white text-[#0F4C75] font-semibold py-2 px-6 mt-12 rounded-lg text-sm sm:text-base w-fit" style="font-family: 'Poppins', sans-serif;">
                    Jelajahi
                </button>
            </a>

            <!-- Card 4: Pencegahan Difteri -->
            <a href="#pencegahan-difteri" class="bg-[#3148A8] rounded-[30px] p-8 sm:p-8 flex flex-col justify-between transition-transform transform hover:scale-105 relative bg-no-repeat" style="background-image: url('images/pencegahan-difteri.png'); background-size: 180px 180px; background-position: bottom right;">
                <div>
                    <h3 class="text-[23px] font-normal text-white" style="font-family: 'Poppins', sans-serif;">
                        Bagaimana Cara
                    </h3>
                    <h3 class="text-[30px] font-bold text-white" style="font-family: 'Poppins', sans-serif;">
                        Pencegahan Difteri?
                    </h3>
                </div>
                <button class="bg-white text-[#0F4C75] font-semibold py-2 px-6 mt-12 rounded-lg text-sm sm:text-base w-fit" style="font-family: 'Poppins', sans-serif;">
                    Jelajahi
                </button>
            </a>
        </div>
    </div>
</section>

<section id="tentang-difteri">
    <!-- Konten tentang difteri, bisa Anda tambahkan sesuai kebutuhan -->
</section>

<!-- Section: Apa Itu Penyakit Difteri -->
<section id="apa-itu-difteri" class="py-12 sm:py-16 md:py-20 bg-[#F8F8F8]">
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <div class="flex flex-col md:flex-row items-center bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Left Section: Image -->
            <div class="flex-1 p-6 sm:p-8">
                <img src="{{ asset('images/apa-difteri-image.png') }}" alt="Ilustrasi Penyakit Difteri" class="w-full h-auto rounded-lg object-cover">
            </div>
            <!-- Right Section: Content -->
            <div class="flex-1 p-6 sm:p-8">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-[#3148A8] mb-4" style="font-family: 'Poppins', sans-serif;">
                    Apa itu Penyakit Difteri?
                </h2>
                <p class="text-lg sm:text-xl md:text-2xl font-medium text-gray-700 mb-6" style="font-family: 'Poppins', sans-serif;">
                    Penyakit difteri adalah infeksi bakteri yang menyerang saluran pernapasan, terutama tenggorokan dan hidung. Penyakit ini dapat menyebabkan kesulitan bernapas dan komplikasi serius seperti gagal jantung atau kelumpuhan. Penyebaran bakteri difteri terjadi melalui percikan udara saat seseorang yang terinfeksi batuk atau bersin.
                </p>
                <p class="text-gray-600 text-base sm:text-lg mb-6" style="font-family: 'Poppins', sans-serif;">
                    Penyakit difteri dapat dicegah melalui vaksinasi. Penting untuk mendapatkan vaksinasi difteri secara teratur sebagai bagian dari program imunisasi untuk melindungi diri dan masyarakat dari penyebaran penyakit ini.
                </p>
                <button class="bg-[#3148A8] text-white font-semibold py-2 px-6 rounded-lg text-sm sm:text-base mt-4" style="font-family: 'Poppins', sans-serif;">
                    Pelajari Lebih Lanjut
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Section: Bagaimana Cara Pengobatannya? -->
<section id="pengobatan-difteri" class="py-12 sm:py-16 md:py-20 bg-[#F0F8FF]">
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <div class="flex flex-col md:flex-row items-center bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Left Section: Image -->
            <div class="flex-1 p-6 sm:p-8">
                <img src="{{ asset('images/pengobatan-difteri.png') }}" alt="Ilustrasi Pengobatan Difteri" class="w-full h-auto rounded-lg object-cover">
            </div>
            <!-- Right Section: Content -->
            <div class="flex-1 p-6 sm:p-8">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-[#3148A8] mb-4" style="font-family: 'Poppins', sans-serif;">
                    Bagaimana Cara Pengobatannya?
                </h2>
                <p class="text-lg sm:text-xl md:text-2xl font-medium text-gray-700 mb-6" style="font-family: 'Poppins', sans-serif;">
                    Pengobatan difteri melibatkan pemberian antibiotik dan antitoksin untuk mengatasi infeksi dan mengurangi kerusakan yang disebabkan oleh racun bakteri. Pasien mungkin juga perlu dirawat di rumah sakit, terutama jika ada komplikasi yang lebih serius.
                </p>
                <p class="text-gray-600 text-base sm:text-lg mb-6" style="font-family: 'Poppins', sans-serif;">
                    Pencegahan infeksi lebih lanjut sangat penting, sehingga vaksinasi dan pemantauan kesehatan secara rutin sangat dianjurkan setelah pengobatan untuk memastikan kesembuhan total.
                </p>
                <button class="bg-[#3148A8] text-white font-semibold py-2 px-6 rounded-lg text-sm sm:text-base mt-4" style="font-family: 'Poppins', sans-serif;">
                    Pelajari Pengobatan Lainnya
                </button>
            </div>
        </div>
    </div>
</section>


{{-- Style CSS --}}
<style>
    h2::after {
        content: "";
        display: block;
        width: 240px; /* Panjang garis */
        height: 8px; /* Ketebalan garis */
        background-color: #3148A8;
        margin-top: 8px; /* Jarak dari teks */
    }
</style>

@endsection
