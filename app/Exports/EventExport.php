<?php

namespace App\Exports;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Facades\Excel;

class EventExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $id_kategori_event;

    public function __construct($id_kategori_event)
    {
        $this->id_kategori_event = $id_kategori_event;
    }

    public function view(): View
    {
        // Mendapatkan tanggal mulai dan tanggal akhir dari sesi
        $startDate = Session::get('start_date');
        $endDate = Session::get('end_date');

        // Mengambil data event dengan kategori tertentu berdasarkan rentang tanggal
        $events = Event::with('eventCrew')
            ->whereBetween('tanggal_mulai', [$startDate, $endDate])
            ->where('id_kategori_event', $this->id_kategori_event)
            ->orderBy('tanggal_loading', 'asc')
            ->get();

        // Mengirim data ke view untuk diproses dalam ekspor
        return view('report-pdf.event-report', compact('events'));
    }
}
