<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $detailpenjualan = DetailPenjualan::all(); // Mengambil semua isi tabel
        $paginate = DetailPenjualan::orderBy('id_detailpenjualan', 'asc')->paginate(3);
        return view('detailpenjualan.index', ['detailpenjualan' => $detailpenjualan,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detailpenjualan.create');
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
            'id_detail' => 'required',
            'id_penjualan' => 'required',
            'jumlah' => 'required',
            'hargaberas' => 'required',
            'diskon' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        DetailPenjualan::create($request->all());//jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('detailpenjualan.index')
            ->with('success', 'Detail Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_detail)
    {
        $detailpenjualan = DetailPenjualan::where('id_detailpenjualan', $id_detail)->first();
        return view('detailpenjualan.detail', compact('DetailPenjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_detail)
    {
        $Detail = DB::table('detail')->where('id_detail', $id_detail)->first();
        return view('detail.edit', compact('Detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_detail)
    {
        //melakukan validasi data
        $request->validate([
            'id_detail' => 'required',
            'id_penjualan' => 'required',
            'jumlah' => 'required',
            'hargaberas' => 'required',
            'diskon' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            DetailPenjualan::where('id_detail', $id_detail)
                ->update([
                    'id_detail' => $request->id_beras,
                    'id_penjualan' => $request->id_beras,
                    'jumlah' => $request->id_beras,
                    'hargaberas' => $request->id_beras,
                    'diskon' => $request->id_beras,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('detail.index')
                ->with('success', 'Detail Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_detail)
    {
        //fungsi eloquent untuk menghapus data
        DetailPenjualan::where('id_detail', $id_detail)->delete();return redirect()->route('detail.index')
            -> with('success', 'detail Berhasil Dihapus');       
    }
}
