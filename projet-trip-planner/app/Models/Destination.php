<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;
    
    public function trip()
{
    return $this->belongsTo(Trip::class);
}

public function activities()
{
    return $this->hasMany(Activity::class);
}

public function accommodations()
{
    return $this->hasMany(Accommodation::class);
}
}
