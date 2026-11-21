<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aircraft extends Model
{
    protected $fillable = ['registration_number', 'model', 'manufacturer', 'capacity', 'status'];

    public function flights(): HasMany
    {
        return $this->hasMany(Flight::class);
    }
}
