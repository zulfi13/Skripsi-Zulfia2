<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTerpakai = DB::table('materials')->sum('total_volume');
        $totalVolRak = DB::table('raks')->sum('volume');
        $totalTersedia = $totalVolRak - $totalTerpakai;
        $totalTersedia = max($totalTersedia, 0); //jika totalTersedia < 0, maka totalTersedia = 0

        // return response()->json([
        //     'totalTerpakai' => $totalTerpakai, 
        //     'totalVolRak' => $totalVolRak,
        //     'totalTersedia' => $totalTersedia,
        // ]);

        return view('dashboard', compact('totalTerpakai', 'totalTersedia'));
    }
}
