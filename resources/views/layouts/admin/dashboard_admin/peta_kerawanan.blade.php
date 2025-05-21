@extends('layouts.admin.admin_app')

@section('content')
<div class="container my-8 px-4">
    <!-- Title Section -->
    <div class="flex flex-col items-start mb-4">
        <!-- Judul -->
        <h2 class="text-[36px] font-extrabold text-[#3148A8] mb-2 text-left">
            Dashboard Pemetaan Kerawanan Difteri di Surabaya
        </h2>

        <!-- Subjudul -->
        <p class="text-[16px] text-[#1E2C67] text-left mb-4">
            Peta ini menunjukkan tingkat kerawanan difteri di berbagai kecamatan dengan menggunakan tiga warna yang berbeda
        </p>

        <!-- Garis Bawah Judul -->
        <div class="w-56 h-1 bg-[#3148A8] mb-4"></div>

        <!-- Info Section (Compact) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full mb-8">
            <!-- Box 1 -->
            <div class="bg-gradient-to-r from-[#484982] to-[#7576aa] p-4 sm:p-5 rounded-2xl text-left shadow hover:shadow-md transition">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-virus text-3xl text-white"></i>
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-0.5">Jumlah Kasus Difteri</h3>
                        <p class="text-2xl sm:text-[36px] font-bold text-white leading-tight">1024</p>
                    </div>
                </div>
            </div>

            <!-- Box 2 -->
            <div class="bg-gradient-to-r from-[#34a1a1] to-[#6cc5c2] p-4 sm:p-5 rounded-2xl text-left shadow hover:shadow-md transition">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-map-marker-alt text-3xl text-white"></i>
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-0.5">Jumlah Kecamatan</h3>
                        <p class="text-2xl sm:text-[36px] font-bold text-white leading-tight">31</p>
                    </div>
                </div>
            </div>

            <!-- Box 3 -->
            <div class="bg-gradient-to-r from-[#9b9bc1] to-[#9fa2d1] p-4 sm:p-5 rounded-2xl text-left shadow hover:shadow-md transition">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-clinic-medical text-3xl text-white"></i>
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-0.5">Jumlah Puskesmas</h3>
                        <p class="text-2xl sm:text-[36px] font-bold text-white leading-tight">63</p>
                    </div>
                </div>
            </div>

            <!-- Box 4 -->
            <div class="bg-gradient-to-r from-[#c91313] to-[#dd4b49] p-4 sm:p-5 rounded-2xl text-left shadow hover:shadow-md transition">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-calendar-alt text-3xl text-white"></i>
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-0.5">Jumlah Kasus 2024</h3>
                        <p class="text-2xl sm:text-[36px] font-bold text-white leading-tight">20</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Dropdown Tahun -->
        <div class="mb-8 flex justify-start w-full">
            <select id="yearDropdown" class="py-2 px-6 border-2 border-[#1E2C67] rounded-lg text-[#3148A8] w-full md:w-40 focus:outline-none focus:ring-2 focus:ring-[#3148A8] hover:bg-[#f1f5f9] transition duration-200 ease-in-out appearance-none">
                <option value="default">Pilih Tahun</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
        </div>

        <!-- Keterangan Warna -->
        <div id="colorLegend" class="flex justify-start space-x-8 mb-4" style="display: none;">
            <div class="flex items-center space-x-2">
                <span class="block w-6 h-6 bg-[#484982] rounded-full"></span>
                <span class="text-sm font-medium text-gray-700">Kerawanan Tinggi</span>
            </div>
            <div class="flex items-center space-x-2">
                <span class="block w-6 h-6 bg-[#7576aa] rounded-full"></span>
                <span class="text-sm font-medium text-gray-700">Kerawanan Sedang</span>
            </div>
            <div class="flex items-center space-x-2">
                <span class="block w-6 h-6 bg-[#9b9bc1] rounded-full"></span>
                <span class="text-sm font-medium text-gray-700">Kerawanan Rendah</span>
            </div>
        </div>
    </div>

    <!-- Map Embed -->
    <div class="bg-white shadow-lg rounded-lg p-4">
        <iframe id="mapIframe"
            src="http://localhost:3000/public/dashboard/c063f4cc-fa92-46f3-9add-8c5aadf43687"
            frameborder="0"
            width="100%"
            height="500px"
            class="rounded-lg shadow-md">
        </iframe>
    </div>
</div>

<script>
    document.getElementById('yearDropdown').addEventListener('change', function () {
        const selectedYear = this.value;
        const iframe = document.getElementById('mapIframe');
        const colorLegend = document.getElementById('colorLegend');

        const yearColors = {
            "2018": ["#474882", "#7677ab", "#9b9bc2"],
            "2019": ["#34a1a1", "#6cc5c2", "#a3e3df"],
            "2020": ["#c35908", "#df8048", "#f4b187"],
            "2021": ["#c39500", "#e1b444", "#f1cf79"],
            "2022": ["#c91313", "#dd4b49", "#e37776"],
            "2023": ["#496c22", "#799a56", "#9fb984"],
            "2024": ["#613b82", "#8e6bac", "#ad93c4"],
        };

        const colors = yearColors[selectedYear] || yearColors["2018"];
        const colorDivs = colorLegend.querySelectorAll('div');

        colorDivs[0].querySelector('span').style.backgroundColor = colors[0];
        colorDivs[1].querySelector('span').style.backgroundColor = colors[1];
        colorDivs[2].querySelector('span').style.backgroundColor = colors[2];

        const yearLinks = {
            "2018": "http://localhost:3000/public/question/56a7a1ae-cf7d-4472-ae53-f519ee24ea75",
            "2019": "http://localhost:3000/public/question/51e46a20-62a7-4e7f-a506-d3d2651b5b9d",
            "2020": "http://localhost:3000/public/question/d4ed634e-e6a7-425c-850f-082f7ff95d51",
            "2021": "http://localhost:3000/public/question/678b377c-924d-4886-9942-70dd80c169af",
            "2022": "http://localhost:3000/public/question/57fd4956-031a-4c6d-8054-9a7b4346bab6",
            "2023": "http://localhost:3000/public/question/10cd78a0-62a7-4444-955c-9f5192e3b08d",
            "2024": "http://localhost:3000/public/question/050a1f24-cb57-4fa6-880f-1823530c87e2"
        };

        if (yearLinks[selectedYear]) {
            iframe.src = yearLinks[selectedYear];
            colorLegend.style.display = "flex";
        } else {
            iframe.src = "http://localhost:3000/public/dashboard/c063f4cc-fa92-46f3-9add-8c5aadf43687";
            colorLegend.style.display = "none";
        }
    });
</script>
@endsection
