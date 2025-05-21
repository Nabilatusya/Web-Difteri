@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-12">
    <!-- Card with wider width -->
    <div class="max-w-4xl mx-auto bg-gradient-to-r from-[#3148A8] to-[#1E2C67] p-12 rounded-[20px] shadow-xl text-white">
        <div class="flex items-center justify-between mb-8">
            <a href="{{ route('puskesmas.index') }}" class="text-white text-2xl hover:text-gray-300 transition duration-300">
                <i class="fas fa-chevron-left"></i>
            </a>
            <h1 class="text-4xl font-bold text-center flex-grow">Tambah Puskesmas</h1>
        </div>

        <form action="{{ route('puskesmas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="bg-white p-6 rounded-[20px] shadow-md text-[#1E2C67]">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Kolom kiri -->
                    <div class="space-y-4">
                        <!-- Nama -->
                        <div>
                            <label for="nama_puskesmas" class="text-lg font-medium">Nama Puskesmas</label>
                            <input type="text" id="nama_puskesmas" name="nama_puskesmas" required
                                class="w-full mt-2 px-6 py-2 rounded-[20px] border border-[#1E2C67] focus:ring-4 focus:ring-opacity-50"
                                placeholder="Masukkan Nama Puskesmas">
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label for="alamat_puskesmas" class="text-lg font-medium">Alamat Puskesmas</label>
                            <input type="text" id="alamat_puskesmas" name="alamat_puskesmas" required
                                class="w-full mt-2 px-6 py-2 rounded-[20px] border border-[#1E2C67] focus:ring-4 focus:ring-opacity-50"
                                placeholder="Masukkan Alamat Puskesmas">
                        </div>

                        <!-- Telepon -->
                        <div>
                            <label for="telp_puskesmas" class="text-lg font-medium">Nomor Telepon</label>
                            <input type="text" id="telp_puskesmas" name="telp_puskesmas" required
                                class="w-full mt-2 px-6 py-2 rounded-[20px] border border-[#1E2C67] focus:ring-4 focus:ring-opacity-50"
                                placeholder="Masukkan Nomor Telepon">
                        </div>

                        <!-- Identitas -->
                        <div>
                            <label for="identitas_puskesmas" class="text-lg font-medium">Identitas Puskesmas</label>
                            <textarea id="identitas_puskesmas" name="identitas_puskesmas" rows="3"
                                class="w-full mt-2 px-6 py-2 rounded-[20px] border border-[#1E2C67] focus:ring-4 focus:ring-opacity-50"
                                placeholder="Tulis identitas puskesmas di sini..."></textarea>
                        </div>

                        <!-- Gambar Upload -->
                        <div>
                            <label for="gambar_puskesmas" class="text-lg font-medium">Gambar Puskesmas</label>
                            <input type="file" id="gambar_puskesmas" name="gambar_puskesmas"
                                class="w-full mt-2 rounded-[20px] border border-[#1E2C67] bg-white p-2">
                        </div>
                        <!-- Tambahkan di bawah input gambar -->
                        <div class="mt-4">
                            <img id="previewImage" src="#" alt="Preview" class="hidden w-40 rounded-lg">
                        </div>

                        <script>
                            document.getElementById('gambar_puskesmas').addEventListener('change', function (e) {
                                const [file] = e.target.files;
                                if (file) {
                                    const preview = document.getElementById('previewImage');
                                    preview.src = URL.createObjectURL(file);
                                    preview.classList.remove('hidden');
                                }
                            });
                        </script>

                    </div>

                    <!-- Kolom kanan -->
                    <div class="space-y-4">
                        <!-- Motto -->
                        <div>
                            <label for="motto" class="text-lg font-medium">Motto</label>
                            <textarea id="motto" name="motto" rows="2"
                                class="w-full mt-2 px-6 py-2 rounded-[20px] border border-[#1E2C67] focus:ring-4 focus:ring-opacity-50"
                                placeholder="Tulis motto puskesmas..."></textarea>
                        </div>

                        <!-- Visi -->
                        <div>
                            <label for="visi" class="text-lg font-medium">Visi</label>
                            <textarea id="visi" name="visi" rows="2"
                                class="w-full mt-2 px-6 py-2 rounded-[20px] border border-[#1E2C67] focus:ring-4 focus:ring-opacity-50"
                                placeholder="Tulis visi puskesmas..."></textarea>
                        </div>

                        <!-- Misi -->
                        <div>
                            <label for="misi" class="text-lg font-medium">Misi</label>
                            <textarea id="misi" name="misi" rows="3"
                                class="w-full mt-2 px-6 py-2 rounded-[20px] border border-[#1E2C67] focus:ring-4 focus:ring-opacity-50"
                                placeholder="Tulis misi puskesmas..."></textarea>
                        </div>

                        <!-- Jam Layanan -->
                        <div>
                            <label for="jam_layanan" class="text-lg font-medium">Jam Layanan</label>
                            <textarea id="jam_layanan" name="jam_layanan" rows="2"
                                class="w-full mt-2 px-6 py-2 rounded-[20px] border border-[#1E2C67] focus:ring-4 focus:ring-opacity-50"
                                placeholder="Contoh: Senin - Jumat, 07.00 - 14.00"></textarea>
                        </div>

                        <!-- Pelayanan -->
                        <div>
                            <label for="pelayanan" class="text-lg font-medium">Pelayanan</label>
                            <textarea id="pelayanan" name="pelayanan" rows="3"
                                class="w-full mt-2 px-6 py-2 rounded-[20px] border border-[#1E2C67] focus:ring-4 focus:ring-opacity-50"
                                placeholder="Tulis jenis-jenis pelayanan yang tersedia..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="bg-[#1E2C67] text-white py-2 px-6 rounded-[20px] text-[16px] font-medium hover:bg-[#3148A8] shadow-md hover:shadow-lg">
                        Simpan Puskesmas
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
