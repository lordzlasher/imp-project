<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeteranganCrew;


class KeteranganCrewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('keterangan-crew.index', ['keterangan' => KeteranganCrew::get()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keterangan_crew' => 'required',
        ]);

        KeteranganCrew::create($validatedData);

        return redirect()->route('keterangan-crew.index')->with('success', 'Keterangan telah ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'keterangan_crew' => 'required',
        ]);

        KeteranganCrew::where('id', $id)->update($validatedData);

        return redirect()->route('keterangan-crew.index')->with('warning', 'Keterangan telah diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KeteranganCrew::where('id', $id)->delete();
        return redirect()->route('keterangan-crew.index')->with('danger', 'Keterangan telah dihapus.');
    }
}
