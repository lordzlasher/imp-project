<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function eventCrew()
    {
        return $this->hasMany(EventCrew::class, 'id_event');
    }

    public function kategoriEvent()
    {
        return $this->belongsTo(KategoriEvent::class, 'id_kategori_event');
    }

    public function getTanggalLoadingFormattedAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_loading'])->format('d F Y');
    }

    public function getTanggalMulaiFormattedAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_mulai'])->format('d F Y');
    }

    public function getTanggalAkhirFormattedAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_akhir'])->format('d F Y');
    }

    public function getFormattedDateRangeAttribute()
    {
        $carbonStartDate = Carbon::parse($this->tanggal_mulai);
        $carbonEndDate = Carbon::parse($this->tanggal_akhir);

        // Format tanggal_mulai dan tanggal_akhir sesuai keinginan
        $formattedStartDate = $carbonStartDate->format('j');
        $formattedEndDate = $carbonEndDate->format('j F Y');

        // Tampilkan rentang tanggal hanya jika tanggal_mulai dan tanggal_akhir berbeda
        return ($carbonStartDate->eq($carbonEndDate)) ? $formattedEndDate : "{$formattedStartDate} - {$formattedEndDate}";
    }

    public function getFormattedDateAcara()
    {
        $carbonStartDate = Carbon::parse($this->tanggal_mulai);
        $carbonEndDate = Carbon::parse($this->tanggal_akhir);

        // Format tanggal_mulai dan tanggal_akhir sesuai keinginan
        $formattedStartDate = $carbonStartDate->format('M d, Y');
        $formattedEndDate = $carbonEndDate->format('M d, Y');

        // Tampilkan rentang tanggal hanya jika tanggal_mulai dan tanggal_akhir berbeda
        return "{$formattedStartDate} - {$formattedEndDate}";
    }
}
