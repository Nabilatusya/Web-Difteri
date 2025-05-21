@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-12">
    <!-- Card with wider width -->
    <div class="max-w-3xl mx-auto bg-gradient-to-r from-[#3148A8] to-[#1E2C67] p-12 rounded-[20px] shadow-xl text-white">
        <div class="flex items-center justify-between mb-8">
            <!-- Button Kembali -->
            <a href="{{ route('puskesmas.index') }}" class="text-white text-2xl hover:text-gray-300 transition duration-300">
                <i class="fas fa-chevron-left"></i>
            </a>
            <h1 class="text-4xl font-bold text-center flex-grow">Detail Puskesmas</h1>
        </div>

        <!-- Wrapper with white background for the form inputs -->
        <div class="bg-white p-6 rounded-[20px] shadow-md text-[#1E2C67] space-y-6">

            <div>
                <h2 class="text-lg font-semibold">Nama Puskesmas</h2>
                <p class="text-gray-600">{{ $puskesmas->nama_puskesmas }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Alamat</h2>
                <p class="text-gray-600">{{ $puskesmas->alamat_puskesmas }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Nomor Telepon</h2>
                <p class="text-gray-600">{{ $puskesmas->telp_puskesmas }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Identitas Puskesmas</h2>
                <p class="text-gray-600">{{ $puskesmas->identitas_puskesmas }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Gambar Puskesmas</h2>
                @if($puskesmas->gambar_puskesmas)
                    <img src="{{ asset('storage/' . $puskesmas->gambar_puskesmas) }}" alt="Gambar Puskesmas" class="rounded-lg w-full max-h-64 object-cover mt-2">
                @else
                    <p class="text-gray-600 italic">Belum ada gambar</p>
                @endif
            </div>

            <div>
                <h2 class="text-lg font-semibold">Motto</h2>
                <p class="text-gray-600">{{ $puskesmas->motto }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Visi</h2>
                <p class="text-gray-600">{{ $puskesmas->visi }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Misi</h2>
                <p class="text-gray-600">{{ $puskesmas->misi }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Jam Layanan</h2>
                <p class="text-gray-600">{{ $puskesmas->jam_layanan }}</p>
            </div>

            <div>
                <h2 class="text-lg font-semibold">Pelayanan</h2>
                <p class="text-gray-600">{{ $puskesmas->pelayanan }}</p>
            </div>

        </div>
    </div>
</div>
@endsection
