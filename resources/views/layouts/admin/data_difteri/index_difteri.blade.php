@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-5">
    <div class="flex justify-between items-center mb-12 flex-wrap">
        <!-- Judul -->
        <h1 class="text-[36px] font-bold text-[#3148A8] w-full mb-4 md:mb-0">Data Difteri</h1>

        <!-- Button Tambah -->
        <a href="{{ route('data-difteri.create') }}"
            class="bg-[#3148A8] text-white px-6 py-2 rounded-lg shadow-md hover:bg-[#1E2C67] transition duration-300 ease-in-out flex items-center gap-2 no-underline">
            <i class="fas fa-plus"></i> Tambah Data Difteri
        </a>
    </div>

    <!-- Filter dan Search -->
    <div class="mb-6 flex flex-col md:flex-row gap-4 justify-start md:justify-between">
        <!-- Search Form -->
        <form action="{{ route('data-difteri.index') }}" method="GET" class="flex gap-2 flex-col md:flex-row w-full md:w-auto">
            <div class="flex gap-2 w-full md:w-auto">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari..."
                    class="px-4 py-2 rounded-md border-[1px] border-[#3148A8] w-full md:w-[250px]">
                <button type="submit" class="bg-[#3148A8] text-white px-6 py-2 rounded-md mt-2 md:mt-0 w-full md:w-auto">Cari</button>
            </div>
        </form>

        <!-- Filter Tahun dan Kecamatan -->
        <div class="flex gap-4 w-full md:w-auto flex-wrap md:flex-nowrap">
            <!-- Filter Tahun -->
            <form action="{{ route('data-difteri.index') }}" method="GET" class="flex gap-2 w-full md:w-auto">
                <select name="tahun_filter" class="px-4 py-2 rounded-md border-[1px] border-[#3148A8] w-full md:w-[200px]">
                    <option value="">Filter Tahun</option>
                    @foreach ($tahun as $item)
                        <option value="{{ $item->id_tahun }}" {{ request('tahun_filter') == $item->id_tahun ? 'selected' : '' }}>
                            {{ $item->tahun_kejadian }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-[#3148A8] text-white px-6 py-2 rounded-md mt-2 md:mt-0 w-full md:w-auto">Filter</button>
            </form>

            <!-- Filter Kecamatan -->
            <form action="{{ route('data-difteri.index') }}" method="GET" class="flex gap-2 w-full md:w-auto">
                <select name="kecamatan_filter" class="px-4 py-2 rounded-md border-[1px] border-[#3148A8] w-full md:w-[200px]">
                    <option value="">Filter Kecamatan</option>
                    @foreach ($kecamatan as $item)
                        <option value="{{ $item->id_kecamatan }}" {{ request('kecamatan_filter') == $item->id_kecamatan ? 'selected' : '' }}>
                            {{ $item->nama_kecamatan }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="bg-[#3148A8] text-white px-6 py-2 rounded-md mt-2 md:mt-0 w-full md:w-auto">Filter</button>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Data Difteri -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto text-sm text-left text-gray-500">
            <thead class="bg-[#3148A8] text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">ID</th>
                    <th scope="col" class="px-6 py-3 font-medium">Tahun</th>
                    <th scope="col" class="px-6 py-3 font-medium">Kecamatan</th>
                    <th scope="col" class="px-6 py-3 font-medium">Kepadatan Penduduk</th>
                    <th scope="col" class="px-6 py-3 font-medium">Rumah Tidak Sehat</th>
                    <th scope="col" class="px-6 py-3 font-medium">Vaksinasi DPT</th>
                    <th scope="col" class="px-6 py-3 font-medium">Jumlah Kasus Difteri</th>
                    <th scope="col" class="px-6 py-3 font-medium">Kategori</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100">
                @foreach ($dataDifteri as $item)
                <tr class="hover:bg-gray-200 transition duration-300 ease-in-out">
                    <td class="px-6 py-4">{{ $item->id_data }}</td>
                    <td class="px-6 py-4">{{ $item->tahun->tahun_kejadian }}</td>
                    <td class="px-6 py-4">{{ $item->kecamatan->nama_kecamatan }}</td>
                    <td class="px-6 py-4">{{ $item->jml_kepadatan }}</td>
                    <td class="px-6 py-4">{{ $item->jml_rumah_tidak_sehat }}</td>
                    <td class="px-6 py-4">{{ $item->jml_vaksinasi_dpt }}</td>
                    <td class="px-6 py-4">{{ $item->jml_kasus_difteri }}</td>
                    <td class="px-6 py-4">{{ $item->cluster }}</td>
                    <td class="px-6 py-4 flex justify-center space-x-2">
                        <a href="{{ route('data-difteri.show', $item->id_data) }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('data-difteri.edit', $item->id_data) }}" class="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600 focus:outline-none">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('data-difteri.destroy', $item->id_data) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-2 rounded-md hover:bg-red-600 focus:outline-none">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="p-4">
            {{ $dataDifteri->links() }}
        </div>
    </div>
</div>
@endsection
