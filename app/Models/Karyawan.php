<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Karyawan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public static function getCrewEventsTotal()
    {
        $startDate = Session::get('start_date');
        $endDate = Session::get('end_date');

        return DB::table('karyawans')
            ->leftJoin('event_crews', 'karyawans.id', '=', 'event_crews.id_karyawan')
            ->leftJoin('events', 'event_crews.id_event', '=', 'events.id')
            ->select('karyawans.id', 'karyawans.nama', DB::raw('COUNT(event_crews.id) as jumlah_event'))
            ->whereBetween('events.tanggal_mulai', [$startDate, $endDate])
            ->groupBy('karyawans.id', 'karyawans.nama')
            ->orderBy('jumlah_event', 'desc')
            ->get();
    }

}
