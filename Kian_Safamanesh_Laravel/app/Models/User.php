<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
class User extends Authenticatable {
 use HasApiTokens;
 protected $fillable=['name','email','username','password','role'];
 protected $hidden=['password','remember_token'];
 protected function casts(): array { return ['password'=>'hashed']; }
 public function items(): HasMany { return $this->hasMany(Item::class,'owner_id'); }
}
