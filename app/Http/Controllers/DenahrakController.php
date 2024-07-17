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

        if ($id == 3 ||$id == 11 || $id == 13 || $id == 14 || $id == 15 || $id == 16 || $id == 19 || $id==20 || $id==21 ||
            $id == 23 || $id == 24 || $id == 25 || $id == 26 || $id == 27 || $id == 28 || $id == 29 || 
            $id == 30 || $id == 33 || $id == 34 || $id == 35 ) {
            $rakKode = '';
            if ($id == 3) { 
                $rakKode = 'AREA TRANSIT A';
            } elseif($id == 11 || $id == 13) {
                $rakKode = 'A';
            } elseif ($id == 14 || $id == 15) {
                $rakKode = 'B';
            } elseif ($id == 16 || $id == 19) {
                $rakKode = 'C';
            } elseif ($id == 20 || $id == 21) {
                $rakKode = 'D';
            } elseif ($id == 23 || $id == 24 || $id == 26) {
                $rakKode = 'E';
            } elseif ($id == 25) {
                $rakKode = 'P';
            }elseif ($id == 27 || $id == 28) {
                $rakKode = 'F';
            } elseif ($id == 29 || $id == 30) {
                $rakKode = 'G';
            } elseif ($id == 33 || $id == 34|| $id == 35) {
                $rakKode = 'H';
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
            case 20:
                $addresses = $this->generateAddresses('D', [1, 2, 3], 1, 22);
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