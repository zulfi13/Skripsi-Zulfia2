<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class IncomingCapacity extends Model
{
    use HasFactory;

    protected $table = 'incoming_capacities';

    protected $fillable = [
        'total_kapasitas',
        'total_terpakai',
        'sisa_kapasitas',
    ];

    public static function updateCapacities()
    {
        $total_kapasitas = self::first()->total_kapasitas;
        $total_luasan = DB::table('incomings')->sum('luasan_kedatangan');
        $sisa_kapasitas = $total_kapasitas - $total_luasan;

        self::first()->update([
            'total_terpakai' => $total_luasan,
            'sisa_kapasitas' => $sisa_kapasitas
        ]);
    }
}
