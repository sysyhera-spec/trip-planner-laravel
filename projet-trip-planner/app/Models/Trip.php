<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trip extends Model
{
    use HasFactory;

    protected $table = 'trips'; 
    protected $fillable = ['title','description','starts_at','ends_at','people_count','user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }

    public function transports()
    {
        return $this->hasMany(Transport::class);
    }

    public function totalCost(): int|float
{
    $total = 0;

    // Activités
    foreach ($this->destinations as $destination) {
        foreach ($destination->activities as $activity) {
            $total += $activity->price_per_person * $this->people_count;
        }
    }

    // Hébergements
    foreach ($this->destinations as $destination) {
        foreach ($destination->accommodations as $accommodation) {
            $total += $accommodation->price_per_night * $accommodation->nights;
        }
    }

    // Transports
    foreach ($this->transports as $transport) {
        if ($transport->pricing_type === 'per_person') {
            $total += $transport->price * $this->people_count;
        } else {
            $total += $transport->price;
        }
    }

    return $total;
}
}
