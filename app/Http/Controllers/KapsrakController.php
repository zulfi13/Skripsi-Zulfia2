<?php

namespace App\Http\Controllers;

use App\Models\DataRak;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class KapsrakController extends Controller
{
    public function index()
    {
        $dataRaks = DB::Select("Select * from dataRak");
        return view('kapsrak', ['dataRaks' => $dataRaks]);
        return view('kapsrak.index', ['data' => $data]);
        $dataRak = DataRak::selectRaw('*, GETDATE() as updated_at')->find($id);
        //$dataRak->when($request->kode, function ($query) use($request) {
            //return $query->wherekode($request->'kode');
       // });
        return view('kapsrak', ['kode' => $kode->paginate(10)]);
    }
    public function create()
    {
        return view('tambahrak');
    }

    public function store(Request $request)
    {
        $kode = $request->input('kode');
        $alamat = $request->input('alamat');
        $panjang = $request->input('panjang');
        $lebar = $request->input('lebar');
        $tinggi = $request->input('tinggi');
        $tinggiAts = $request->input('tinggiAts');
        $tinggiTtl = $request->input('tinggiTtl');
        $volume = $request->input('volume');

        DB::table('DataRak')->insert([
            'kode' => $kode,
            'alamat' => $alamat,
            'panjang' => $panjang,
            'lebar' => $lebar,
            'tinggi' => $tinggi,
            'tinggiAts' => $tinggiAts,
            'tinggiTtl' => $tinggiTtl,
            'volume' => $volume,
        ]);
        // Redirect atau kembalikan respons sesuai kebutuhan
        return redirect()->route('kapsrak.index')->with('success', 'New rak added successfully'); 
        
    }
    public function edit($id)
    {
        // Mendapatkan data berdasarkan ID
        $rak = Rak::find($id);

        // Menampilkan halaman edit dengan membawa data rak
        return view('kapsrak.edit', compact('rak'));
    } 
    public function destroy($alamat)
    {
        // Temukan data berdasarkan alamat
        $dataRak = DB::delete("delete datarak where alamat = '$alamat'");
        return redirect()->route('kapsrak.index')->with('success', 'Data berhasil dihapus');
    }
    // public function filterByKode($kode)
    // {
    //     $dataRak = DataRak::where('kode', $kode)->get();
    //     return response()->json([
    //         'data' => $dataRak,
    //         'draw' => 1, // Ini dapat diatur sesuai dengan permintaan DataTables
    //         'recordsTotal' => count($dataRak),
    //         'recordsFiltered' => count($dataRak),
    //     ]);
    // }

    public function getdata(Request $request){
        $koderak = $request->input("rak");
        if ($koderak == "All Raks"){
            $data = DB::select("select * from DataRak");            
        }else{
            $kode = explode("Rak ", $koderak, 1);
            $data = DB::select("select * from DataRak where kode = '$kode[0]'");
        }
        $output = array("data"=>$data);

        return response()->json($output);
    }

    public function show(Request $request){
        $koderak = $request->input("rak");
        if ($koderak == "All"){
            $data = DB::select("select * from DataRak");            
        }else{
            $data = DB::select("select * from DataRak where kode = '$koderak'");
        }
        // $data = DB::select("select * from DataRak");
        // $data = array("panjang"=>"100");
        $output = array("data"=>$data);

//        dd($output);

        return response()->json($output);
    }
}