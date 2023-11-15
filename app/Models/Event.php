<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_loading',
        'tanggal_mulai',
        'tanggal_akhir',
        'ukuran_led',
        'alat_tambahan',
        'venue',
        'note',
    ];

    public function eventCrew()
    {
        return $this->hasMany(EventCrew::class, 'id_event');
    }

}
