<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $fillable = ['model', 'reg', 'seats'];

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}
