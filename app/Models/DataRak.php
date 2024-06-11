<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRak extends Model
{
    protected $table = 'dataRak';
    protected $primaryKey = 'alamat';
    protected $fillable = [
        'kode',
        'alamat',
        'panjang',
        'lebar',
        'tinggi',
        'tinggiATS',
        'tinggiTtl',
        'volume'
    ];
}
