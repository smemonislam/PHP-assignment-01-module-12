<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['bus_id', 'road_id', 'departure_time', 'arrival_time', 'date'];


    public function bus(): BelongsTo
    {
        return $this->belongsTo(Bus::class);
    }

    public function road(): BelongsTo
    {
        return $this->belongsTo(Road::class);
    }
}
