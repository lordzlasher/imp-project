<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventCrew;
use App\Models\Karyawan;
use App\Models\StatusCrew;
use App\Models\KeteranganCrew;
use App\Models\KategoriEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;



class EventController extends Controller
{
    /**
     * Menampilkan daftar event.
     */
    public function index()
    {
        $startDate = Session::get('start_date');
        $endDate = Session::get('end_date');

        // Mengambil semua event berdasarkan tanggal_mulai dari Session dan order by tanggal_loading
        $events = Event::whereBetween('tanggal_mulai', [$startDate, $endDate])
            ->orderBy('tanggal_loading')
            ->get();

        // Mendapatkan events untuk kategori_event "BALI"
        $eventBali = Event::join('kategori_events', 'events.id_kategori_event', '=', 'kategori_events.id')
            ->where('kategori_events.kategori_event', 'Bali')
            ->whereBetween('events.tanggal_mulai', [$startDate, $endDate])
            ->orderBy('events.tanggal_loading')
            ->select('events.*') // Menambahkan ini untuk memilih semua kolom dari tabel events
            ->get();

        // Mendapatkan events untuk kategori_event "SURABAYA"
        $eventSurabaya = Event::join('kategori_events', 'events.id_kategori_event', '=', 'kategori_events.id')
            ->where('kategori_events.kategori_event', 'Surabaya')
            ->whereBetween('events.tanggal_mulai', [$startDate, $endDate])
            ->orderBy('events.tanggal_loading')
            ->select('events.*') // Menambahkan ini untuk memilih semua kolom dari tabel events
            ->get();

        return view('event.index', compact('events', 'eventBali', 'eventSurabaya'));
    }

    /**
     * Menampilkan form untuk membuat event baru.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        $statuses = StatusCrew::all();
        $keterangans = KeteranganCrew::all();
        $kategories = KategoriEvent::all();

        return view('event.create', compact('karyawans', 'statuses', 'keterangans', 'kategories'));
    }

    /**
     * Menyimpan event baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            // 'tanggal_loading' => 'required',
            'ukuran_led' => 'required',
            'venue' => 'required',
            'client' => 'required',
            'kategori_event' => 'required',
        ]);

        // Menyimpan Tanggal Acara dengan 2 Variabel
        $tanggalAcaraRange = $request->input('tanggal_acara');
        $tanggalAcara = $tanggalAcaraRange[0];

        // Pecah tanggal berdasarkan tanda "-"
        $dateParts = explode(" - ", $tanggalAcara);

        // Konversi tanggal ke dalam format yang diinginkan
        $tanggalMulai = Carbon::parse($dateParts[0])->toDateString();
        $tanggalSelesai = Carbon::parse($dateParts[1])->toDateString();

        // Simpan data event
        $event = new Event([
            'tanggal_loading' => Carbon::parse($request->input('tanggal_loading'))->format('Y-m-d'),
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_akhir' => $tanggalSelesai,
            'ukuran_led' => $request->input('ukuran_led'),
            'venue' => $request->input('venue'),
            'client' => $request->input('client'),
            'note' => $request->input('note'),
            'id_kategori_event' => $request->input('kategori_event'),
        ]);

        $event->save();

        // Simpan data crew jika ada input karyawan
        $karyawanInput = $request->input('karyawan');
        if (!empty($karyawanInput)) {
            $crewData = [];
            foreach ($karyawanInput as $key => $karyawanId) {
                $crewData[] = new EventCrew([
                    'id_event' => $event->id,
                    'id_karyawan' => $karyawanId,
                    'id_status_crew' => $request->input('status_crew'),
                    'id_keterangan_crew' => $request->input('keterangan_crew'),
                ]);
            }
            $event->eventCrew()->saveMany($crewData);
        }

        return redirect()->route('event.index')->with('success', 'Data Event telah ditambahkan.');
    }

    /**
     * Menampilkan detail event.
     */
    public function show(string $id)
    {
        // Ambil data event berdasarkan ID
        $events = Event::find($id);

        // Ambil data event crew terkait
        $eventCrews = EventCrew::where('id_event', $id)->get();

        // Ambil data semua karyawan
        $karyawans = Karyawan::all();

        // Ambil data semua status
        $statuses = StatusCrew::all();

        // Ambil data semua keterangan
        $keterangans = KeteranganCrew::all();

        // Ambil data semua kategori
        $kategories = KategoriEvent::all();

        // Tampilkan rentang tanggal pada show event
        $tanggal_acara = $events->formatted_date_range;

        // Tampilkan rentang tanggal untuk update event
        $input_tanggal_acara = $events->getFormattedDateAcara();

        // Tampilkan view
        return view('event.show', compact('events', 'eventCrews', 'tanggal_acara', 'karyawans', 'statuses', 'keterangans', 'input_tanggal_acara', 'kategories'));
    }

