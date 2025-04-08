<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //menampilkan semua admin
    public function index()
    {
        return response()->json(Admin::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    //menyimpan data admin baru
    public function store(Request $request)
    {
        //validasi input
        $validatedData = $request->validate([
            'username' => 'required|string|unique:admins,username',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
        ]);

        //simpan admin baru
        $admin = Admin::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            //hash pw sebelum dismipan
            'password' => Hash::make($validatedData['password']),
        ]);

        return response()->json(["message" => "Admin berhasil dibuat", "data" => $admin], 201);
    }

    /**
     * Display the specified resource.
     */
    //menampilkan data admin berdasarkan id
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        if(!$admin){
            return response()->json(["message" => "admin tidak ditemukan"], 404);
        }

        return response()->json($admin, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    //meperbarui data admin
    public function update(Request $request, $id)
    {
        $admin = Admin::find($id);
        if (!$admin){
            return response()->json(["message" => "Admin tidak ditemukan"], 404);
        }

        //validasi input
        $validatedData = $request->validate([
            'username' => 'sometimes|string|unique:admins,username,' . $id . ',id_admins',
            'email' => 'sometimes|email|unique:admins,email,' . $id . ',id_admins',
            'password' => 'sometimes|string|min:6',
        ]);

        //update admin
        $admin->update([
            'username' => $validatedData['username'] ?? $admin->username,
            'email' => $validatedData['email'] ?? $admin->email,
            'password' => isset($validatedData['password']) ? Hash::make($validatedData['password']) : $admin->password,

        ]);

        return response()->json(["message" => "Admin berhasil diperbarui", "data" => $admin], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    //menghapus data admin
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if (!$admin){
            return response()->json(["message" => "Admin tidak ditemukan"], 404);
        }

        $admin->delete();
        return response()->json(["message" => "Admin berhasil dihapus"], 200);
    }
}
