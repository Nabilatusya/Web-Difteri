@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-8 font-poppins">
    <!-- Judul Halaman -->
    <h1 class="text-[36px] font-bold text-[#3148A8] mb-6 text-center">{{ $puskesmas->nama_puskesmas }}</h1>

    <!-- Gambar Puskesmas -->
    <div class="flex justify-center mb-8">
        <img src="{{ asset('storage/' . $puskesmas->foto_puskesmas) }}" alt="Foto Puskesmas"
            class="rounded-xl shadow-lg w-full max-w-4xl object-cover h-[300px]">
    </div>

    <!-- Identitas Puskesmas -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-2xl font-semibold text-[#3148A8] mb-4">Identitas Puskesmas</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
            <div><strong>Nama:</strong> {{ $puskesmas->nama_puskesmas }}</div>
            <div><strong>Alamat:</strong> {{ $puskesmas->alamat_puskesmas }}</div>
            <div><strong>No. Telepon:</strong> {{ $puskesmas->telp_puskesmas }}</div>
            <div><strong>Email:</strong> {{ $puskesmas->email_puskesmas }}</div>
        </div>
    </div>

    <!-- Motto, Visi, Misi -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-2xl font-semibold text-[#3148A8] mb-4">Motto, Visi, dan Misi</h2>
        <div class="mb-4">
            <h3 class="font-semibold text-lg text-[#3148A8]">Motto:</h3>
            <p class="text-gray-700">{{ $puskesmas->motto }}</p>
        </div>
        <div class="mb-4">
            <h3 class="font-semibold text-lg text-[#3148A8]">Visi:</h3>
            <p class="text-gray-700">{{ $puskesmas->visi }}</p>
        </div>
        <div>
            <h3 class="font-semibold text-lg text-[#3148A8]">Misi:</h3>
            <ul class="list-disc ml-5 text-gray-700">
                @foreach (explode("\n", $puskesmas->misi) as $misi)
                    <li>{{ $misi }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Jam Layanan -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-2xl font-semibold text-[#3148A8] mb-4">Jam Layanan</h2>
        <div class="text-gray-700 whitespace-pre-line">{{ $puskesmas->jam_layanan }}</div>
    </div>

    <!-- Jenis Pelayanan -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold text-[#3148A8] mb-4">Jenis Pelayanan</h2>
        <ul class="list-disc ml-5 text-gray-700">
            @foreach (explode("\n", $puskesmas->jenis_pelayanan) as $layanan)
                <li>{{ $layanan }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
