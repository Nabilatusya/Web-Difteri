<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use App\Models\Kecamatan;
use App\Models\DataDifteri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class DataDifteriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //menampilkan semua data difteri
    public function index(Request $request)
    {
        //ambil data tahun dan kecamatan untuk difiler
        $tahun = Tahun::all();
        $kecamatan = Kecamatan::all();

        //mulai query untuk memhgambil data dengan relasi ke tahun dan kecamatan
        $query = DataDifteri::with(['tahun', 'kecamatan']);

        //filter berdasarkan search
        if($request->has('search') && $request->search != ''){
            $search = $request->search;
            $query->where(function ($q) use ($search){
                $q->where('id_data','like', '%' . $search . '%')->orWhereHas('tahun', function ($q) use ($search){
                    $q->where('tahun_kejadian', 'like', '%' . $search . '%');
                })
                ->orWhereHas('kecamatan', function ($q) use ($search){
                    $q->where('nama_kecamatan', 'like', '%' . $search . '%');
                });
            });
        }

        //filter berdasarkan tahun
        if($request->has('tahun_filter') && $request->tahun_filter != ''){
            $query->where('id_tahun', $request->tahun_filter);
        }

        //filter berdasarkan kecamatan
        if($request->has('kecamatan_filter') && $request->kecamatan_filter != ''){
            $query->where('id_kecamatan', $request->kecamatan_filter);
        }

        //pagination data (misalnya 10 data perpage)
        $dataDifteri = $query->paginate(31);


        //ambil semua data dengan relasi ke tahun dan kecamatan
        // $dataDifteri = DataDifteri::with(['tahun', 'kecamatan'])->get();
        return view('layouts.admin.data_difteri.index_difteri', compact('dataDifteri', 'tahun', 'kecamatan'));
    }

    public function indexUser()
    {
        //menampilkan semua data difteri
        $dataDifteri = DataDifteri::all();
        return view('layouts.user.data_klaster.index_klaster', compact('tahun', 'kecamatan'));
    }

    //menampilkan form tambah data difteri
    public function create()
    {
        $tahun = Tahun::all();
        $kecamatan = Kecamatan::all();
        return view('layouts.admin.data_difteri.create_difteri', compact('tahun', 'kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    //menyimpan data difteri baru ke db
    public function store(Request $request)
    {
        // dd($request->all());
        //valisasi data yang dikirim dari req
        $validatedData = $request->validate([
            'id_tahun' => 'required|exists:tahuns,id_tahun',
            'id_kecamatan' => 'required|exists:kecamatans,id_kecamatan',
            'jml_kepadatan' => 'required|numeric',
            'jml_rumah_tidak_sehat' => 'required|integer',
            'jml_vaksinasi_dpt' => 'required|integer',
            'jml_kasus_difteri' => 'required|integer',
            'cluster' => 'nullable|string',
        ]);

        // dd($validatedData);
        //simpan data ke database
        DataDifteri::create($validatedData);

        return redirect()->route('data-difteri.index')->with('success', 'Data difteri berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    //menampilkan satu data difteri berdasarkan UD
    public function show($id)
    {
        //cari data berdasarkan ID
        $dataDifteri = DataDifteri::with(['tahun', 'kecamatan'])->findOrFail($id);
        return view('layouts.admin.data_difteri.show_difteri', compact('dataDifteri'));
    }


    //menampilkan form edit data difteri
    public function edit($id)
    {
        $dataDifteri = DataDifteri::findOrFail($id);
        $tahun = Tahun::all();
        $kecamatan = Kecamatan::all();
        return view('layouts.admin.data_difteri.edit_difteri', compact('dataDifteri', 'tahun', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    //update data difteri berdasarkan ID
    public function update(Request $request, $id)
    {
        //validasi data
        $validatedData = $request->validate([
            'id_tahun' => 'required|exists:tahuns,id_tahun',
            'id_kecamatan' => 'required|exists:kecamatans,id_kecamatan',
            'jml_kepadatan' => 'required|numeric',
            'jml_rumah_tidak_sehat' => 'required|integer',
            'jml_vaksinasi_dpt' => 'required|integer',
            'jml_kasus_difteri' => 'required|integer',
            'cluster' => 'nullable|string',
        ]);

        //cari data difteri berdasarkan id
        $dataDifteri = DataDifteri::with(['tahun', 'kecamatan'])->findOrFail($id);

        //update data difteri
        $dataDifteri->update($validatedData);

        //redirect dgn pesan sukses
        return redirect()->route('data-difteri.index')->with('success', 'Data difteri berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    //menghapus data difteri berdasarkan ID
    public function destroy($id)
    {
        //cari dan hapus data difteri berdasarkan ID
        DataDifteri::findOrFail($id)->delete();

        //redirect dgn pesan sukses
        return redirect()->route('data-difteri.index')->with('success', 'Data Difteri berhasil dihapus');
    }


    public function getClusteringData()
    {
        try {
            Log::info("Menghubungi Flask API untuk clustering...");

            // Ambil data dari Flask
            $response = Http::timeout(10)->get("http://127.0.0.1:5000/cluster_all");

            if ($response->successful()) {
                $data = $response->json();
                Log::info("Data clustering berhasil diambil.");

                return view('layouts.admin.dashboard_admin.peta_kerawanan', compact('data'));
            } else {
                Log::error("Gagal mengambil data clustering. Status: " . $response->status());
                return view('layouts.admin.dashboard_admin.peta_kerawanan')->withErrors("Error mengambil data dari Flask.");
            }
        } catch (\Exception $e) {
            Log::error("Exception saat menghubungi Flask: " . $e->getMessage());
            return view('layouts.admin.dashboard_admin.peta_kerawanan')->withErrors("Gagal menghubungi Flask API.");
        }
    }

}
