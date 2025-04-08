@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-12">
    <!-- Card with a slightly different style -->
    <div class="max-w-3xl mx-auto bg-gradient-to-r from-[#1E2C67] to-[#3148A8] p-12 rounded-[20px] shadow-xl text-white">
        <div class="flex items-center justify-between mb-8">
            <!-- Button Kembali -->
            <a href="{{ route('data-difteri.index') }}" class="text-white text-2xl hover:text-gray-300 transition duration-300">
                <i class="fas fa-chevron-left"></i>
            </a>
            <h1 class="text-4xl font-bold text-center flex-grow">Edit Data Difteri</h1>
        </div>

        <!-- Form untuk mengedit data difteri -->
        <form action="{{ route('data-difteri.update', $dataDifteri->id_data) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Wrapper with a slightly darker background for form inputs -->
            <div class="bg-gray-100 p-6 rounded-[20px] shadow-md">
                <!-- Input Tahun -->
                <div class="form-group mb-4">
                    <label for="id_tahun" class="text-lg font-semibold text-[#1E2C67]">Tahun</label>
                    <select name="id_tahun" id="id_tahun" class="w-full px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required>
                        <option value="">Pilih Tahun</option>
                        @foreach ($tahun as $tahun)
                            <option value="{{ $tahun->id_tahun }}" {{ $tahun->id_tahun == $dataDifteri->id_tahun ? 'selected' : '' }}>
                                {{ $tahun->tahun_kejadian }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Input Kecamatan -->
                <div class="form-group mb-4">
                    <label for="id_kecamatan" class="text-lg font-semibold text-[#1E2C67]">Kecamatan</label>
                    <select name="id_kecamatan" id="id_kecamatan" class="w-full px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required>
                        <option value="">Pilih Kecamatan</option>
                        @foreach ($kecamatan as $kec)
                            <option value="{{ $kec->id_kecamatan }}" {{ $kec->id_kecamatan == $dataDifteri->id_kecamatan ? 'selected' : '' }}>
                                {{ $kec->nama_kecamatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Input Jumlah Kepadatan -->
                <div class="form-group mb-4">
                    <label for="jml_kepadatan" class="text-lg font-semibold text-[#1E2C67]">Jumlah Kepadatan</label>
                    <input type="number" id="jml_kepadatan" name="jml_kepadatan" class="w-full px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required value="{{ $dataDifteri->jml_kepadatan }}">
                </div>

                <!-- Input Jumlah Rumah Tidak Sehat -->
                <div class="form-group mb-4">
                    <label for="jml_rumah_tidak_sehat" class="text-lg font-semibold text-[#1E2C67]">Jumlah Rumah Tidak Sehat</label>
                    <input type="number" id="jml_rumah_tidak_sehat" name="jml_rumah_tidak_sehat" class="w-full px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required value="{{ $dataDifteri->jml_rumah_tidak_sehat }}">
                </div>

                <!-- Input Vaksinasi DPT -->
                <div class="form-group mb-4">
                    <label for="jml_vaksinasi_dpt" class="text-lg font-semibold text-[#1E2C67]">Jumlah Vaksinasi DPT</label>
                    <input type="number" id="jml_vaksinasi_dpt" name="jml_vaksinasi_dpt" class="w-full px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required value="{{ $dataDifteri->jml_vaksinasi_dpt }}">
                </div>

                <!-- Input Jumlah Kasus Difteri -->
                <div class="form-group mb-4">
                    <label for="jml_kasus_difteri" class="text-lg font-semibold text-[#1E2C67]">Jumlah Kasus Difteri</label>
                    <input type="number" id="jml_kasus_difteri" name="jml_kasus_difteri" class="w-full px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" required value="{{ $dataDifteri->jml_kasus_difteri }}">
                </div>

                <!-- Input Cluster -->
                <div class="form-group mb-4">
                    <label for="cluster" class="text-lg font-semibold text-[#1E2C67]">Cluster</label>
                    <input type="text" id="cluster" name="cluster" class="w-full px-6 py-2 rounded-[20px] border-[1px] border-[#1E2C67] text-[#1E2C67] focus:ring-4 focus:ring-[#1E2C67] focus:ring-opacity-50 transition duration-300 ease-in-out" value="{{ $dataDifteri->cluster }}">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-[#3148A8] text-white py-2 px-6 mt-4 rounded-[20px] text-[16px] font-medium hover:bg-[#1E2C67] shadow-md hover:shadow-lg">
                        Update Data Difteri
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
