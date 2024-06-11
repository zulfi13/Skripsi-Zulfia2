<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class KlasifikasiMaterial extends Model
{
    protected $table = 'klasifikasiMaterial';
    protected $primaryKey = 'partNumber';
    protected $fillable = [
        'itemNumber',
        'partNumber',
        'partName',
        'lt',
        'spl',
        'lokalimport',
        'tipe',
        'tipeMaterial'
    ];
}
