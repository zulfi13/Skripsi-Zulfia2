<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncomingController extends Controller
{
    public function index()
    {
        return view('\kedatanganmaterial');
    }
}
