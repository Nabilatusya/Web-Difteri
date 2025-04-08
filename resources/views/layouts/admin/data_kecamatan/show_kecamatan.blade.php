@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-12">
    <!-- Card with wider width -->
    <div class="max-w-3xl mx-auto bg-gradient-to-r from-[#3148A8] to-[#1E2C67] p-12 rounded-[20px] shadow-xl text-white">
        <div class="flex items-center justify-between mb-8">
            <!-- Button Kembali -->
            <a href="{{ route('kecamatan.index') }}" class="text-white text-2xl hover:text-gray-300 transition duration-300">
                <i class="fas fa-chevron-left"></i>
            </a>
            <h1 class="text-4xl font-bold text-center flex-grow">Detail Kecamatan</h1>
        </div>

        <!-- Wrapper with white background for the details -->
        <div class="bg-white p-6 rounded-[20px] shadow-md text-[#1E2C67]">
            <!-- Nama Kecamatan -->
            <div class="mb-4">
                <h2 class="text-lg font-semibold">Nama Kecamatan</h2>
                <p class="text-gray-600">{{ $kecamatan->nama_kecamatan }}</p>
            </div>

            <!-- Additional Details (if any) -->
            <!-- If you have more details to show, you can add them here in a similar format -->
        </div>
    </div>
</div>
@endsection
