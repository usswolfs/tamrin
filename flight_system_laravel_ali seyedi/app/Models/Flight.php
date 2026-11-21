<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = ['plane_id', 'origin', 'destination', 'departure'];

    protected $casts = ['departure' => 'datetime'];

    public function plane()
    {
        return $this->belongsTo(Plane::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function freeSeats()
    {
        return $this->plane->seats - $this->bookings()->count();
    }
}
