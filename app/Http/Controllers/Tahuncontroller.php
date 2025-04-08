<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class Tahuncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //mengambil semua data tahun kejadian
    public function index()
    {
        $tahun = Tahun::all();
        return view('layouts.admin.data_tahun.index_tahun', compact('tahun'));
    }


    //menampilkan form create data tahun
    public function create()
    {
        return view('layouts.admin.data_tahun.create_tahun');
    }

    /**
     * Store a newly created resource in storage.
     */
    //menyimpan data tahun baru ke database
    public function store(Request $request)
    {
        // dd($request->all());
        //validasi data
        $validatedData = $request->validate([
            'tahun_kejadian' => 'required|integer'
        ]);

        //simpan data tahun ke dalam database
        Tahun::create([
            'tahun_kejadian' => $request->tahun_kejadian,
        ]);

        //redirect dengan pesan sukses
        return redirect()->route('tahun.index')->with('success', 'Tahun berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    //menampilkan detail tahun berdasarkan ID
    public function show($id)
    {
        $tahun = Tahun::findOrFail($id);
        return view('layouts.admin.data_tahun.show_tahun', compact('tahun'));
    }

    //menampilkan form edit data tahun
    public function edit($id)
    {
        $tahun = Tahun::findOrFail($id);
        return view('layouts.admin.data_tahun.edit_tahun', compact('tahun'));
    }

    /**
     * Update the specified resource in storage.
     */
    //mengupdate data tahun berdasarkan ID
    public function update(Request $request, $id)
    {
        //validasi data
        $validatedData = $request->validate([
            'tahun_kejadian' => 'required|integer',
        ]);

        //cari data tahub berdasarkan ID
        $tahun = Tahun::findOrFail($id);

        //update data tahun
        $tahun->update($validatedData);

        //redirect dengan pesan sukses
        return redirect()->route('tahun.index')->with('success', 'Data tahun berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    //menghapus data tahun berdasarkan ID
    public function destroy($id)
    {
        //cari dan hapus data tahun berdasarkan ID
        Tahun::findOrFail($id)->delete();

        //redirect dengan pesan sukses
        return redirect()->route('tahun.index')->with('success', 'Data tahun berhasil dihapus');
    }
}
