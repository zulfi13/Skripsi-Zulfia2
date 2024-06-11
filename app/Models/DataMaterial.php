<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMaterial extends Model
{
    public $timestamps = false;
    protected $table = 'dataMaterial';
    protected $primaryKey = 'itemNumber';
    protected $fillable = [
        'itemNumber',
        'partNumber',
        'productName',
        'pjg',
        'lbr',
        'tng',
        'jr',
        'vol',
        'qtyBox',
        'qtyPack',
        'berat',
        'updated_time'
    ];
}
