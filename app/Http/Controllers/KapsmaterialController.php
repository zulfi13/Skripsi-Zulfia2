<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use DB;

class KapsmaterialController extends Controller
{
    public function index(Request $request)
    {
        $data = DB::table('materials')->join('raks', 'materials.rak_id', '=', 'raks.id')
                    ->select('materials.*', 'raks.alamat as rak_alamat')
                    ->orderBy('materials.id', 'desc')
                    ->get();
        // return response()->json($data);
        return view('material.index', compact('data'));
    
    }

    public function create()
    {
        $rak = DB::table('raks')->select('id', 'alamat')->get();
        // return response()->json($rak);
        return view('material.create', compact('rak'));
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $validated = Validator::make($request->all(), [
            'itemNumber' => 'required',
            'partNumber' => 'required',
            'productName' => 'required',
            'rak_id' => 'required'
        ]);

        if($validated->fails()) {
            toast('Data gagal disimpan.', 'error');
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $rak_id = $request->rak_id;
        $itemNumber = $request->itemNumber;
        $partNumber = $request->partNumber;
        $productName = $request->productName;
        $pjg = $request->pjg;
        $lbr = $request->lbr;
        $jr = $request->jr;
        $tng = $request->tng;
        $vol = intval(str_replace('.', '', $request->vol));
        $qtyPack = $request->qtyPack;
        $qtyBox = $request->qtyBox;
        $total_volume = $vol * $qtyBox;

        $material = new Material();
        $material->rak_id = $rak_id;
        $material->item_number = $itemNumber;
        $material->part_number = $partNumber;
        $material->product_name = $productName;
        $material->panjang = $pjg;
        $material->lebar = $lbr;
        $material->tinggi = $tng;
        $material->jr = $jr;
        $material->volume = $vol;
        $material->qty_box = $qtyBox;
        $material->qty_pack = $qtyPack;
        $material->total_volume = $total_volume;
        $material->save();

        toast('Data berhasil disimpan.', 'success');
        return redirect()->route('kapsmaterial.index');
    }

    public function edit($id)
    {
        $data = Material::find($id);

        return view('material.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'volume' => 'required',
            'qtyPack' => 'required',
            'qtyBox' => 'required',
        ]);

        $volume = $request->volume;
        $pack = $request->qtyPack;
        $box = $request->qtyBox;

        $total_volume = $volume * $box;

        $material = Material::findOrFail($request->id);
        $material->qty_pack = $pack;
        $material->qty_box = $box;
        $material->total_volume = $total_volume;
        $material->save();

        toast('Material berhasil diupdate.', 'success');
        return redirect()->route('kapsmaterial.index');
    }

    public function delete($id)
    {
        $data = Material::find($id);
        if (!$data) {
            toast('Data tidak ditemukan.', 'error');
            return redirect()->route('kapsmaterial.index');
        }
        $data->delete();

        toast('Data berhasil dihapus.', 'success');
        return redirect()->route('kapsmaterial.index');
    }
}
