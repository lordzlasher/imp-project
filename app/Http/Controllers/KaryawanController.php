<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('karyawan.index',['karyawan' => Karyawan::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nomer_hp' => 'required|numeric'
        ]);

        Karyawan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomer_hp' => $request->nomer_hp
        ]);

        return redirect()->route('karyawan.index')->with('success','Data Karyawan telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nomer_hp' => 'required|numeric'
        ]);

        Karyawan::where('id',$id)->update($validatedData);
        
        return redirect('/karyawan')->with('success','Data Karyawan berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->delete();
        return redirect('/karyawan')->with('success','Data Karyawan telah dihapus.');
    }
}
