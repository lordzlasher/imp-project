<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function eventCrew()
    {
        return $this->hasMany(eventCrew::class, 'id_event');
    }
    
}
