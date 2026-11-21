<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = ['passenger_name', 'passenger_email', 'seat_number', 'flight_id', 'status'];

    public function flight(): BelongsTo
    {
        return $this->belongsTo(Flight::class);
    }
}
