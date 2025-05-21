@extends('layouts.user_app')

@section('content')
<div class="container mx-auto mt-32 px-4">
    <!-- Judul -->
    <h1 class="text-[36px] font-semibold text-[#1E2C67] mb-6" style="font-family: 'Poppins', sans-serif;">
        Data <span class="text-[#3148A8]" style="font-family: 'Poppins', sans-serif;">Puskesmas</span>
    </h1>

    <!-- Form Pencarian dan Sort Filter -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <!-- Search Form -->
        <div class="w-full max-w-xs md:max-w-sm">
            <form action="{{ route('user.puskesmas.index') }}" method="GET" class="flex gap-2 items-center">
                <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Cari Puskesmas"
                    class="w-full p-3 border border-[#3148A8] rounded-l-md text-sm focus:outline-none focus:ring-2 focus:ring-[#3148A8]" />
                <button type="submit" class="bg-[#3148A8] text-white p-3 rounded-r-md hover:bg-[#1E2C67] transition duration-300">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <!-- Sort and Filter -->
        <div class="flex gap-4 items-center w-full md:w-auto flex-wrap">
            <!-- Sorting Form -->
            <form action="{{ route('user.puskesmas.index') }}" method="GET" class="flex gap-2 w-full">
                <select name="sort_by" class="px-4 py-2 rounded-md border-[1px] border-[#3148A8] w-full md:w-[180px]">
                    <option value="nama_puskesmas" {{ request('sort_by') == 'nama_puskesmas' ? 'selected' : '' }}>
                        Nama Puskesmas
                    </option>
                    <option value="alamat_puskesmas" {{ request('sort_by') == 'alamat_puskesmas' ? 'selected' : '' }}>
                        Alamat
                    </option>
                </select>
                <select name="direction" class="px-4 py-2 rounded-md border-[1px] border-[#3148A8] w-full md:w-[180px]">
                    <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
                <button type="submit" class="bg-[#3148A8] text-white px-4 py-2 rounded-md hover:bg-[#1E2C67] transition duration-300 w-full md:w-auto mt-2 md:mt-0">
                    Sortir
                </button>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Puskesmas -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg mt-5 p-5">
        <table class="min-w-full table-auto text-sm text-left text-gray-500">
            <thead class="bg-[#3148A8] text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Nama Puskesmas</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Alamat</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Nomor Telepon</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100">
                @foreach ($puskesmas as $item)
                <tr onclick="window.location='{{ route('puskesmas.profile', $item->id_puskesmas) }}';" class="cursor-pointer hover:bg-[#4b65c9] hover:text-white transition duration-300 ease-in-out">
                    <td class="px-6 py-4 text-center">{{ $item->nama_puskesmas }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->alamat_puskesmas }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->telp_puskesmas }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-6 px-4 py-2 flex justify-center">
            {{ $puskesmas->appends(request()->input())->links('pagination::bootstrap-4') }}
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

    /* Responsif untuk mobile */
    @media (max-width: 768px) {
        .container {
            padding: 0 10px;
        }

        /* Menata form pencarian dan filter untuk perangkat kecil */
        .flex {
            flex-direction: column;
        }

        /* Mengatur tombol dan filter supaya lebih kompak pada perangkat kecil */
        .w-full {
            width: 100%;
        }

        .w-full.md\:w-auto {
            width: 100%;
        }

        .table th, .table td {
            font-size: 0.9rem; /* Mengurangi ukuran font pada mobile */
        }

        /* Menyembunyikan tombol sortir untuk perangkat kecil */
        .bg-[#3148A8] {
            font-size: 14px;
        }
    }
</style>
@endsection
