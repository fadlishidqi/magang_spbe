<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking_Status extends Model
{
    use HasFactory;

    protected $fillable = ['laporan_id', 'status'];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}
