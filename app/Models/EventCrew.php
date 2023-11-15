<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCrew extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_event',
        'id_karyawan',
        'status_crew',
        'keterangan',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
