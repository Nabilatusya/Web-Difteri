@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-5">
    <div class="flex flex-col md:flex-row justify-between items-center mb-12">
        <h1 class="text-[36px] font-bold text-[#3148A8] mb-4 md:mb-0">Data Kecamatan</h1>
        <a href="{{ route('kecamatan.create') }}"
            class="bg-[#3148A8] text-white px-6 py-2 rounded-lg shadow-md hover:bg-[#1E2C67] transition duration-300 ease-in-out flex items-center gap-2 no-underline mb-4 md:mb-0">
            <i class="fas fa-plus"></i> Tambah Data Kecamatan
        </a>
    </div>

    <!-- Search and Filter -->
    <div class="mb-6 flex flex-col md:flex-row gap-4 md:gap-6">
        <!-- Search Form -->
        <form action="{{ route('kecamatan.index') }}" method="GET" class="flex gap-2 w-full md:w-auto">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Kecamatan..." class="w-full p-3 border border-[#3148A8] rounded-l-md text-sm focus:outline-none focus:ring-2 focus:ring-[#3148A8]" />
            <button type="submit" class="bg-[#3148A8] text-white p-3 rounded-r-md hover:bg-[#1E2C67] transition duration-300">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- Tabel Daftar Kecamatan -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto text-sm text-left text-gray-500">
            <thead class="bg-[#3148A8] text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium text-center">ID</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Nama Kecamatan</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100">
                @foreach ($kecamatan as $item)
                <tr class="hover:bg-gray-200 transition duration-300 ease-in-out">
                    <td class="px-6 py-4 text-center">{{ $item->id_kecamatan }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->nama_kecamatan }}</td>
                    <td class="px-6 py-4 flex justify-center space-x-2">
                        <a href="{{ route('kecamatan.show', $item->id_kecamatan) }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('kecamatan.edit', $item->id_kecamatan) }}" class="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600 focus:outline-none">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('kecamatan.destroy', $item->id_kecamatan) }}" method="POST" style="display:inline;">
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
            {{ $kecamatan->appends(request()->input())->links() }} <!-- Untuk mempertahankan search dan filter saat pagination -->
        </div>
    </div>
</div>
@endsection
