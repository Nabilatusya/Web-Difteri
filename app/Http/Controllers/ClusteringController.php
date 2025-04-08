<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClusteringController extends Controller
{
    public function clusterData(Request $request)
    {
        // Ambil data dari request
        $data = $request->input('data');

        // Pastikan ada data yang dikirim
        if (!$data || !is_array($data)) {
            return response()->json(['message' => 'Data tidak valid'], 400);
        }

        // Jalankan clustering
        $result = $this->runKMedoidsClustering($data);

        return response()->json($result);
    }

    private function runKMedoidsClustering($data)
    {
        // Panggil Python script untuk clustering
        $pythonScriptPath = base_path('clustering.py');
        $jsonData = json_encode($data);
        $command = "python3 {$pythonScriptPath} '{$jsonData}'";

        $output = shell_exec($command);

        return json_decode($output, true);
    }
}
