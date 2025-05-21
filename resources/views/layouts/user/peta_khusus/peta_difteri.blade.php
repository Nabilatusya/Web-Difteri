@extends('layouts.user_app')

@section('content')
<div class="container my-5 px-4 sm:mt-32 md:mt-40">
    <!-- Title Section -->
    <div class="flex flex-col items-start mb-6" style="font-family: 'Poppins', sans-serif;"3>
        <!-- Judul -->
        <h2 class="text-[36px] font-extrabold text-[#3148A8] mb-2 text-left">
            Peta Kasus Persebaran Difteri di Kota Surabaya
        </h2>

        <!-- Subjudul -->
        <p class="text-[16px] text-[#1E2C67] text-left mb-4">
            Peta ini menunjukkan tingkat kerawanan difteri di berbagai kecamatan dengan menggunakan tiga warna yang berbeda
        </p>

        <!-- Garis Bawah Judul -->
        <div class="w-56 h-1 bg-[#3148A8] mb-4"></div>

        <!-- Dropdown Tahun -->
        <div class="mb-6">
            <select id="yearDropdown" class="py-2 px-4 border-2 border-[#1E2C67] rounded-lg text-[#3148A8] w-38 focus:outline-none focus:ring-2 focus:ring-[#3148A8] hover:bg-[#f1f5f9] transition duration-200 ease-in-out appearance-none">
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

        <!-- Keterangan Warna (Hanya Ditampilkan Jika Tahun Dipilih) -->
        <div id="colorLegend" class="flex justify-center space-x-8 mb-6" style="display: none;">
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

    <!-- Iframe Embed Section -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <iframe id="mapIframe"
            src="http://localhost:3000/public/dashboard/c063f4cc-fa92-46f3-9add-8c5aadf43687"
            frameborder="0"
            width="100%"
            height="600px"
            class="rounded-lg shadow-md">
        </iframe>
    </div>
</div>

<script>
    // JavaScript untuk mengubah URL iframe dan menampilkan keterangan warna berdasarkan tahun
    document.getElementById('yearDropdown').addEventListener('change', function() {
        const selectedYear = this.value;
        const iframe = document.getElementById('mapIframe');
        const colorLegend = document.getElementById('colorLegend');

        // Menetapkan warna berdasarkan tahun
        const yearColors = {
            "2018": ["#474882", "#7677ab", "#9b9bc2"],
            "2019": ["#34a1a1", "#6cc5c2", "#a3e3df"],
            "2020": ["#c35908", "#df8048", "#f4b187"],
            "2021": ["#c39500", "#e1b444", "#f1cf79"],
            "2022": ["#c91313", "#dd4b49", "#e37776"],
            "2023": ["#496c22", "#799a56", "#9fb984"],
            "2024": ["#613b82", "#8e6bac", "#ad93c4"],
        };

        // Set warna legenda berdasarkan tahun yang dipilih
        const colors = yearColors[selectedYear] || yearColors["2018"];  // Default ke tahun 2018 jika tidak ada tahun yang dipilih

        // Update warna legenda
        const colorDivs = colorLegend.querySelectorAll('div');
        colorDivs[0].querySelector('span').style.backgroundColor = colors[0];  // Warna Tinggi
        colorDivs[1].querySelector('span').style.backgroundColor = colors[1];  // Warna Sedang
        colorDivs[2].querySelector('span').style.backgroundColor = colors[2];  // Warna Rendah

        // Mengubah iframe source sesuai tahun yang dipilih
        const yearLinks = {
            "2018": "http://localhost:3000/public/question/56a7a1ae-cf7d-4472-ae53-f519ee24ea75",
            "2019": "http://localhost:3000/public/question/51e46a20-62a7-4e7f-a506-d3d2651b5b9d",
            "2020": "http://localhost:3000/public/question/d4ed634e-e6a7-425c-850f-082f7ff95d51",
            "2021": "http://localhost:3000/public/question/678b377c-924d-4886-9942-70dd80c169af",
            "2022": "http://localhost:3000/public/question/57fd4956-031a-4c6d-8054-9a7b4346bab6",
            "2023": "http://localhost:3000/public/question/10cd78a0-62a7-4444-955c-9f5192e3b08d",
            "2024": "http://localhost:3000/public/question/050a1f24-cb57-4fa6-880f-1823530c87e2"
        };

        // Jika tahun yang dipilih valid, ubah iframe source dan tampilkan keterangan warna
        if (yearLinks[selectedYear]) {
            iframe.src = yearLinks[selectedYear];
            colorLegend.style.display = "flex";  // Menampilkan keterangan warna
        } else {
            // Jika "Pilih Tahun" dipilih, kembali ke default dan sembunyikan keterangan warna
            iframe.src = "http://localhost:3000/public/dashboard/c063f4cc-fa92-46f3-9add-8c5aadf43687";
            colorLegend.style.display = "none";  // Menyembunyikan keterangan warna
        }
    });
</script>
@endsection
