<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\Relations\HasMany;
class Pilot extends Model { protected $fillable=['full_name','license_no','phone','experience']; protected $casts=['experience'=>'integer']; public function flights():HasMany{return $this->hasMany(Flight::class);} }
