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
            <h1 class="text-4xl font-bold text-center flex-grow">Tambah Puskesmas</h1>
        </div>
        <!-- Form untuk menambah puskesmas -->
        <form action="{{ route('puskesmas.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Wrapper with white background for the form inputs -->
            <div class="bg-white p-6 rounded-[20px] shadow-md">
                <!-- Input Nama Puskesmas -->
                <div class="form-group mb-4">
                    <label for="nama_puskesmas" class="text-lg font-medium text-[#1E2C67]">Nama Puskesmas</label>
                    <input type="text" id="nama_puskesmas" name="nama_puskesmas" class="w-full mt-2 px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required placeholder="Masukkan Nama Puskesmas">
                </div>

                <!-- Input Alamat Puskesmas -->
                <div class="form-group mb-4">
                    <label for="alamat_puskesmas" class="text-lg font-medium text-[#1E2C67]">Alamat Puskesmas</label>
                    <input type="text" id="alamat_puskesmas" name="alamat_puskesmas" class="w-full mt-2 px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required placeholder="Masukkan Alamat Puskesmas">
                </div>

                <!-- Input Nomor Telepon -->
                <div class="form-group mb-4">
                    <label for="telp_puskesmas" class="text-lg font-medium text-[#1E2C67]">Nomor Telepon</label>
                    <input type="text" id="telp_puskesmas" name="telp_puskesmas" class="w-full mt-2 px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required placeholder="Masukkan Nomor Telepon">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-right mt-6">
                    <button type="submit" class="bg-[#1E2C67] text-white py-2 px-6 mt-4 rounded-[20px] text-[16px] font-medium hover:bg-[#3148A8] shadow-md hover:shadow-lg">
                        Simpan Puskesmas
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
