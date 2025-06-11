@extends('layouts.user_app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
</head>
<body>
<section id="hero" class="hero-section pt-24 sm:pt-28 md:pt-32 pb-12 sm:pb-16 md:pb-20">
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <div class="flex flex-col-reverse md:flex-row items-center bg-gradient-to-r from-[#3148A8] to-[#3A56C5] rounded-3xl overflow-hidden gap-6 sm:gap-8 p-6 sm:p-8 md:p-12 lg:p-16 shadow-xl">
            <!-- Left Section: Text -->
            <div class="w-full md:w-1/2 text-left md:text-left text-white space-y-4 sm:space-y-5 md:space-y-6">
                <h1 class="text-[48px] sm:text-4xl md:text-5xl lg:text-[3.5rem] font-semibold leading-tight tracking-tight" style="font-family: 'Poppins', sans-serif;">
                    Selamat Datang di <span class="text-[#D9EAFD]">Website Pemetaan</span> Penyakit Difteri
                </h1>
                <p class="text-gray-100 text-[24px] sm:text-lg md:text-xl lg:text-2xl font-medium leading-relaxed" style="font-family: 'Poppins', sans-serif;">
                    Pantau dan cegah penyebaran difteri di Kota Surabaya dengan data akurat dan visualisasi interaktif.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-left md:justify-start mt-6 md:mt-8">
                    <a href="#about" class="inline-block bg-[#D9EAFD] hover:bg-[#86B6F6] text-[#3148A8] hover:text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 text-sm sm:text-base shadow-lg" style="font-family: 'Poppins', sans-serif;">
                        Jelajahi Peta
                    </a>
                    <a href="#prevention" class="inline-block border-2 border-[#D9EAFD] text-[#D9EAFD] hover:bg-[#D9EAFD] hover:text-[#3148A8] font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 text-sm sm:text-base shadow-lg" style="font-family: 'Poppins', sans-serif;">
                        Tips Pencegahan
                    </a>
                </div>

                <div class="pt-4 flex flex-wrap justify-left md:justify-start gap-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#86B6F6]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm sm:text-base">Data Real-time</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-[#86B6F6]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm sm:text-base">Visualisasi Interaktif</span>
                    </div>
                </div>
            </div>

            <!-- Right Section: Image -->
            <div class="w-full md:w-1/2 flex justify-center relative">
                <img src="{{ asset('images/img-hero-difteri (2).png') }}" alt="Ilustrasi Difteri" class="w-full h-auto max-w-xs sm:max-w-md md:max-w-lg lg:max-w-xl object-contain transition-transform duration-500 hover:scale-105">
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#86B6F6] rounded-full opacity-20"></div>
                <div class="absolute -top-4 -left-4 w-16 h-16 bg-[#D9EAFD] rounded-full opacity-20"></div>
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
        <!-- Judul Section -->
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-left mb-8 md:mb-12" style="font-family: 'Poppins', sans-serif;">
            <span class="text-[#3148A8]">Apa Itu</span>
            <span class="text-[#86B6F6]"> Penyakit Difteri?</span>
        </h2>

        <div class="flex flex-col md:flex-row gap-8">
            <!-- Left Column: Image -->
            <div class="w-full md:w-1/2">
                <div class="bg-white rounded-[24px] p-6 shadow-lg h-full">
                    <img src="{{ asset('images/difteri-apaitu.jpg') }}" alt="Ilustrasi Penyakit Difteri" class="w-full h-auto rounded-lg object-cover">
                </div>
            </div>

            <!-- Right Column: Content -->
            <div class="w-full md:w-1/2">
                <div class="bg-white rounded-[24px] p-8 shadow-lg h-full">
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="bg-[#D9EAFD] p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-[#3148A8]" style="font-family: 'Poppins', sans-serif;">Definisi</h3>
                                <p class="text-gray-700 mt-2" style="font-family: 'Poppins', sans-serif;">
                                    Difteri adalah infeksi serius yang disebabkan oleh bakteri <em>Corynebacterium diphtheriae</em>. Penyakit ini terutama menyerang selaput lendir hidung dan tenggorokan, serta dapat melepaskan racun yang berbahaya bagi tubuh.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="bg-[#D9EAFD] p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-[#3148A8]" style="font-family: 'Poppins', sans-serif;">Penularan</h3>
                                <p class="text-gray-700 mt-2" style="font-family: 'Poppins', sans-serif;">
                                    Difteri menyebar melalui:
                                    <ul class="list-disc pl-5 mt-2 space-y-1">
                                        <li>Percikan ludah saat batuk atau bersin (droplet)</li>
                                        <li>Kontak langsung dengan luka terbuka penderita</li>
                                        <li>Barang-barang yang terkontaminasi bakteri</li>
                                    </ul>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="bg-[#D9EAFD] p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-[#3148A8]" style="font-family: 'Poppins', sans-serif;">Masa Inkubasi</h3>
                                <p class="text-gray-700 mt-2" style="font-family: 'Poppins', sans-serif;">
                                    Gejala biasanya muncul 2-5 hari setelah terpapar bakteri, tetapi bisa juga muncul dalam 1-10 hari. Penderita dapat menularkan penyakit hingga 2 minggu tanpa pengobatan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 bg-[#F0F8FF] rounded-lg p-4 border border-[#D9EAFD]">
                        <h4 class="font-bold text-[#3148A8] mb-2" style="font-family: 'Poppins', sans-serif;">Fakta Penting:</h4>
                        <p class="text-sm text-gray-700" style="font-family: 'Poppins', sans-serif;">
                            Difteri termasuk dalam program imunisasi wajib di Indonesia dengan vaksin DPT-HB-Hib. Menurut Kemenkes, kasus difteri di Indonesia menunjukkan peningkatan dalam beberapa tahun terakhir, terutama pada daerah dengan cakupan imunisasi rendah.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Gejala Penyakit Difteri -->
<section id="gejala-difteri" class="py-12 sm:py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <!-- Judul Section -->
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-left mb-8 md:mb-12" style="font-family: 'Poppins', sans-serif;">
            <span class="text-[#3148A8]">Gejala</span>
            <span class="text-[#86B6F6]"> Penyakit Difteri</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Left Column: Symptoms List -->
            <div class="bg-[#F8F8F8] rounded-[24px] p-8 shadow-md">
                <h3 class="text-2xl font-bold text-[#3148A8] mb-6" style="font-family: 'Poppins', sans-serif;">
                    Gejala Umum Difteri
                </h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="bg-[#D9EAFD] p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#3148A8]" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Demam ringan (38°C atau lebih rendah)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="bg-[#D9EAFD] p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#3148A8]" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Sakit tenggorokan dan suara serak</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="bg-[#D9EAFD] p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#3148A8]" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Pembengkakan kelenjar di leher (bull neck)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="bg-[#D9EAFD] p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#3148A8]" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Lapisan abu-abu tebal menutupi tenggorokan dan amandel</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="bg-[#D9EAFD] p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#3148A8]" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Kesulitan bernapas atau menelan</span>
                    </li>
                </ul>
            </div>

            <!-- Right Column: Warning Signs -->
            <div class="bg-[#F8F8F8] rounded-[24px] p-8 shadow-md">
                <h3 class="text-2xl font-bold text-[#3148A8] mb-6" style="font-family: 'Poppins', sans-serif;">
                    Gejala Serius yang Membutuhkan Perhatian Medis
                </h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="bg-[#FFE4E4] p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#FF0000]" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Gangguan pernapasan berat</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="bg-[#FFE4E4] p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#FF0000]" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Detak jantung tidak teratur</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="bg-[#FFE4E4] p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#FF0000]" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Kelumpuhan atau kelemahan otot</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="bg-[#FFE4E4] p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#FF0000]" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Kulit pucat atau kebiruan</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="bg-[#FFE4E4] p-1 rounded-full mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#FF0000]" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="text-gray-700" style="font-family: 'Poppins', sans-serif;">Kebingungan atau penurunan kesadaran</span>
                    </li>
                </ul>

                <div class="mt-8 bg-[#FFF4E5] rounded-lg p-4 border border-[#FFD699]">
                    <h4 class="font-bold text-[#E67E22] mb-2" style="font-family: 'Poppins', sans-serif;">Perhatian!</h4>
                    <p class="text-sm text-gray-700" style="font-family: 'Poppins', sans-serif;">
                        Gejala difteri pada anak-anak mungkin lebih ringan dan mirip dengan flu biasa. Jika anak Anda belum divaksinasi dan menunjukkan gejala-gejala ini, segera konsultasikan ke dokter.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Pengobatan Difteri -->
<section id="pengobatan-difteri" class="py-12 sm:py-16 md:py-20 bg-[#F8F8F8]">
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <!-- Judul Section -->
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-left mb-8 md:mb-12" style="font-family: 'Poppins', sans-serif;">
            <span class="text-[#3148A8]">Pengobatan</span>
            <span class="text-[#86B6F6]"> Penyakit Difteri</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1: Antitoksin -->
            <div class="bg-white rounded-[20px] p-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="bg-[#E6F2FF] p-4 rounded-full w-14 h-14 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#3148A8] mb-3" style="font-family: 'Poppins', sans-serif;">Antitoksin Difteri</h3>
                <p class="text-gray-700" style="font-family: 'Poppins', sans-serif;">
                    Diberikan untuk menetralkan racun difteri yang beredar dalam darah. Harus diberikan segera setelah diagnosis karena antitoksin tidak dapat melawan racun yang sudah terikat dengan sel.
                </p>
            </div>

            <!-- Card 2: Antibiotik -->
            <div class="bg-white rounded-[20px] p-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="bg-[#E6F2FF] p-4 rounded-full w-14 h-14 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#3148A8] mb-3" style="font-family: 'Poppins', sans-serif;">Antibiotik</h3>
                <p class="text-gray-700" style="font-family: 'Poppins', sans-serif;">
                    Biasanya penisilin atau eritromisin untuk membunuh bakteri difteri. Pengobatan antibiotik berlangsung selama 14 hari. Pasien biasanya tidak menular setelah 48 jam pengobatan antibiotik.
                </p>
            </div>

            <!-- Card 3: Perawatan Pendukung -->
            <div class="bg-white rounded-[20px] p-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="bg-[#E6F2FF] p-4 rounded-full w-14 h-14 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#3148A8] mb-3" style="font-family: 'Poppins', sans-serif;">Perawatan Pendukung</h3>
                <p class="text-gray-700" style="font-family: 'Poppins', sans-serif;">
                    Termasuk istirahat total di tempat tidur, isolasi untuk mencegah penularan, pemantauan jantung, dan terapi oksigen jika diperlukan. Pada kasus berat mungkin diperlukan ventilator.
                </p>
            </div>
        </div>

        <!-- Important Note -->
        <div class="mt-12 bg-[#E6F2FF] rounded-[16px] p-6 md:p-8">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                <div class="bg-[#3148A8] p-3 rounded-full flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-[#3148A8] mb-2" style="font-family: 'Poppins', sans-serif;">Penting untuk Diketahui</h3>
                    <p class="text-gray-700" style="font-family: 'Poppins', sans-serif;">
                        Pengobatan difteri harus dimulai segera setelah dicurigai, bahkan sebelum hasil tes laboratorium keluar. Penundaan pengobatan dapat meningkatkan risiko komplikasi serius. Setelah sembuh, pasien tetap perlu mendapatkan vaksinasi karena infeksi difteri tidak memberikan kekebalan seumur hidup.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Pencegahan Difteri -->
<section id="pencegahan-difteri" class="py-12 sm:py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        <!-- Judul Section -->
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-left mb-8 md:mb-12" style="font-family: 'Poppins', sans-serif;">
            <span class="text-[#3148A8]">Pencegahan</span>
            <span class="text-[#86B6F6]"> Penyakit Difteri</span>
        </h2>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column: Vaccination Info -->
            <div class="lg:w-2/3">
                <div class="bg-[#F8F8F8] rounded-[24px] p-8 shadow-lg">
                    <h3 class="text-2xl font-bold text-[#3148A8] mb-6" style="font-family: 'Poppins', sans-serif;">
                        <span class="text-[#86B6F6]">Vaksinasi</span> - Perlindungan Utama
                    </h3>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="bg-[#D9EAFD] p-2 rounded-full flex-shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-[#3148A8]" style="font-family: 'Poppins', sans-serif;">Jadwal Imunisasi Dasar</h4>
                                <ul class="mt-2 space-y-2 text-gray-700" style="font-family: 'Poppins', sans-serif;">
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#3148A8] font-medium">•</span>
                                        <span>DPT-HB-Hib: Usia 2, 3, dan 4 bulan</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#3148A8] font-medium">•</span>
                                        <span>DTwP atau DTaP: Booster pada usia 18 bulan dan 5 tahun</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#3148A8] font-medium">•</span>
                                        <span>Td/Tdap: Remaja (11-12 tahun) dan dewasa (setiap 10 tahun)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="bg-[#D9EAFD] p-2 rounded-full flex-shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-[#3148A8]" style="font-family: 'Poppins', sans-serif;">Efektivitas Vaksin</h4>
                                <p class="mt-2 text-gray-700" style="font-family: 'Poppins', sans-serif;">
                                    Vaksin difteri efektif sekitar 95% dalam mencegah penyakit. Kekebalan menurun seiring waktu, sehingga diperlukan booster setiap 10 tahun. Di Indonesia, vaksin difteri diberikan secara gratis di puskesmas dan posyandu.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="bg-[#D9EAFD] p-2 rounded-full flex-shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-[#3148A8]" style="font-family: 'Poppins', sans-serif;">Efek Samping Vaksin</h4>
                                <p class="mt-2 text-gray-700" style="font-family: 'Poppins', sans-serif;">
                                    Umumnya ringan seperti nyeri di tempat suntikan, demam rendah, atau rewel pada anak. Efek samping serius sangat jarang. Kontraindikasi hanya untuk yang pernah mengalami reaksi alergi berat terhadap dosis sebelumnya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Prevention Tips -->
            <div class="lg:w-1/3">
                <div class="bg-[#3148A8] rounded-[24px] p-8 text-white">
                    <h3 class="text-2xl font-bold mb-6" style="font-family: 'Poppins', sans-serif;">Langkah Pencegahan Lainnya</h3>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="bg-white p-2 rounded-full flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold" style="font-family: 'Poppins', sans-serif;">Hygiene Personal</h4>
                                <p class="mt-2 text-gray-200" style="font-family: 'Poppins', sans-serif;">
                                    Cuci tangan secara teratur dengan sabun, tutup mulut saat batuk/bersin, dan hindari berbagi peralatan makan dengan orang lain.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="bg-white p-2 rounded-full flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold" style="font-family: 'Poppins', sans-serif;">Isolasi Pasien</h4>
                                <p class="mt-2 text-gray-200" style="font-family: 'Poppins', sans-serif;">
                                    Pasien difteri harus diisolasi hingga 2 kali tes usap tenggorokan (dengan interval 24 jam) menunjukkan hasil negatif.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="bg-white p-2 rounded-full flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#3148A8]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold" style="font-family: 'Poppins', sans-serif;">Pemantauan Kontak</h4>
                                <p class="mt-2 text-gray-200" style="font-family: 'Poppins', sans-serif;">
                                    Orang yang kontak erat dengan pasien perlu mendapat antibiotik profilaksis dan pemantauan gejala selama 7 hari.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 bg-[#86B6F6] bg-opacity-20 rounded-lg p-4 border border-[#86B6F6]">
                        <h4 class="font-bold mb-2" style="font-family: 'Poppins', sans-serif;">Info Surabaya</h4>
                        <p class="text-sm text-gray-200" style="font-family: 'Poppins', sans-serif;">
                            Dinas Kesehatan Surabaya menyediakan vaksinasi difteri gratis di seluruh puskesmas. Untuk informasi jadwal, kunjungi situs resmi Dinkes Surabaya atau hubungi call center 112.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

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
