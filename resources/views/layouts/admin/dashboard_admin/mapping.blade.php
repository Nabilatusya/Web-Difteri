@extends('layouts.admin.admin_app')

@section('content')
<div class="container mx-auto px-4 py-8">
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

    <!-- Dropdown Tahun (pindah ke kiri) -->
    <div class="mb-6 flex justify-start">
        <div class="relative inline-block w-48">
        {{-- <label for="year" class="text-lg text-gray-600">Pilih Tahun</label> --}}
        <select id="year" class="py-2 px-4 border-2 border-[#1E2C67] rounded-lg text-[#3148A8] w-full focus:outline-none focus:ring-2 focus:ring-[#3148A8] hover:bg-[#f1f5f9] transition duration-200 ease-in-out appearance-none" onchange="updateMap()">
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
        </select>
        {{-- <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div> --}}
        </div>
    </div>

    <!-- Peta -->
    <div id="map" style="height: 600px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"></div>
</div>

<!-- Leaflet CDN -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
  var map = L.map('map').setView([-7.2756, 112.6426], 11); // Koordinat Surabaya

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap'
  }).addTo(map);

  let clusterData = {};

  // Step 1: Ambil data cluster dari Flask
  fetch('http://127.0.0.1:5000/cluster_all')
    .then(res => res.json())
    .then(apiData => {
      clusterData = apiData;
      updateMap();  // Menampilkan data untuk tahun default (2018)
    });

  // Fungsi untuk memperbarui peta dengan data berdasarkan tahun yang dipilih
  function updateMap() {
    const selectedYear = document.getElementById('year').value;
    const clustersForYear = clusterData[selectedYear] || [];

    // Kosongkan peta sebelum menampilkan data baru
    map.eachLayer(function (layer) {
      if (layer instanceof L.GeoJSON) {
        map.removeLayer(layer);
      }
    });

    // Load GeoJSON setelah cluster map siap
    fetch('/geo/bataskecsby.geojson')
      .then(res => res.json())
      .then(geojsonData => {
        L.geoJSON(geojsonData, {
          style: function (feature) {
            return {
              color: "black",  // Warna batas untuk fitur
              weight: 1,  // Ketebalan garis batas
              fillColor: getColor(feature.properties.name, clustersForYear),
              fillOpacity: 0.6
            };
          },
          onEachFeature: function (feature, layer) {
            const nama = feature.properties.name;
            const cluster = findClusterForKecamatan(nama, clustersForYear) || "Tidak diketahui";

            // Menambahkan Tooltip (Label) pada layer
            layer.bindTooltip(nama, { permanent: true, direction: 'center', className: 'leaflet-tooltip-custom' });

            // Menampilkan Popup dengan detail lebih
            layer.bindPopup(`
              <div style="font-weight: bold; font-size: 16px;">${nama}</div>
              <div>Cluster: <span style="color: ${getColor(nama, clustersForYear)};">${cluster}</span></div>
              <div>Tahun: ${document.getElementById('year').value}</div>
            `);
          }
        }).addTo(map);
      });
  }

  // Fungsi untuk mencari cluster berdasarkan nama kecamatan
  function findClusterForKecamatan(namaKecamatan, clusters) {
    const clusterData = clusters.find(item => item.nama_kecamatan === namaKecamatan);
    return clusterData ? clusterData.cluster : null;
  }

  // Fungsi untuk memberikan warna sesuai dengan cluster
  function getColor(kecamatan, clusters) {
    const cluster = findClusterForKecamatan(kecamatan, clusters);

    switch(cluster) {
      case "Kerawanan Tinggi":
        return "red";  // Warna merah untuk cluster Tinggi
      case "Kerawanan Sedang":
        return "yellow";  // Warna kuning untuk cluster Sedang
      case "Kerawanan Rendah":
        return "green";  // Warna hijau untuk cluster Rendah
      default:
        return "gray";  // Warna abu-abu jika tidak diketahui
    }
  }
</script>

<!-- Custom CSS -->
<style>
  .leaflet-tooltip-custom {
    font-size: 12px;
    font-weight: bold;
    color: #000;  /* Warna hitam untuk teks */
    background-color: transparent;  /* Tanpa latar belakang */
    padding: 0;  /* Tidak ada padding */
    border: none;  /* Menghilangkan border */
    border-radius: 0;  /* Tidak ada sudut melengkung */
    box-shadow: none;  /* Menghilangkan bayangan */
    text-shadow: none;  /* Menghilangkan bayangan teks */
  }

  .leaflet-popup-content {
    font-family: 'Arial', sans-serif;
    font-size: 14px;
    line-height: 1.5;
    text-align: center;
  }

  .leaflet-popup-tip {
    background-color: #ffcc00; /* Warna kuning untuk pop-up tip */
  }
</style>
@endsection
