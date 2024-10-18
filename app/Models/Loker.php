<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loker extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'nama_perusahaan',
        'posisi',
        'deskripsi_perusahaan',
        'pendidikan',
        'gender',
        'status_kerja',
        'alamat',
        'panduan_daftar',
        'kategori',
        'category_id',
        'email',
        'telepon',
        'website',
        'pengunjung'
    ];

    public function syarats(): HasMany
    {
        return $this->hasMany(Syarat::class);
    }

    public function jobdesks(): HasMany
    {
        return $this->hasMany(Jobdesk::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
