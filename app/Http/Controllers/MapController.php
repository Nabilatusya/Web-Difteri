<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapController extends Controller
{
    public function showMap($year)
    {
        try {
            if (!is_numeric($year) || $year < 2019 || $year > 2024) {
                return abort(400, "Tahun tidak valid");
            }

            // Ambil data dari Flask API
            $response = Http::timeout(5)->get("http://127.0.0.1:5000/api/clustering/$year");

            if ($response->successful()) {
                $data = $response->json();
            } else {
                $data = ['clustering' => [], 'error' => "Gagal mengambil data dari API"];
            }
        } catch (\Exception $e) {
            $data = ['clustering' => [], 'error' => "Server Flask tidak dapat dijangkau"];
        }

        return view('layouts.admin.dashboard_admin.peta_kerawanan', [
            'year' => $year,
            'clustering' => $data['clustering']
        ]);
    }
}
