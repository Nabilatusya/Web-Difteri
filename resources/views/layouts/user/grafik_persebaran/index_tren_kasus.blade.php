@extends('layouts.user_app')

@section('content')
<div class="container mx-auto mt-32 px-4">
    <!-- Judul -->
    <h1 class="text-[36px] font-semibold text-[#1E2C67] mb-6" style="font-family: 'Poppins', sans-serif;">
        Tren Persebaran <span class="text-[#3148A8]" style="font-family: 'Poppins', sans-serif;">Kasus Difteri</span>
    </h1>

    <!-- Dropdown Kecamatan -->
    <div class="mb-6">
        <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">Pilih Kecamatan:</label>
        <select id="kecamatan" name="kecamatan" class="w-full md:w-1/3 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#3148A8] focus:border-[#3148A8]">
            <option value="">-- Semua Kecamatan --</option>
            @foreach($kecamatans as $kecamatan)
                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
            @endforeach
        </select>
    </div>

    <!-- Embed Metabase Grafik -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <iframe
            id="metabaseIframe"
            src="http://localhost:3000/public/dashboard/8c780e3f-0e13-4ad2-aaaf-2f43fb5f83a3"
            frameborder="0"
            width="100%"
            height="600px"
            class="rounded-md"
        ></iframe>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const kecamatanDropdown = document.getElementById('kecamatan');

        kecamatanDropdown.addEventListener('change', function() {
            const selectedKecamatanId = this.value;
            const iframe = document.getElementById('metabaseIframe');

            // Update URL Metabase dengan parameter kecamatan
            if (selectedKecamatanId) {
                iframe.src = `http://localhost:3000/public/dashboard/8c780e3f-0e13-4ad2-aaaf-2f43fb5f83a3?kecamatan_id=${selectedKecamatanId}`;
            } else {
                iframe.src = 'http://localhost:3000/public/dashboard/8c780e3f-0e13-4ad2-aaaf-2f43fb5f83a3';
            }
        });
    });
</script>
@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .container {
        max-width: 90%;
    }

    iframe {
        border-radius: 12px;
    }

    @media (max-width: 768px) {
        .container {
            padding: 0 10px;
        }

        .text-[36px] {
            font-size: 24px;
        }

        iframe {
            height: 400px;
        }

        #kecamatan {
            width: 100%;
        }
    }
</style>
@endsection
