<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['flight_id', 'customer_id'];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
