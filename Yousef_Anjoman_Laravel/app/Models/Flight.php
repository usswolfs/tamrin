<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Flight extends Model
{
    protected $fillable = ['flight_number', 'origin', 'destination', 'departure_at', 'arrival_at', 'aircraft_id', 'status'];

    protected $casts = ['departure_at' => 'datetime', 'arrival_at' => 'datetime'];

    public function aircraft(): BelongsTo
    {
        return $this->belongsTo(Aircraft::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
