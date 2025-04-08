@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-12">
    <!-- Card with a slightly different style -->
    <div class="max-w-3xl mx-auto bg-gradient-to-r from-[#1E2C67] to-[#3148A8] p-12 rounded-[20px] shadow-xl text-white">
        <div class="flex items-center justify-between mb-8">
            <!-- Button Kembali -->
            <a href="{{ route('puskesmas.index') }}" class="text-white text-2xl hover:text-gray-300 transition duration-300">
                <i class="fas fa-chevron-left"></i>
            </a>
            <h1 class="text-4xl font-bold text-center flex-grow">Edit Puskesmas</h1>
        </div>
        <!-- Form untuk mengedit puskesmas -->
        <form action="{{ route('puskesmas.update', $puskesmas->id_puskesmas) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Wrapper with a slightly darker background for form inputs -->
            <div class="bg-gray-100 p-6 rounded-[20px] shadow-md">
                <!-- Input Nama Puskesmas -->
                <div class="form-group mb-4">
                    <label for="nama_puskesmas" class="text-lg font-semibold text-[#1E2C67]">Nama Puskesmas</label>
                    <input type="text" id="nama_puskesmas" name="nama_puskesmas" class="w-full px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required value="{{ $puskesmas->nama_puskesmas }}">
                </div>

                <!-- Input Alamat Puskesmas -->
                <div class="form-group mb-4">
                    <label for="alamat_puskesmas" class="text-lg font-semibold text-[#1E2C67]">Alamat Puskesmas</label>
                    <input type="text" id="alamat_puskesmas" name="alamat_puskesmas" class="w-full px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required value="{{ $puskesmas->alamat_puskesmas }}">
                </div>

                <!-- Input Nomor Telepon -->
                <div class="form-group mb-4">
                    <label for="telp_puskesmas" class="text-lg font-semibold text-[#1E2C67]">Nomor Telepon</label>
                    <input type="text" id="telp_puskesmas" name="telp_puskesmas" class="w-full px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required value="{{ $puskesmas->telp_puskesmas }}">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-right mt-6">
                    <button type="submit" class="bg-[#3148A8] text-white py-2 px-6 mt-4 rounded-[20px] text-[16px] font-medium hover:bg-[#1E2C67] shadow-md hover:shadow-lg">
                        Update Puskesmas
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
