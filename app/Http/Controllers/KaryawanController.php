<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\EventCrew;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('karyawan.index', ['karyawan' => Karyawan::orderBy('nama')->get()]);
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nomer_hp' => 'required|numeric',
            'jenis_bank' => 'required',
            'nomer_rekening' => 'required',
        ]);

        if ($request->file('ktp')) {
            // Dapatkan nama dari kolom 'nama'
            $nama = $validatedData['nama'];

            // Gabungkan nama file dengan "_ktp" dan simpan
            $validatedData['ktp'] = $request->file('ktp')->storeAs('ktp', $nama . '_ktp' . '.' . $request->file('ktp')->getClientOriginalExtension(), 'public');
        } else {
            $validatedData['ktp'] = 'ktp/ktp_preview.jpg';
        }

        Karyawan::create($validatedData);

        return redirect()->route('karyawan.index')->with('success', 'Data Karyawan telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $startDate = Session::get('start_date');
        $endDate = Session::get('end_date');

        $karyawan = Karyawan::find($id);

        $crewEvents = EventCrew::where('id_karyawan', $id)
            ->whereHas('event', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal_mulai', [$startDate, $endDate]);
            })
            ->with('event')
            ->orderBy(function ($query) {
                $query->from('events')
                    ->whereColumn('events.id', 'event_crews.id_event')
                    ->select('events.tanggal_mulai')
                    ->orderBy('events.tanggal_mulai');
            })
            ->get();

        return view('karyawan.show', compact('karyawan', 'crewEvents'));
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
            'nomer_hp' => 'required|numeric',
            'jenis_bank' => 'required',
            'nomer_rekening' => 'required',
        ]);

        // Periksa apakah ada file 'ktp' baru yang diunggah
        if ($request->hasFile('ktp')) {
            // Dapatkan nama dari kolom 'nama'
            $nama = $validatedData['nama'];

            // Hapus file 'ktp' lama jika ada
            $oldKtpPath = Karyawan::find($id)->ktp;
            if ($oldKtpPath) {
                Storage::disk('public')->delete($oldKtpPath);
            }

            // Simpan file 'ktp' yang baru diupdate
            $validatedData['ktp'] = $request->file('ktp')->storeAs('ktp', $nama . '_ktp' . '.' . $request->file('ktp')->getClientOriginalExtension(), 'public');
        }

        Karyawan::where('id', $id)->update($validatedData);

        return redirect()->route('karyawan.index')->with('warning', 'Data Karyawan berhasil diedit.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Karyawan::where('id', $id)->delete();
        return redirect()->route('karyawan.index')->with('danger', 'Data Karyawan telah dihapus.');
    }
}
