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
        return view('event.index', ['event' => Event::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();

        // Membuat array pilihan status
        $statuses = [
            ['id' => '1', 'nama' => 'Crew'],
            ['id' => '2', 'nama' => 'Operator'],
            ['id' => '3', 'nama' => 'Crew + Operator'],
        ];

        return view('event.create2', compact('karyawans', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'tanggal_loading' => 'required|date',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
            'ukuran_led' => 'required',
            'venue' => 'required',
            'karyawan.*' => 'required|exists:karyawans,id',
            'status_crew.*' => 'required',
        ]);

        // Simpan data event
        $event = new Event([
            'tanggal_loading' => $request->input('tanggal_loading'),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_akhir' => $request->input('tanggal_akhir'),
            'ukuran_led' => $request->input('ukuran_led'),
            'alat_tambahan' => $request->input('alat_tambahan'),
            'venue' => $request->input('venue'),
            'note' => $request->input('note'),
        ]);

        $event->save();

        // Simpan data crew
        $crewData = [];
        foreach ($request->input('karyawan') as $key => $karyawanId) {
            $crewData[] = new EventCrew([
                'id_event' => $event->id,
                'id_karyawan' => $karyawanId,
                'status_crew' => $request->input('status_crew.' . $key),
                'keterangan' => $request->input('keterangan_crew.' . $key),
            ]);
        }

        $event->eventCrew()->saveMany($crewData);

        return redirect()->route('event.index')->with('success', 'Data Event telah ditambahkan.');
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
