<?php
namespace App\Models; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\Relations\HasMany;
class Aircraft extends Model { protected $fillable=['model','registration','capacity','manufacturer']; protected $casts=['capacity'=>'integer']; public function flights():HasMany{return $this->hasMany(Flight::class);} }
