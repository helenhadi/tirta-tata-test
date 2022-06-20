<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelA extends Model
{
    use HasFactory;
    protected $table = 'tabel_a';
    public $timestamps = false;
    protected $primaryKey = 'kode_baru';
    protected $fillable = [
        'kode_baru',
        'kode_lama',
    ];
}
