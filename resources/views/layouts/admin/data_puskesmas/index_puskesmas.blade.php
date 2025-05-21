@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-5">
    <!-- Header -->
    <div class="flex justify-between items-center mb-12 flex-wrap">
        <h1 class="text-[36px] font-bold text-[#3148A8] w-full md:w-auto mb-4 md:mb-0">Data Puskesmas</h1>

        <a href="{{ route('puskesmas.create') }}"
            class="bg-[#3148A8] text-white px-6 py-2 rounded-lg shadow-md hover:bg-[#1E2C67] transition duration-300 ease-in-out flex items-center gap-2 no-underline">
            <i class="fas fa-plus"></i> Tambah Puskesmas
        </a>
    </div>

    <!-- Search & Sorting -->
    <div class="mb-6 flex flex-col lg:flex-row gap-4 justify-start lg:justify-between">
        <!-- Search -->
        <form action="{{ route('puskesmas.index') }}" method="GET" class="flex gap-2 flex-col md:flex-row w-full lg:w-auto">
            <div class="flex gap-2 w-full md:w-auto">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Puskesmas..."
                    class="px-4 py-2 rounded-md border border-[#3148A8] w-full md:w-[250px]">
                <button type="submit"
                    class="bg-[#3148A8] text-white px-6 py-2 rounded-md mt-2 md:mt-0 w-full md:w-auto">
                    Cari
                </button>
            </div>
        </form>

        <!-- Sort By -->
        <form action="{{ route('puskesmas.index') }}" method="GET" class="flex flex-col md:flex-row gap-2 w-full lg:w-auto">
            <select name="sort_by" class="px-4 py-2 rounded-md border border-[#3148A8] w-full md:w-[180px]">
                <option value="nama_puskesmas" {{ request('sort_by') == 'nama_puskesmas' ? 'selected' : '' }}>Nama Puskesmas</option>
                <option value="alamat_puskesmas" {{ request('sort_by') == 'alamat_puskesmas' ? 'selected' : '' }}>Alamat</option>
            </select>
            <select name="direction" class="px-4 py-2 rounded-md border border-[#3148A8] w-full md:w-[180px]">
                <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
            <button type="submit"
                class="bg-[#3148A8] text-white px-6 py-2 rounded-md mt-2 md:mt-0 w-full md:w-auto">
                Sortir
            </button>
        </form>
    </div>

    <!-- Tabel Data -->
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
                @forelse ($puskesmas as $item)
                <tr class="hover:bg-gray-200 transition duration-300 ease-in-out">
                    <td class="px-6 py-4 text-center">{{ $item->id_puskesmas }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->nama_puskesmas }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->alamat_puskesmas }}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="tel:{{ preg_replace('/[^0-9]/', '', $item->telp_puskesmas) }}" class="text-blue-600 hover:underline">
                            <i class="fas fa-phone-alt mr-1"></i>{{ $item->telp_puskesmas }}
                        </a>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('puskesmas.show', $item->id_puskesmas) }}"
                                class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('puskesmas.edit', $item->id_puskesmas) }}"
                                class="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('puskesmas.destroy', $item->id_puskesmas) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded-md hover:bg-red-600">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Data Puskesmas tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="p-4">
            {{ $puskesmas->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@endsection
