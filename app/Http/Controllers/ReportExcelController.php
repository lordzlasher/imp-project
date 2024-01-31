<?php

namespace App\Http\Controllers;

use App\Exports\EventExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportExcelController extends Controller
{
    public function downloadReportEventKategori($id_kategori_event)
    {
        return Excel::download(new EventExport($id_kategori_event), 'event_report.xlsx');
    }
}
