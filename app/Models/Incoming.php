<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    use HasFactory;

    protected $table = 'incomings';

    protected $fillable = [
        'file',
        'tanggal',
        'luasan_kedatangan',
        'pic'
    ];

    public function incoming_items()
    {
        return $this->hasMany(IncomingItem::class, 'incoming_id', 'id');
    }
}
