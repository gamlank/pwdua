<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Track extends Model
{
    protected $guarded = ['id'];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}