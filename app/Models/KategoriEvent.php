<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriEvent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function event()
    {
        return $this->hasMany(Event::class, 'id_event');
    }
}
