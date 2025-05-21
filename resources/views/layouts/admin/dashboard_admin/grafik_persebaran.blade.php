@extends('layouts.admin.admin_app')

@section('content')
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <!-- Title -->
        <div class="mb-6 text-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4 font-poppins">
                Peta Kerawanan Difteri
            </h2>
            <p class="text-lg text-gray-600">Visualisasi peta kerawanan difteri berdasarkan kecamatan.</p>
        </div>

        <!-- Embed Map -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
            <iframe
                src="http://localhost:3000/public/dashboard/68310243-3cb1-4242-91a3-2de6ff5f7d40"
                frameborder="0"
                width="100%"
                height="600px"
                class="rounded-lg shadow-lg"
            ></iframe>
        </div>

        <!-- Footer Section (Optional) -->
        <div class="text-center mt-6">
            <button class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-all duration-200">
                Unduh Data
            </button>
        </div>
    </div>
@endsection
