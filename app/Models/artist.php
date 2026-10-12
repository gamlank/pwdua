<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    protected $guarded = ['id'];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function labelRecord(): BelongsTo
    {
        return $this->belongsTo(LabelRecord::class);
    }

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}