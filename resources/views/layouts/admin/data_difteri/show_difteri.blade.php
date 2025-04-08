@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-12">
    <!-- Card with dynamic width and gradient -->
    <div class="max-w-4xl mx-auto bg-gradient-to-br from-[#3148A8] to-[#1E2C67] p-12 rounded-2xl shadow-xl text-white">
        <div class="flex items-center justify-between mb-8">
            <!-- Button Kembali -->
            <a href="{{ route('data-difteri.index') }}" class="text-white text-2xl hover:text-gray-300 transition duration-300">
                <i class="fas fa-chevron-left"></i>
            </a>
            <h1 class="text-4xl font-extrabold text-center flex-grow">Detail Data Difteri</h1>
        </div>

        <!-- Wrapper with white background for details -->
        <div class="bg-white p-8 rounded-2xl shadow-md text-[#1E2C67]">
            <!-- Overview Section with Icons -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-6">
                <!-- Nama Kecamatan -->
                <div class="flex items-center gap-3">
                    <i class="fas fa-map-marker-alt text-[#3148A8] text-2xl sm:text-3xl"></i>
                    <div>
                        <h2 class="text-lg font-semibold text-[#3148A8]">Nama Kecamatan</h2>
                        <p class="text-gray-600">{{ $dataDifteri->kecamatan->nama_kecamatan }}</p>
                    </div>
                </div>

                <!-- Tahun Kejadian -->
                <div class="flex items-center gap-3">
                    <i class="fas fa-calendar-alt text-[#3148A8] text-2xl sm:text-3xl"></i>
                    <div>
                        <h2 class="text-lg font-semibold text-[#3148A8]">Tahun Kejadian</h2>
                        <p class="text-gray-600">{{ $dataDifteri->tahun->tahun_kejadian }}</p>
                    </div>
                </div>
            </div>

            <!-- Statistics Section with Progress Bar and Icons -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-6">
                <!-- Jumlah Kepadatan -->
                <div class="flex items-center gap-3">
                    <i class="fas fa-users text-[#3148A8] text-2xl sm:text-3xl"></i>
                    <div>
                        <h2 class="text-lg font-semibold text-[#3148A8]">Jumlah Kepadatan Penduduk</h2>
                        <p class="text-gray-600">{{ number_format($dataDifteri->jml_kepadatan) }}</p>
                    </div>
                </div>

                <!-- Jumlah Rumah Tidak Sehat -->
                <div class="flex items-center gap-3">
                    <i class="fas fa-home text-[#3148A8] text-2xl sm:text-3xl"></i>
                    <div>
                        <h2 class="text-lg font-semibold text-[#3148A8]">Jumlah Rumah Tidak Sehat</h2>
                        <p class="text-gray-600">{{ number_format($dataDifteri->jml_rumah_tidak_sehat) }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-6">
                <!-- Jumlah Vaksinasi DPT -->
                <div class="flex items-center gap-3">
                    <i class="fas fa-syringe text-[#3148A8] text-2xl sm:text-3xl"></i>
                    <div>
                        <h2 class="text-lg font-semibold text-[#3148A8]">Jumlah Vaksinasi DPT</h2>
                        <p class="text-gray-600">{{ number_format($dataDifteri->jml_vaksinasi_dpt) }}</p>
                    </div>
                </div>

                <!-- Jumlah Kasus Difteri -->
                <div class="flex items-center gap-3">
                    <i class="fas fa-virus text-[#3148A8] text-2xl sm:text-3xl"></i>
                    <div>
                        <h2 class="text-lg font-semibold text-[#3148A8]">Jumlah Kasus Difteri</h2>
                        <p class="text-gray-600">{{ number_format($dataDifteri->jml_kasus_difteri) }}</p>
                    </div>
                </div>
            </div>

            <!-- Kategori Kerawanan with Colored Badge -->
            <div>
                <h2 class="text-lg font-semibold text-[#3148A8]">Kategori Kerawanan</h2>
                <p class="text-gray-600 inline-flex items-center px-4 py-2 rounded-full font-medium text-white
                    {{ $dataDifteri->cluster == 'Kerawanan Rendah' ? 'bg-green-500' :
                    ($dataDifteri->cluster == 'Kerawanan Sedang' ? 'bg-yellow-500' : 'bg-red-500') }}">
                    <i class="fas fa-exclamation-triangle mr-2"></i>{{ $dataDifteri->cluster }}
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