    /**
     * Menyimpan data crew untuk event tertentu.
     */
    public function storeCrew(Request $request, $eventId)
    {
        // Validasi input
        $request->validate([
            'karyawan_id' => 'required',
            'status_crew' => 'required',
            'keterangan_crew' => 'required',
        ]);

        // Logika penyimpanan kru baru
        $event = Event::findOrFail($eventId);

        // Pastikan 'id_karyawan' diisi dengan nilai yang valid
        $event->eventCrew()->create([
            'id_event' => $event->id,
            'id_karyawan' => $request->input('karyawan_id'),
            'id_status_crew' => $request->input('status_crew'),
            'id_keterangan_crew' => $request->input('keterangan_crew'),
        ]);

        // Redirect atau tindakan lainnya
        return redirect()->back()->with('success', 'Crew berhasil ditambahkan');
    }

    /**
     * Mengupdate data crew untuk event tertentu.
     */
    public function updateCrew(Request $request, $crewId)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'status_crew' => 'required',
            'keterangan_crew' => 'required',
        ]);

        // Dapatkan instance Crew berdasarkan ID
        $crew = EventCrew::findOrFail($crewId);

        // Update data crew berdasarkan data dari form
        $crew->update([
            'id_status_crew' => $request->input('status_crew'),
            'id_keterangan_crew' => $request->input('keterangan_crew'),
        ]);

        // Redirect atau berikan respons sesuai kebutuhan Anda
        return redirect()->back()->with('warning', 'Crew berhasil diupdate.');
    }

    /**
     * Mengupdate data event.
     */
    public function updateEvent(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'tanggal_loading' => 'required',
            'tanggal_acara.*' => 'required',
            'ukuran_led' => 'required',
            'venue' => 'required',
        ]);

        // Menyimpan Tanggal Acara dengan 2 Variabel
        $tanggalAcaraRange = $request->input('tanggal_acara');
        $tanggalAcara = $tanggalAcaraRange[0];

        // Pecah tanggal berdasarkan tanda "-"
        $dateParts = explode(" - ", $tanggalAcara);

        // Konversi tanggal ke dalam format yang diinginkan
        $tanggalMulai = Carbon::parse($dateParts[0])->toDateString();
        $tanggalSelesai = Carbon::parse($dateParts[1])->toDateString();

        // Dapatkan instance event
        $event = Event::findOrFail($id);

        // Simpan data event
        $event->update([
            'tanggal_loading' => Carbon::parse($request->input('tanggal_loading'))->format('Y-m-d'),
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_akhir' => $tanggalSelesai,
            'ukuran_led' => $request->input('ukuran_led'),
            'venue' => $request->input('venue'),
            'client' => $request->input('client'),
            'note' => $request->input('note'),
            'id_kategori_event' => $request->input('kategori_event'),
        ]);

        return redirect()->back()->with('warning', 'Event berhasil diupdate.');
    }

    /**
     * Menghapus event.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('event.index')->with('danger', 'Data Event telah dihapus.');
    }

    /**
     * Menghapus crew dari event.
     */
    public function deleteCrew(string $id)
    {
        EventCrew::where('id', $id)->delete();
        return redirect()->back()->with('danger', 'Crew telah dihapus dari event.');

    }
}
