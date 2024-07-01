<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\IncomingImport;
use App\Models\Incoming;
use App\Models\IncomingItem;
use App\Models\IncomingCapacity;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Carbon\Carbon;
use DB;

class IncomingController extends Controller
{
    public function index()
    {
        $data = Incoming::with('incoming_items')
                ->orderBy('created_at', 'desc')
                ->get();
        $kapasitas = DB::table('incoming_capacities')->first();
        return view('kedatangan-material.index', compact('data', 'kapasitas'));
    }

    public function show($id)
    {
        $data = IncomingItem::where('incoming_id', $id)->get();
        // return response()->json($data);
        return view('kedatangan-material.show', compact('data'));
    }

    public function delete($id)
    {
        $data = Incoming::find($id);
        // return response()->json($data);

        if ($data) {
            $file_path = public_path('file_kedatangan/' . $data->file);
            $luasan_kedatangan = $data->luasan_kedatangan;
            $this->updateCapacitiesAfterDelete($luasan_kedatangan);

            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $data->delete();
            toast('Data Berhasil Dihapus', 'success');
        } else {
            toast('Data Tidak Ditemukan', 'error');
        }

        return redirect('/kedatanganmaterial');
    }

    public function importExcel(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($validated->fails()) {
            toast('File yang diupload harus berformat .xls atau .xlsx','error');
            return redirect('/kedatanganmaterial')->withErrors($validated);
        }

        $file = $request->file('file');
        $nama_file = time().'_'.$file->getClientOriginalName();
        $file->move('file_kedatangan', $nama_file);

        Excel::import(new IncomingImport($nama_file), public_path('/file_kedatangan/'.$nama_file));

        toast('Data Berhasil Diimport','success');
        return redirect('/kedatanganmaterial');
    }

    private function updateCapacitiesAfterDelete($luasan_kedatangan)
    {
        $capacity = IncomingCapacity::first();

        if ($capacity) {
            $kapasitas_terpakai = $capacity->total_terpakai - $luasan_kedatangan;
            $sisa_kapasitas = $capacity->sisa_kapasitas + $luasan_kedatangan;

            $capacity->update([
                'total_terpakai' => $kapasitas_terpakai,
                'sisa_kapasitas' => $sisa_kapasitas,
            ]);
        }
    }

    public function getIncomingData()
    {
        $data = DB::table('incomings')
            ->select(DB::raw('tanggal, SUM(luasan_kedatangan) as total_luasan'))
            ->groupBy('tanggal')
            ->get();
        // return response()->json($data);
        $events = $data->map(function($item) {
            return [
                'title' => $item->total_luasan,
                'start' => $item->tanggal,
                'allDay' => true
            ];
        });

        return response()->json($events);
    }
}
