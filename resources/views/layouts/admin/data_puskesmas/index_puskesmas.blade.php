@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-5">
    <div class="flex flex-col md:flex-row justify-between items-center mb-12">
        <h1 class="text-[36px] font-bold text-[#3148A8] mb-4 md:mb-0">Data Puskesmas</h1>
        <a href="{{ route('puskesmas.create') }}"
            class="bg-[#3148A8] text-white px-6 py-2 rounded-lg shadow-md hover:bg-[#1E2C67] transition duration-300 ease-in-out flex items-center gap-2 no-underline mb-4 md:mb-0">
            <i class="fas fa-plus"></i> Tambah Puskesmas
        </a>
    </div>

    <!-- Search, Filter, and Sorting -->
    <div class="mb-6 flex flex-col md:flex-row gap-4 md:gap-6">
        <!-- Search Form -->
        <form action="{{ route('puskesmas.index') }}" method="GET" class="flex gap-2 w-full md:w-auto">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Puskesmas..." class="w-full p-3 border border-[#3148A8] rounded-l-md text-sm focus:outline-none focus:ring-2 focus:ring-[#3148A8]" />
            <button type="submit" class="bg-[#3148A8] text-white p-3 rounded-r-md hover:bg-[#1E2C67] transition duration-300">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <!-- Sorting Form -->
        <form action="{{ route('puskesmas.index') }}" method="GET" class="flex gap-2 w-full md:w-auto">
            <select name="sort_by" class="px-4 py-2 rounded-md border-[1px] border-[#3148A8] w-full md:w-[180px]">
                <option value="nama_puskesmas" {{ request('sort_by') == 'nama_puskesmas' ? 'selected' : '' }}>Nama Puskesmas</option>
                <option value="alamat_puskesmas" {{ request('sort_by') == 'alamat_puskesmas' ? 'selected' : '' }}>Alamat</option>
            </select>
            <select name="direction" class="px-4 py-2 rounded-md border-[1px] border-[#3148A8] w-full md:w-[180px]">
                <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
            <button type="submit" class="bg-[#3148A8] text-white px-6 py-2 rounded-md hover:bg-[#1E2C67] transition duration-300 w-full md:w-auto mt-2 md:mt-0">
                Sortir
            </button>
        </form>
    </div>

    <!-- Tabel Daftar Puskesmas -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto text-sm text-left text-gray-500">
            <thead class="bg-[#3148A8] text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium text-center">ID</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Nama Puskesmas</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Alamat</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Nomor Telepon</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100">
                @foreach ($puskesmas as $item)
                <tr class="hover:bg-gray-200 transition duration-300 ease-in-out">
                    <td class="px-6 py-4 text-center">{{ $item->id_puskesmas }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->nama_puskesmas }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->alamat_puskesmas }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->telp_puskesmas }}</td>
                    <td class="px-6 py-4 flex justify-center space-x-2">
                        <a href="{{ route('puskesmas.show', $item->id_puskesmas) }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('puskesmas.edit', $item->id_puskesmas) }}" class="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600 focus:outline-none">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('puskesmas.destroy', $item->id_puskesmas) }}" method="POST">
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
            {{ $puskesmas->appends(request()->input())->links() }} <!-- Untuk mempertahankan search, filter, dan sort saat pagination -->
        </div>
    </div>
</div>
@endsection
