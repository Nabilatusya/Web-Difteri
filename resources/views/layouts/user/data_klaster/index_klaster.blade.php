@extends('layouts.user_app')

@section('content')

<div class="container mx-auto mt-32 px-4">
    <!-- Judul -->
    <h1 class="text-[36px] font-semibold text-[#1E2C67] mb-6" style="font-family: 'Poppins', sans-serif;">
        Data <span class="text-[#3148A8]" style="font-family: 'Poppins', sans-serif;">Difteri</span>
    </h1>

    <!-- Form Pencarian dan Filter -->
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <!-- Search Form -->
        <div class="w-full md:w-1/3 max-w-xs md:max-w-sm">
            <form action="{{ route('data.klaster') }}" method="GET" class="flex gap-2 items-center">
                <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Cari Difteri"
                    class="w-full p-3 border border-[#3148A8] rounded-l-md text-sm focus:outline-none focus:ring-2 focus:ring-[#3148A8]" />
                <button type="submit" class="bg-[#3148A8] text-white p-3 rounded-r-md hover:bg-[#1E2C67] transition duration-300">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <!-- Filter Tahun dan Kecamatan -->
        <div class="flex gap-4 items-center w-full md:w-2/3 flex-wrap">
            <!-- Filter Tahun -->
            <form action="{{ route('data.klaster') }}" method="GET" class="flex gap-2 w-full md:w-1/3">
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
            <form action="{{ route('data.klaster') }}" method="GET" class="flex gap-2 w-full md:w-1/3">
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
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg mt-5 p-5">
        <table class="min-w-full table-auto text-sm text-left text-gray-500">
            <thead class="bg-[#3148A8] text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Tahun</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Kecamatan</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Kepadatan Penduduk</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Rumah Tidak Sehat</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Vaksinasi DPT</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Jumlah Kasus Difteri</th>
                    <th scope="col" class="px-6 py-3 font-medium text-center">Kategori</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100">
                @foreach ($dataDifteri as $item)
                <tr onclick="window.location='{{ route('data-difteri.show', $item->id_data) }}';" class="cursor-pointer hover:bg-[#4b65c9] hover:text-white transition duration-300 ease-in-out">
                    <td class="px-6 py-4 text-center">{{ $item->tahun->tahun_kejadian }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->kecamatan->nama_kecamatan }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->jml_kepadatan }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->jml_rumah_tidak_sehat }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->jml_vaksinasi_dpt }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->jml_kasus_difteri }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->cluster }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <!-- Pagination -->
        <div class="mt-6 px-4 py-2 flex justify-center">
            {{ $dataDifteri->appends(request()->input())->links('pagination::bootstrap-4') }}
        </div> --}}
    </div>
</div>

@endsection
