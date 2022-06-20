<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelC extends Model
{
    use HasFactory;
    protected $table = 'tabel_c';
    public $timestamps = false;
    protected $primaryKey = 'kode_toko';
    protected $fillable = [
        'kode_toko',
        'area_sales',
    ];
}
