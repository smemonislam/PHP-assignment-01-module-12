<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Road extends Model
{
    use HasFactory;

    protected $fillable = ['origin', 'destination'];

    public function trip():HasOne
    {
        return $this->hasOne(Trip::class);
    }
}
