<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobdesk extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = ['jobdesk', 'loker_id'];
    
    public function loker()
    {
        return $this->belongsTo(Loker::class);
    }
}
