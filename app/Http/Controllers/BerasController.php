<?php

namespace App\Http\Controllers;

use App\Models\Beras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beras = Beras::all(); // Mengambil semua isi tabel
        $paginate = Beras::orderBy('id_beras', 'asc')->paginate(3);
        return view('beras.index', ['beras' => $beras,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'id_beras' => 'required',
            'nama_beras' => 'required',
            'hargaberas' => 'required',
            'stock' => 'required',
            'berat' => 'required',
            'diskon' => 'required',
            'keterangan' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Beras::create($request->all());//jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('beras.index')
            ->with('success', 'Beras Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_beras)
    {
        $beras = Beras::where('id_beras', $id_beras)->first();
        return view('beras.detail', compact('Beras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_beras)
    {
        $Beras = DB::table('beras')->where('id_beras', $id_beras)->first();
        return view('beras.edit', compact('Beras'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_beras)
    {
        //melakukan validasi data
        $request->validate([
            'id_beras' => 'required',
            'nama_beras' => 'required',
            'hargaberas' => 'required',
            'stock' => 'required',
            'berat' => 'required',
            'diskon' => 'required',
            'keterangan' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            Beras::where('id_beras', $id_beras)
                ->update([
                    'id_beras' => $request->id_beras,
                    'nama_beras' => $request->nama_beras,
                    'hargaberas' => $request->hargaberas,
                    'stock' => $request->stock,
                    'berat' => $request->berat,
                    'diskon' => $request->diskon,
                    'keterangan' => $request->keterangan,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('beras.index')
                ->with('success', 'Beras Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_beras)
    {
        //fungsi eloquent untuk menghapus data
        Beras::where('id_beras', $id_beras)->delete();return redirect()->route('beras.index')
            -> with('success', 'Beras Berhasil Dihapus');
    }
}
