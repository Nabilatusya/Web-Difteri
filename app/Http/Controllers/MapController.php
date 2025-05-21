<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapController extends Controller
{
    public function showMap($year)
    {
        try {
            //fix pake controller yg ini buat leaflet
            // Validasi tahun yang diterima
            if (!is_numeric($year) || $year < 2018 || $year > 2024) {
                return abort(400, "Tahun tidak valid. Harap masukkan tahun antara 2018 dan 2024.");
            }

            // Ambil data dari Flask API
            $response = Http::timeout(5)->get("http://127.0.0.1:5000/cluster_all");

            // Cek apakah response dari Flask berhasil
            if ($response->successful()) {
                // Jika berhasil, ambil data clustering untuk tahun yang diminta
                $data = $response->json();
                $clusteringData = isset($data[$year]) ? $data[$year] : [];

                // Pastikan data clustering tersedia untuk tahun yang diminta
                if (empty($clusteringData)) {
                    $clusteringData = ['error' => "Data clustering tidak ditemukan untuk tahun $year."];
                }

            } else {
                // Jika gagal mengambil data dari Flask
                $clusteringData = ['error' => "Gagal mengambil data dari API Flask."];
            }
        } catch (\Exception $e) {
            // Jika terjadi exception (seperti server Flask tidak dapat dijangkau)
            $clusteringData = ['error' => "Server Flask tidak dapat dijangkau. Silakan coba lagi nanti."];
        }

        // Return view dengan data clustering dan tahun
        return view('layouts.admin.dashboard_admin.mapping', [
            'year' => $year,
            'clustering' => $clusteringData
        ]);
    }
}
