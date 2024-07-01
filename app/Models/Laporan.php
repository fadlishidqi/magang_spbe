<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'tanggal', 'isi', 'kategori', 'file_pendukung'];

    public function trackingStatuses()
    {
        return $this->hasMany(Tracking_Status::class);
    }
}
