<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSewa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detail_sewa';
    protected $fillable = ['idKendaraan', 'idDriver', 'tanggalSewa', 'status', 'bbm'];
    public function getKendaraan()
    {
        # code...
        return $this->belongsTo(Kendaraan::class, 'idKendaraan');
    }
    public function getDriver()
    {
        # code...
        return $this->belongsTo(Driver::class, 'idDriver');
    }
}
