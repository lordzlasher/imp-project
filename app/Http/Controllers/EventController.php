<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Event;
use App\Models\EventCrew;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('event.index',['event' => Event::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        return view('event.create2',compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_loading' => 'required',
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
            'ukuran_led' => 'required',
            'venue' => 'required',
            'nomer_hp' => 'required|numeric'
        ]);

        Event::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nomer_hp' => $request->nomer_hp
        ]);

        return redirect()->route('event.index')->with('success','Data Event telah ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
