<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Syarat extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = ['syarat', 'loker_id'];
    public function loker(): BelongsTo
    {
        return $this->belongsTo(Loker::class);
    }
}
