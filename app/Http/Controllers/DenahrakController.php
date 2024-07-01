<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DenahrakController extends Controller
{
    public function index()
    {
        return view('denahrak');
    }

    public function getData(Request $request)
    {
        $id = $request->id;
        $data = null;

        if ($id == 11 || $id == 13 || $id == 14 || $id == 15 || $id == 16 || $id == 19) {
            $rakKode = '';
            if ($id == 11 || $id == 13) {
                $rakKode = 'A';
            } elseif ($id == 14 || $id == 15) {
                $rakKode = 'B';
            } elseif ($id == 16 || $id == 19) {
                $rakKode = 'C';
            }

            $rakAddresses = $this->getRakAddresses($id);

            //total volume dari tabal rak
            $totalVolume = DB::table('raks')
                ->where('kode', $rakKode)
                ->whereIn('alamat', $rakAddresses)
                ->sum('volume');

            //total terpakai dari tabal material
            $totalTerpakai = DB::table('materials')
                ->whereIn('rak_id', function ($query) use ($rakKode, $rakAddresses) {
                    $query->select('id')
                        ->from('raks')
                        ->where('kode', $rakKode)
                        ->whereIn('alamat', $rakAddresses);
                })
                ->sum('total_volume');

            $totalSisa = $totalVolume - $totalTerpakai;

            $data = [
                'rak' => "RAK $rakKode",
                'total_volume' => $totalVolume,
                'total_terpakai' => $totalTerpakai,
                'total_sisa' => $totalSisa,
            ];
        }
        return response()->json($data);
    }

    private function getRakAddresses($id)
    {
        $addresses = [];
        switch ($id) {
            case 11:
                $addresses = $this->generateAddresses('A', [1, 2, 3], 1, 22);
                break;
            case 13:
                $addresses = $this->generateAddresses('A', [1, 2, 3], 23, 42);
                break;
            case 14:
                $addresses = $this->generateAddresses('B', [1, 2, 3], 1, 22);
                break;
            case 15:
                $addresses = $this->generateAddresses('B', [1, 2, 3], 23, 48);
                break;
            case 16:
                $addresses = $this->generateAddresses('C', [1, 2, 3], 1, 22);
                break;
            case 19:
                $addresses = $this->generateAddresses('C', [1, 2, 3], 23, 37);
                break;
        }
        return $addresses;
    }

    private function generateAddresses($kode, $levels, $start, $end)
    {
        $addresses = [];
        foreach ($levels as $level) {
            for ($i = $start; $i <= $end; $i++) {
                $addresses[] = "{$kode}.{$level}.{$i}";
            }
        }
        return $addresses;
    }
}