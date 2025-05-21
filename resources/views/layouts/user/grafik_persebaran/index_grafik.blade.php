@extends('layouts.user_app')

@section('content')
<div class="container mx-auto mt-32 px-4">
    <!-- Judul -->
    <h1 class="text-[36px] font-semibold text-[#1E2C67] mb-6" style="font-family: 'Poppins', sans-serif;">
        Grafik Persebaran <span class="text-[#3148A8]" style="font-family: 'Poppins', sans-serif;">Kasus</span>
    </h1>

    <!-- Embed Metabase Grafik -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <iframe
            src="http://localhost:3000/public/dashboard/68310243-3cb1-4242-91a3-2de6ff5f7d40"
            frameborder="0"
            width="100%"
            height="600px"
            class="rounded-md"
        ></iframe>
    </div>
</div>
@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .container {
        max-width: 90%; /* Adjusting the max-width */
    }

    /* Styling for the iframe */
    iframe {
        border-radius: 12px;
    }

    /* Responsif untuk mobile */
    @media (max-width: 768px) {
        .container {
            padding: 0 10px;
        }

        /* Menata konten menjadi lebih kompak pada perangkat kecil */
        .text-[36px] {
            font-size: 24px; /* Menurunkan ukuran font judul pada perangkat kecil */
        }

        iframe {
            height: 400px; /* Menyesuaikan tinggi iframe untuk perangkat kecil */
        }
    }
</style>
@endsection
