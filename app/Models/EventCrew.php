<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCrew extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function status()
    {
        return $this->belongsTo(StatusCrew::class, 'id_status_crew');
    }

    public function keterangan()
    {
        return $this->belongsTo(KeteranganCrew::class, 'id_keterangan_crew');
    }
}
