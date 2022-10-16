<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsumsiBBM extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'konsumsi_bbm';
    protected $fillable = ['idKendaraan', 'bbm', 'tanggalPengisian'];
}
