<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;
use App\Models\Incoming;
use App\Models\IncomingItem;
use App\Models\IncomingCapacity;
use App\Models\User;

class IncomingImport implements ToCollection
{
    private $incoming;

    public function __construct($nama_file)
    {
        $this->incoming = Incoming::create([
            'file' => $nama_file,
            'tanggal' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
            'luasan_kedatangan' => 0,
            'pic' => User::first()->name
        ]);
    }

    public function collection(Collection $collection)
    {
        $total_luasan = 0;

        foreach ($collection as $key => $row) {
            if ($key >= 1) {
                $qty_actual = $row[9];
                $volume = $row[11];
                $luasan = $qty_actual * $volume;

                $item = IncomingItem::create([
                    'incoming_id' => $this->incoming->id,
                    'references' => $row[1],
                    'no_po' => $row[2],
                    'no_sj' => $row[3],
                    'no_harness' => $row[4],
                    'item' => $row[5],
                    'alias' => $row[6],
                    'pn' => $row[7],
                    'qty_kedatangan' => $row[8],
                    'qty_actual' => $qty_actual,
                    'user_by' => $row[10],
                    'volume' => $volume,
                    'luasan' => $luasan
                ]);

                $total_luasan += $luasan;
            }
        }

        $this->incoming->update([
            'luasan_kedatangan' => $total_luasan
        ]);

        IncomingCapacity::updateCapacities();
    }
}