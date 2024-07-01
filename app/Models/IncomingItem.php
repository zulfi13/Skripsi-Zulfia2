<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingItem extends Model
{
    use HasFactory;

    protected $table = 'incoming_items';

    protected $fillable = [
        'incoming_id',
        'references',
        'no_po',
        'no_sj',
        'no_harness',
        'item',
        'alias',
        'pn',
        'qty_kedatangan',
        'qty_actual',
        'user_by',
        'volume',
        'luasan',
    ];

    public function incoming()
    {
        return $this->belongsTo(Incoming::class, 'incoming_id', 'id');
    }
}
