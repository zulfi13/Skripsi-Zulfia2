<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = [
        'rak_id',
        'item_number',
        'part_number',
        'product_name',
        'panjang',
        'lebar',
        'tinggi',
        'jr',
        'qty_box',
        'qty_pack',
        'volume',
        'total_volume',
    ];

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'rak_id', 'id');
    }
}
