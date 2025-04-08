@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-5">
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-[36px] font-bold text-[#3148A8]">Data Tahun</h1>
        <a href="{{ route('tahun.create') }}"
            class="bg-[#3148A8] text-white px-6 py-2 rounded-lg shadow-md hover:bg-[#1E2C67] transition duration-300 ease-in-out flex items-center gap-2 no-underline">
            <i class="fas fa-plus"></i> Tambah Data Tahun
        </a>
    </div>

    <!-- Tabel Daftar Tahun -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto text-sm text-left text-gray-500">
            <thead class="bg-[#3148A8] text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">ID Tahun</th>
                    <th scope="col" class="px-6 py-3 font-medium">Tahun Kejadian</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100">
                @foreach ($tahun as $item)
                <tr class="hover:bg-gray-200 transition duration-300 ease-in-out">
                    <td class="px-6 py-4">{{ $item->id_tahun }}</td>
                    <td class="px-6 py-4">{{ $item->tahun_kejadian }}</td>
                    <td class="px-6 py-4 flex justify-center space-x-2">
                        <a href="{{ route('tahun.show', $item->id_tahun) }}" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('tahun.edit', $item->id_tahun) }}" class="bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-600 focus:outline-none">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('tahun.destroy', $item->id_tahun) }}" method="POST" style="display:inline;">
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
    </div>
</div>
@endsection
