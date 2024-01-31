<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\EventCrew;
use App\Models\Event;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Session;


class ReportController extends Controller
{


    public function reportEvent()
    {
        // Ambil nilai dari sesi Laravel untuk tanggal mulai dan tanggal selesai
        $startDate = Session::get('start_date');
        $endDate = Session::get('end_date');

        $events = Event::with('eventCrew')
            ->whereBetween('tanggal_mulai', [$startDate, $endDate])
            ->orderBy('tanggal_loading', 'asc')
            ->get();

        return view('report-pdf.event-report', compact('events'));
    }

    public function reportEventKategori($id_kategori_event)
    {
        // Ambil nilai dari sesi Laravel untuk tanggal mulai dan tanggal selesai
        $startDate = Session::get('start_date');
        $endDate = Session::get('end_date');

        $events = Event::with('eventCrew')
            ->whereBetween('tanggal_mulai', [$startDate, $endDate])
            ->where('id_kategori_event', $id_kategori_event)
            ->orderBy('tanggal_loading', 'asc')
            ->get();

        return view('report-pdf.event-report', compact('events'));
    }

    public function downloadreportEvent()
    {
        // Ambil nilai dari sesi Laravel untuk tanggal mulai dan tanggal selesai
        $startDate = Session::get('start_date');
        $endDate = Session::get('end_date');

        $events = Event::leftJoin('event_crews', 'events.id', '=', 'event_crews.id_event')
            ->whereBetween('tanggal_mulai', [$startDate, $endDate])
            ->get();

        $pdf = Pdf::loadView('report-pdf.event-report', ['events' => $events]);

        $pdf->setPaper('A3', 'landscape');

        return $pdf->download('rekapan_event_imp.pdf');
    }

    public function downloadreportEventCategory($id_kategori_event)
    {
        // Ambil nilai dari sesi Laravel untuk tanggal mulai dan tanggal selesai
        $startDate = Session::get('start_date');
        $endDate = Session::get('end_date');

        $events = Event::with('eventCrew')
            ->whereBetween('tanggal_mulai', [$startDate, $endDate])
            ->where('id_kategori_event', $id_kategori_event)
            ->orderBy('tanggal_loading', 'asc')
            ->get();

        $pdf = Pdf::loadView('report-pdf.event-report', ['events' => $events]);

        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('rekapan_event_imp_' . $events[0]->kategoriEvent->kategori_event . '.pdf');
    }

    public function reportCrew(string $id)
    {
        $startDate = Session::get('start_date');
        $endDate = Session::get('end_date');

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

        return view('report-pdf.karyawan-report', compact('crewEvents'));
    }

    public function downloadreportCrew(string $id)
    {
        $startDate = Session::get('start_date');
        $endDate = Session::get('end_date');

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

        $pdf = Pdf::loadView('report-pdf.karyawan-report', ['crewEvents' => $crewEvents]);

        $pdf->setPaper('A4', 'landscape');

        return $pdf->download('rekapan_' . $crewEvents[0]->karyawan->nama . '_imp.pdf');
    }
}
