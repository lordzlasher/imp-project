<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\EventCrew;
use App\Models\Karyawan;
use App\Models\Inventory;
use App\Models\InventoryLog;



class DashboardController extends Controller
{

    protected $startDate;
    protected $endDate;

    public function __construct()
    {
        // Inisialisasi tanggal mulai dan tanggal akhir dari Session atau default ke awal dan akhir bulan
        $this->startDate = Session::get('start_date', Carbon::now()->startOfMonth()->toDateString());
        $this->endDate = Session::get('end_date', Carbon::now()->endOfMonth()->toDateString());

        // Menyimpan tanggal mulai dan tanggal akhir ke dalam Session
        Session::put('start_date', $this->startDate);
        Session::put('end_date', $this->endDate);
    }

    public function index()
    {
        // Mendapatkan tanggal mulai dan tanggal akhir dari sesi
        $startDate = Session::get('start_date');
        $endDate = Session::get('end_date');

        // Ambil tahun dari startDate
        $year = date('Y', strtotime($startDate));

        // Ambil data total jumlah event per bulan dengan filter tahun
        $totalEventsPerMonth = Event::select(DB::raw('MONTH(tanggal_mulai) as month'), DB::raw('COUNT(*) as total'))
            ->whereYear('tanggal_mulai', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Ambil data event dari backend untuk Calender
        $events = Event::select('id', 'tanggal_mulai', 'tanggal_akhir', 'venue', 'client', 'id_kategori_event')
            ->whereYear('tanggal_mulai', $year)
            ->get();

        // Konversi data event ke format yang diharapkan oleh FullCalendar
        $calendarEventsList = [];
        foreach ($events as $event) {
            $title = $event->client . ' - ' . $event->venue;
            $calendarColor = ($event->kategoriEvent->kategori_event == 'Bali') ? 'Primary' : 'Warning'; // Sesuaikan dengan warna kalender yang diinginkan

            $calendarEventsList[] = [
                'id' => $event->id,
                'title' => $title,
                'start' => $event->tanggal_mulai,
                'end' => $event->tanggal_akhir,
                'extendedProps' => [
                    'calendar' => $calendarColor,
                ],
            ];
        }

        // Menginisialisasi array untuk labels bulan dan data total event
        $labels = [];
        $data = [];

        // Membuat array berisi data total event dan labels bulan
        foreach ($totalEventsPerMonth as $item) {
            $monthNumber = $item->month;
            $monthName = Carbon::createFromDate(null, $monthNumber, 1)->format('F');

            $labels[] = $monthName;
            $data[] = $item->total;
        }

        // Mendapatkan data total event crew
        $crewEvents = Karyawan::getCrewEventsTotal();

        // Mendapatkan data inventory
        $inventories = Inventory::all();

        // Mendapatkan data log inventory
        $logs = InventoryLog::whereBetween('created_at', [$startDate, $endDate])
            ->orderByDesc('created_at')
            ->get();

        // Menampilkan halaman dashboard dengan data yang diperoleh
        return view('dashboard', compact('crewEvents', 'labels', 'data', 'inventories', 'logs', 'calendarEventsList'));
    }

    public function filter(Request $request)
    {
        // Menyimpan Tanggal Acara dengan 2 Variabel
        $tanggalFilterRange = $request->input('filter_date');

        // Pecah tanggal berdasarkan tanda "-"
        $dateParts = explode(" - ", $tanggalFilterRange);

        // Konversi tanggal ke dalam format yang diinginkan
        $tanggalMulai = Carbon::parse($dateParts[0])->toDateString();
        $tanggalSelesai = Carbon::parse($dateParts[1])->toDateString();

        // Menyimpan tanggal mulai dan tanggal selesai dalam sesi
        Session::put('start_date', $tanggalMulai);
        Session::put('end_date', $tanggalSelesai);

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Filter berhasil.');
    }
}
