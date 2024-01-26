<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::orderBy('id', 'desc')->paginate(4);

        // $obat = Obat::all();
        return view('obat.index', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'merek' => 'required',
            'supplayer' => 'nullable',
            'jumlah' => 'required|numeric',
            'tanggal_exp' => 'required',
        ]);

        $obat = Obat::create([
            'nama_obat' => $request->nama_obat,
            'merek' => $request->merek,
            'supplayer' => $request->supplayer,
            'jumlah' => $request->jumlah,
            'tanggal_exp' => $request->tanggal_exp
        ]);
        return redirect('/obat')->with('berhasil', 'Data Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $obat = Obat::find($id);
        return view('obat.edit', compact('obat'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required',
            'merek' => 'required',
            'supplayer' => 'nullable',
            'jumlah' => 'required|numeric',
            'tanggal_exp' => 'required',
        ]);

        $obat = Obat::find($id);
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'merek' => $request->merek,
            'supplayer' => $request->supplayer,
            'jumlah' => $request->jumlah,
            'tanggal_exp' => $request->tanggal_exp

        ]);
        return redirect()->route('obat.index')->with('berhasil', 'Data Terupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $obat = Obat::find($id);
        $obat->delete();
        return redirect()->route('obat.index')->with('berhasil', 'Data Terhapus');
    }
}
