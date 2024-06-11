<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KlasifikasiMaterial;
Use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $fastMovingData = KlasifikasiMaterial::where('tipeMaterial', 'fast moving')->get(['itemNumber', 'tipeMaterial']);

        $labels = $fastMovingData->pluck('itemNumber')->toArray();
        $dataTipeMaterial = $fastMovingData->pluck('tipeMaterial')->toArray();

        $data = [
            'labels' => $labels,
            'tipeMaterial' => $dataTipeMaterial,
        ];
        $data = DB::table('klasifikasiMaterial')->get();
        return view('dashboard')->with('data', $data);
    }
}