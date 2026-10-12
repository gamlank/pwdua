<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipment extends Model
{
    protected $guarded = ['id'];

    public function studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class);
    }
}