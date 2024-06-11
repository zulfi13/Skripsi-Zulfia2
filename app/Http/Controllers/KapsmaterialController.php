<?php

namespace App\Http\Controllers;

use App\Models\DataMaterial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class KapsmaterialController extends Controller
{
    public function index(Request $request)
    {
        $dataMaterials = DB::Select("Select * from datamaterial");
        // $currentPage = request()->get('page', 1); // Get the current page from the request
        // $perPage = 20;
        // $offset = ($currentPage - 1) * $perPage;
        // $items = array_slice($dataMaterials, $offset, $perPage);
        // $dataMaterials = new LengthAwarePaginator($items, count($dataMaterials), $perPage, $currentPage, [
        //     'path' => request()->url(),
        //     'query' => request()->query(),
        // ]);

        $itemNumber = $request->get('itemNumber');  
        if($itemNumber){
            $dataMaterials = DataMaterial::where("itemNumber","LIKE","%$itemNumber%")->get();
        }
        $productName = $request->get('productName');  
        if($productName){
            $dataMaterials = DataMaterial::where("productName","LIKE","%$productName%")->get();
        }
        
       return view('kapsmaterial', ['dataMaterials' => $dataMaterials]);
    
    }

    public function create()
    {
        return view('tambahmat');
    }

    public function store(Request $request)
    {
        $itemNumber = $request->input('itemNumber');
        $partNumber = $request->input('partNumber');
        $productName = $request->input('productName');
        $pjg = $request->input('pjg');
        $lbr = $request->input('lbr');
        $jr = $request->input('jr');
        $tng = $request->input('pjg');
        $vol = $request->input('lbr');
        $qtyPack = $request->input('qtyPack');
        $qtyBox = $request->input('qtyBox');
        $berat = $request->input('berat');

        DB::insert("insert into DataMaterial(itemNumber, partNumber, productName, pjg, lbr, tng, jr, vol, qtyBox, qtyPack, berat) values('$itemNumber', '$partNumber', '$productName', '$pjg', '$lbr', '$tng', '$jr', '$vol', '$qtyBox', '$qtyPack', '$berat')");

        // Redirect atau kembalikan respons sesuai kebutuhan
        return redirect()->route('kapsmaterial.index')->with('success', 'New material added successfully');
        
    }

    public function edit($id)
    {
        $dataMaterial = datamaterial::find($id);
        return view('editKapsmaterial', ['dataMaterial' => $dataMaterial]);
    }

    public function update(Request $request, $qty)
    {
        $dataMaterial = datamaterial::where('qtyPack', $qty)->first();

        // Validasi request jika perlu
        $request->validate([
            'qtyPack' => 'required',
            'qtyBox' => 'required',
            // ... tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Update kolom qtyPack dan qtyBox
        $dataMaterial->qtyPack = $request->input('qtyPack');
        $dataMaterial->qtyBox = $request->input('qtyBox');
        // ... tambahkan update untuk kolom lainnya jika perlu

        // Simpan perubahan
        $dataMaterial->save();

        // Redirect atau melakukan tindakan lainnya
        return redirect()->route('kapsmaterial.index')->with('success', 'Material berhasil diupdate.');
    }

    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $dataMaterial = DataMaterial::find($id);

        // Periksa apakah data ditemukan
        if (!$dataMaterial) {
            return redirect()->route('kapsmaterial.index')->with('error', 'Data tidak ditemukan');
        }

        // Lakukan penghapusan
        $dataMaterial->delete();

        // Redirect ke halaman indeks atau halaman lain yang sesuai
        return redirect()->route('kapsmaterial.index')->with('success', 'Data berhasil dihapus');
    }

}
