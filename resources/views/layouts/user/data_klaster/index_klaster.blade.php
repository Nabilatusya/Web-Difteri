@extends('layouts.user_app')

@section('content')
<div class="container mx-auto mt-32 px-4">
    <!-- Judul -->
    <h1 class="text-[36px] font-semibold text-[#1E2C67] mb-6" style="font-family: 'Poppins', sans-serif;">Data <span class="text-[#3148A8]" style="font-family: 'Poppins', sans-serif;">Kecamatan</span></h1>

    <!-- Form Pencarian -->
    <div class="mb-4 flex justify-end items-center">
        <form action="{{ route('user.kecamatan.index') }}" method="GET" class="w-full max-w-xs">
            <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Cari Kecamatan" class="w-full p-3 border border-[#3148A8] rounded-md text-sm" />
        </form>
    </div>

    <!-- Tabel Daftar Kecamatan -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg mt-5 p-5">
        <table class="min-w-full table-auto text-sm text-left text-gray-500">
            <thead class="bg-[#3148A8] text-white" style="font-family: 'Poppins', sans-serif;">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Nama Kecamatan</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Alamat</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100">
                @foreach ($kecamatan as $item)
                <tr class="hover:bg-[#4b65c9] hover:text-white transition duration-300 ease-in-out" style="font-family: 'Poppins', sans-serif;">
                    <td class="px-6 py-4 text-center">{{ $item->nama_kecamatan }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->alamat_kecamatan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-6 px-4 py-2 flex justify-center">
            {{ $kecamatan->links('pagination::bootstrap-4') }}
        </div>
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

    /* Tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 12px;
    }

    thead {
        background-color: #3148A8;
        border-radius: 12px;
    }

    .table th, .table td {
        padding: 16px;
        text-align: left;
        border: 1px solid #ddd;
        border-radius: 12px;
    }

    .table th {
        font-size: 1.1rem;
    }

    .table td {
        font-size: 1rem;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        padding: 1rem;
    }

    .pagination a {
        color: #3148A8;
        padding: 8px 16px;
        border-radius: 4px;
        border: 1px solid #3148A8;
        margin: 0 4px;
        text-decoration: none;
    }

    .pagination a:hover {
        background-color: #3148A8;
        color: white;
    }

    /* Hover animation */
    tr:hover {
        background-color: #3148A8;
        color: white;
        cursor: pointer;
    }

    /* Center the page */
    .text-center {
        text-align: center;
    }

    /* Agar border-radius bisa bekerja */
    .overflow-x-auto {
        border-radius: 12px;
        overflow: hidden;
    }

    /* Tambahkan border-radius hanya di sudut atas thead */
    thead tr:first-child th:first-child {
        border-top-left-radius: 12px;
    }

    thead tr:first-child th:last-child {
        border-top-right-radius: 12px;
    }

    /* Tambahkan border-radius hanya di sudut bawah tbody */
    tbody tr:last-child td:first-child {
        border-bottom-left-radius: 12px;
    }

    tbody tr:last-child td:last-child {
        border-bottom-right-radius: 12px;
    }
</style>
@endsection
