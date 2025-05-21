<?php

namespace App\Http\Controllers;

use App\Models\Puskesmas;
use Illuminate\Http\Request;

class PuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //mulai query untuk mengambil data puskesmas
        $query = Puskesmas::query();

        //filter berdasarkan pencarian nama puskesmas
        if($request->has('search') && $request->search != ''){
            $search = $request->search;
            $query->where('nama_puskesmas', 'like', '%' . $search . '%');
        }

        //sorting, meyortir data berdasarkan nama puskesmas secara ascen or descan
        if($request->has('sort_by') && $request->sort_by != ''){
            $query->orderBy($request->sort_by, $request->direction ?? 'asc');
        }

        //pagination data (10 perhalaman)
        $puskesmas = $query->paginate(10);

        //kirim data ke views index_puskesmas
        return view('layouts.admin.data_puskesmas.index_puskesmas', compact('puskesmas'));
    }

    //index untuk user
    public function indexUser(Request $request)
    {
        //mulai query untuk mengambil data puskesmas
        $query = Puskesmas::query();

        //filter berdasarkan nama puskesmas
        if ($request->has('search') && $request->search != ''){
            $search = $request->search;
            $query->where('nama_puskesmas', 'like', '%' . $search . '%');
        }

        //menyortir berdasarkan nama puskesmas secara ascen or descen
        if ($request->has('sort_by') && $request->sort_by != ''){
            $query->orderBy($request->sort_by, $request->direction ?? 'asc');
        }

        //pagination data (10 perpage)
        $puskesmas = $query->paginate(10);

        //kirim data ke views index_puskesmas user
        return view('layouts.user.data_puskesmas.index_puskesmas', compact('puskesmas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.admin.data_puskesmas.create_puskesmas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //validasi data
        $validatedData = $request->validate([
            'nama_puskesmas' => 'required|string|max:255',
            'alamat_puskesmas' => 'required|string|max:255',
            'telp_puskesmas' => "required|string|max:50",

            //tambahan validate baru untuk kolom baru di profile puskesmas
            'identitas_puskesmas' => 'nullable|string',
            'gambar_puskesmas' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'motto' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'jam_layanan' => 'nullable|string',
            'pelayanan' => 'nullable|string'
        ]);

        // handle upload gambar
        if ($request->hasFile('gambar_puskesmas')) {
            $file = $request->file('gambar_puskesmas');
            $path = $file->store('gambar_puskesmas', 'public'); // Simpan di storage/app/public/gambar_puskesmas
            $validatedData['gambar_puskesmas'] = $path;
        }
        // dd($validatedData);

        //simpan data puskesmas ke dalam database
        Puskesmas::create([
            'nama_puskesmas' => $request->nama_puskesmas,
            'alamat_puskesmas' => $request->alamat_puskesmas,
            'telp_puskesmas' => $request->telp_puskesmas,

             // simpan field tambahan untuk profile puskesmas
            'identitas_puskesmas' => $request->identitas_puskesmas,
            'gambar_puskesmas' => $validatedData['gambar_puskesmas'],
            'motto' => $request->motto,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'jam_layanan' => $request->jam_layanan,
            'pelayanan' => $request->pelayanan,
        ]);

        //redirect dgn pesan sukses
        return redirect()->route('puskesmas.index')->with('success', 'Puskesmas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //menampilkan detail puskesmas berdasarkan ID
        $puskesmas = Puskesmas::findOrFail($id);
        return view('layouts.admin.data_puskesmas.show_puskesmas', compact('puskesmas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $puskesmas = Puskesmas::findOrFail($id);
        return view('layouts.admin.data_puskesmas.edit_puskesmas', compact('puskesmas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->file('gambar_puskesmas'));

        //validasi data
        $validatedData = $request->validate([
            'nama_puskesmas' => 'required|string|max:255',
            'alamat_puskesmas' => 'required|string|max:255',
            'telp_puskesmas' => "required|string|max:50",

            //tambahan validate baru untuk kolom baru di profile puskesmas
            'identitas_puskesmas' => 'nullable|string',
            'gambar_puskesmas' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'motto' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'jam_layanan' => 'nullable|string',
            'pelayanan' => 'nullable|string'
        ]);

        if ($request->hasFile('gambar_puskesmas')) {
            $file = $request->file('gambar_puskesmas');
            $path = $file->store('gambar_puskesmas', 'public'); // Simpan di storage/app/public/gambar_puskesmas
            $validatedData['gambar_puskesmas'] = $path;
        }
        // dd($validatedData);

        //cari puskesmas berdasarkan ID
        $puskesmas = Puskesmas::findOrFail($id);

        //update data puskesmas
        $puskesmas->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('puskesmas.index')->with('success', 'Puskesmas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //cari dan hapus puskesmas berdasarkan iD
        Puskesmas::findOrFail($id)->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('puskesmas.index')->with('success', 'Puskesmas berhasil dihapus.');
    }

    //method untuk profile puskesmas
    public function profile($id)
    {
        //menampilkan profil puskesmas berdasarkan ID
        $puskesmas = Puskesmas::findOrFail($id);
        return view('layouts.user.data_puskesmas.profile_puskesmas', compact('puskesmas'));
    }
}
