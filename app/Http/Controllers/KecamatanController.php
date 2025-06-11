<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //menampilkan semua kecamatan
    public function index(Request $request)
    {
        //mulai query untuk mengambil data kecamatan
        $query = Kecamatan::query();

        //filter berdasarkan pencarian
        if($request->has('search') && $request->search != ''){
            $search = $request->search;
            $query->where('nama_kecamatan', 'like', '%' . $search . '%');
        }

        //pagination data (10 perhalaman)
        $kecamatan = $query->paginate(10);

        //kirim data ke view
        return view('layouts.admin.data_kecamatan.index_kecamatan', compact('kecamatan'));
    }

    //index untuk user
    public function indexUser()
    {
        //menampilkan semua data kecamatan
        $kecamatan = Kecamatan::paginate(10);
        return view('layouts.user.data_klaster.index_klaster', compact('kecamatan'));
    }

    //menampilkan form tambah data kecamatan
    public function create()
    {
        return view('layouts.admin.data_kecamatan.create_kecamatan');
    }

    /**
     * Store a newly created resource in storage.
     */
    //menyimpan data kecamatan baru
    public function store(Request $request)
    {
        //dd($request->all());
        //validasi data
        $validatedData = $request->validate([
            'nama_kecamatan' => 'required|string|max:255|unique:kecamatans,nama_kecamatan'
        ]);

        //simpan data kecamatan ke dalam database
        Kecamatan::create([
            'nama_kecamatan' => $request->nama_kecamatan,
        ]);

        //redirect dengan pesan sukses
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    //menampilkan kecamatan berdasarkan ID
    public function show($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('layouts.admin.data_kecamatan.show_kecamatan', compact('kecamatan'));
    }


    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('layouts.admin.data_kecamatan.edit_kecamatan', compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    //mengupdate kecamatan berdasarkan ID
    public function update(Request $request, $id)
    {
        //validasi data
        $validatedData = $request->validate([
            'nama_kecamatan' => 'required|string|max:255',
        ]);

        //cari kecamatan berdasarkan ID
        $kecamatan = Kecamatan::findOrFail($id);

        //update data kevamatan
        $kecamatan->update($validatedData);

        //redirect dgn pesan suskes
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    //mengapus kecamatan berdasarkan ID
    public function destroy($id)
    {
        //cari dan hapus data kecamatan berdasarkan id
        Kecamatan::findOrFail($id)->delete();

        //redirect dgn pesan suskes
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil dihapus');
    }

    //tren-kecamatan di user
    public function trenKecamatan()
    {
        $kecamatans = Kecamatan::all();
        return view('layouts.user.grafik_persebaran.index_tren_kasus', compact('kecamatans'));
    }
}
