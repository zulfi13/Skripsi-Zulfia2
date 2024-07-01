<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use DB;

class KapsrakController extends Controller
{
    public function index()
    {
        $data = DB::table('raks')->get();
        // return response()->json($data);
        return view('rak.index', compact('data'));
    }

    public function create()
    {
        return view('rak.create');
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $validated = Validator::make($request->all(), [
            'kode' => 'required',
            'alamat' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'tinggi' => 'required',
            // 'tinggiAts' => 'required',
            'tinggiTtl' => 'required',
            'volume' => 'required',
        ]);

        if ($validated->fails()) {
            toast('Data gagal ditambahkan.', 'error');
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $kode = $request->input('kode');
        $alamat = $request->input('alamat');
        $panjang = $request->input('panjang');
        $lebar = $request->input('lebar');
        $tinggi = $request->input('tinggi');
        $tinggiAts = $request->input('tinggiAts');
        $tinggiTtl = $request->input('tinggiTtl');
        $volume = intval(str_replace('.', '', $request->volume));

        DB::table('raks')->insert([
            'kode' => $kode,
            'alamat' => $alamat,
            'panjang' => $panjang,
            'lebar' => $lebar,
            'tinggi' => $tinggi,
            'tinggi_atas' => $tinggiAts,
            'tinggi_total' => $tinggiTtl,
            'volume' => $volume,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        toast('Data berhasil ditambahkan','success');
        return redirect()->route('kapsrak.index'); 
        
    }

    public function edit($id)
    {
        $data = Rak::find($id);

        return view('rak.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $volume = intval(str_replace('.', '', $request->volume));

        $validated = Validator::make($request->all(), [
            'kode' => 'required',
            'alamat' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'tinggi' => 'required',
            // 'tinggiAts' => 'required',
            'tinggiTtl' => 'required',
            'volume' => 'required',
        ]);

        if ($validated->fails()) {
            toast('Data gagal diubah.', 'error');
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $rak = Rak::find($id);
        $rak->kode = $request->kode;
        $rak->alamat = $request->alamat;
        $rak->panjang = $request->panjang;
        $rak->lebar = $request->lebar;
        $rak->tinggi = $request->tinggi;
        $rak->tinggi_atas = $request->tinggiAts;
        $rak->tinggi_total = $request->tinggiTtl;
        $rak->volume = $volume;
        $rak->save();

        toast('Data berhasil diubah.', 'success');
        return redirect()->route('kapsrak.index');
    }

    public function delete($id)
    {
        $data = Rak::find($id);
        if (!$data) {
            toast('Data tidak ditemukan.', 'error');
            return redirect()->route('kapsrak.index');
        }
        $data->delete();

        toast('Data berhasil dihapus.', 'success');
        return redirect()->route('kapsrak.index');
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