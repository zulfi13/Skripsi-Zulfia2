<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $table = 'raks';

    protected $fillable = [
        'kode',
        'alamat',
        'panjang',
        'lebar',
        'tinggi',
        'tinggi_atas',
        'tinggi_total',
        'volume',
    ];

    public function materials()
    {
        return $this->hasMany(Material::class, 'rak_id', 'id');
    }
}
