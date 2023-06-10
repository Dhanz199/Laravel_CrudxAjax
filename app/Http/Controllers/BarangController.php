<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
// use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    function index()
    {
        $data = Barang::orderBy('no_rfq', 'asc');
        return view('welcome')->with('data', $data);
    }

    function records(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $barangs = Barang::whereBetween('tanggal', [$start_date, $end_date])->get();
                } else {
                    $barangs = Barang::latest()->get();
                }
            } else {
                $barangs = Barang::latest()->get();
            }

            return response()->json([
                'barangs' => $barangs
            ]);
        } else {
            abort(403);
        }
    }

    function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'no_rfq' => 'required|min:3|max:8|unique:barang,no_rfq',
            'description' => 'required',
            'harga_pokok' => 'required',
            'nama_toko' => 'required',
            'contact_person' => 'required',
            'alamat_toko' => 'required',
        ], [
            'no_rfq.required' => 'Nomor RFQ Wajib Di isi',
            'no_rfq.unique' => 'Nomor RFQ Sudah ada',
            'description.required' => 'Description Wajib Di isi',
            'harga_pokok.required' => 'Harga Pokok Wajib Di isi',
            'nama_toko.required' => 'Nama Toko Wajib Di isi',
            'contact_person.required' => 'Contact Person Wajib Di isi',
            'alamat_toko.required' => 'Alamat Toko Wajib Di isi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'no_rfq' => $request->no_rfq,
                'tanggal' => $request->tanggal,
                'description' => $request->description,
                'harga_pokok' => $request->harga_pokok,
                'nama_toko' => $request->nama_toko,
                'contact_person' => $request->contact_person,
                'alamat_toko' => $request->alamat_toko,
            ];
            Barang::create($data);
            return response()->json(['success' => "Data Barang Berhasil ditambahkan"]);
        }
    }

    function edit($id)
    {
        $data = Barang::where('id', $id)->first();
        return response()->json(['result' => $data]);
    }

    function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'no_rfq' => 'required|min:3|max:8|unique:barang,no_rfq' . ($id ? ", $id" : ''),
            'description' => 'required',
            'harga_pokok' => 'required',
            'nama_toko' => 'required',
            'contact_person' => 'required',
            'alamat_toko' => 'required',
        ], [
            'no_rfq.required' => 'Nomor RFQ Wajib Di isi',
            'no_rfq.unique' => 'Nomor RFQ Tidak Boleh sama',
            'description.required' => 'Description Wajib Di isi',
            'harga_pokok.required' => 'Harga Pokok Wajib Di isi',
            'nama_toko.required' => 'Nama Toko Wajib Di isi',
            'contact_person.required' => 'Contact Person Wajib Di isi',
            'alamat_toko.required' => 'Alamat Toko Wajib Di isi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = [
                'no_rfq' => $request->no_rfq,
                'tanggal' => $request->tanggal,
                'description' => $request->description,
                'harga_pokok' => $request->harga_pokok,
                'nama_toko' => $request->nama_toko,
                'contact_person' => $request->contact_person,
                'alamat_toko' => $request->alamat_toko,
            ];
            Barang::where('id', $id)->update($data);
            return response()->json(['success' => "Data Barang Berhasil Di update"]);
        }
    }

    function destroy($id)
    {
        Barang::where('id', $id)->delete();
        return response()->json(['success' => "Data Barang Berhasil Di Hapus"]);
    }
}
