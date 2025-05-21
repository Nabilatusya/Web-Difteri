@extends('layouts.user_app')
@section('content')
<div class="container mx-auto mt-36 px-4 font-['Poppins']">

    <!-- Judul -->
    <h1 class="text-[48px] font-bold text-[#3148A8] mb-12 text-center uppercase">
        {{ $puskesmas->nama_puskesmas }}
    </h1>

    <!-- GAMBAR & FLOATING KONTEN + VISI MISI -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-40 items-start relative">
        <!-- GAMBAR + FLOATING IDENTITAS & JAM -->
        <div class="relative space-y-6">
            <div class="rounded-2xl overflow-hidden shadow-lg">
                @if($puskesmas->gambar_puskesmas)
                    <div class="aspect-[4/3] w-full">
                        <img src="{{ asset('storage/' . $puskesmas->gambar_puskesmas) }}"
                            alt="Foto Puskesmas"
                            class="object-cover w-full h-full" />
                    </div>
                @else
                    <div class="aspect-[4/3] bg-gray-100 flex items-center justify-center text-gray-500 italic">
                        Belum ada gambar
                    </div>
                @endif
            </div>

            <!-- FLOATING IDENTITAS & JAM -->
            <div class="absolute bottom-[-60px] right-5 flex flex-col sm:flex-row gap-4">
                <!-- IDENTITAS -->
                <div class="bg-[#3148A8] text-white rounded-xl shadow-lg p-6 text-left w-[340px] text-sm">
                    <h3 class="font-bold mb-2 uppercase text-[16px] text-white">Identitas Singkat</h3>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach (array_slice(explode("\n", $puskesmas->identitas_puskesmas), 0, 4) as $identitas)
                            @if(trim($identitas) !== '')
                                <li>{{ $identitas }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <!-- JAM LAYANAN -->
                <div class="bg-white text-[#3148A8] rounded-xl shadow-lg p-6 text-left w-[300px] text-sm border border-[#3148A8] border-[2px]">
                    <h3 class="font-bold mb-2 uppercase text-[16px]">Jam Layanan</h3>
                    <p class="whitespace-pre-line text-gray-700">{{ $puskesmas->jam_layanan }}</p>
                </div>
            </div>
        </div>

        <!-- VISI MISI MOTTO -->
<div class="space-y-6">
    <!-- MOTTO -->
    <div class="bg-white shadow-md rounded-xl p-6">
        <h2 class="text-xl font-bold text-[#3148A8] mb-2 flex items-center">
            <!-- Lightbulb Icon -->
            <svg class="w-8 h-8 mr-2 text-[#3148A8]" fill="currentColor" viewBox="0 0 20 20">
                <path d="M11 3a1 1 0 10-2 0 5 5 0 00-3 4.58c0 1.14.72 2.16 1.52 3.05.4.45.48 1.08.48 1.37v1a1 1 0 001 1h2a1 1 0 001-1v-1c0-.3.08-.92.48-1.37.8-.9 1.52-1.91 1.52-3.05A5 5 0 0011 3zM9 17a1 1 0 102 0H9z" />
            </svg>
            Motto
        </h2>
        <p class="text-gray-700">{{ $puskesmas->motto }}</p>
    </div>

    <!-- VISI -->
    <div class="bg-white shadow-md rounded-xl p-6">
        <h2 class="text-xl font-bold text-[#3148A8] mb-2 flex items-center">
            <!-- Eye Icon -->
            <svg class="w-8 h-8 mr-2 text-[#3148A8]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 5c-7 0-10 7-10 7s3 7 10 7 10-7 10-7-3-7-10-7zm0 12a5 5 0 110-10 5 5 0 010 10z"/>
                <circle cx="12" cy="12" r="2.5" fill="white"/>
            </svg>
            Visi
        </h2>
        <p class="text-gray-700">{{ $puskesmas->visi }}</p>
    </div>

    <!-- MISI -->
    <div class="bg-white shadow-md rounded-xl p-6">
        <h2 class="text-xl font-bold text-[#3148A8] mb-2 flex items-center">
            <!-- Target Icon -->
            <svg class="w-8 h-8 mr-2 text-[#3148A8]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2a10 10 0 00-1 19.95V21a9 9 0 111.8 0v.95A10 10 0 0012 2zm1 10h6a8 8 0 10-7 7v-6a1 1 0 011-1z"/>
                <circle cx="12" cy="12" r="2.5" fill="white"/>
            </svg>
            Misi
        </h2>
        <ul class="list-disc ml-6 space-y-1 text-gray-700">
            @foreach (explode("\n", $puskesmas->misi) as $misi)
                @if(trim($misi) !== '')
                    <li>{{ $misi }}</li>
                @endif
            @endforeach
        </ul>
    </div>
</div>

    </div>

   <!-- LAYANAN UNGGULAN -->
    <div class="bg-gradient-to-r from-[#F0F4FF] to-white rounded-2xl shadow-xl p-10 text-gray-800 mb-24">
        <h2 class="text-[48px] font-bold text-[#3148A8] mb-6 text-center uppercase">Pelayanan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
            @foreach (explode("\n", $puskesmas->pelayanan) as $layanan)
                @if(trim($layanan) !== '')
                    <div class="bg-[#3148A8] rounded-xl p-5 shadow-md text-center hover:shadow-lg transition h-full flex flex-col justify-center items-center min-h-[150px]">
                        <div class="text-[#F0F4FF] text-[18px] font-semibold mb-1">{{ $layanan }}</div>
                        <p class="text-[12px] text-[#F0F4FF] text-center">Layanan kesehatan {{ strtolower($layanan) }}</p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
