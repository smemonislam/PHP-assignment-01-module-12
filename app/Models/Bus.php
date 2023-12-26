<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['bus_name', 'bus_model'];

    public function trip(): HasOne
    {
        return $this->hasOne(Trip::class);
    }
}
