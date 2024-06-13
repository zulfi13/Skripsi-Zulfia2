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
        // Mengosongkan data yang akan dikirim ke view
        $data = [];

        return view('dashboard')->with('data', $data);
    }
}