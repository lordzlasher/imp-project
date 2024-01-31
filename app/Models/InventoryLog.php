<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class InventoryLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'id_inventory');
    }

    public function getTanggalFormatted()
    {
        return Carbon::parse($this->attributes['tanggal'])->format('d F Y');
    }

    public function getTanggalDashboard()
    {
        return Carbon::parse($this->attributes['tanggal'])->format('d/m/Y');
    }

    public function getTimeFormatted()
    {
        return Carbon::parse($this->attributes['created_at'])->format('H:i');
    }
}
