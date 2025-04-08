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
            <h1 class="text-4xl font-bold text-center flex-grow">Tambah Kecamatan</h1>
        </div>

        <!-- Form untuk menambah kecamatan -->
        <form action="{{ route('kecamatan.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Wrapper with white background for the form inputs -->
            <div class="bg-white p-6 rounded-[20px] shadow-md">
                <!-- Input Nama Kecamatan -->
                <div class="form-group mb-2">
                    <label for="nama_kecamatan" class="text-lg font-medium text-[#1E2C67]">Nama Kecamatan</label>
                    <input type="text" id="nama_kecamatan" name="nama_kecamatan" class="w-full mt-2 px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required placeholder="Masukkan Nama Kecamatan">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-right">
                    <button type="submit" class="bg-[#1E2C67] text-white py-2 px-6 mt-4 rounded-[20px] text-[16px] font-medium hover:bg-[#3148A8] shadow-md hover:shadow-lg">
                        Simpan Kecamatan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
