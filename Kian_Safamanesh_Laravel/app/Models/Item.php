<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Item extends Model {
 protected $fillable=['title','description','attachment','owner_id'];
 public function owner(): BelongsTo { return $this->belongsTo(User::class,'owner_id'); }
}
