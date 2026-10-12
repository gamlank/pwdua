<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Studio extends Model
{
    protected $guarded = ['id'];

    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}