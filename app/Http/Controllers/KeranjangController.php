<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $keranjang = Keranjang::all(); // Mengambil semua isi tabel
        $paginate = Keranjang::orderBy('id_keranjang', 'asc')->paginate(3);
        return view('keranjang.index', ['keranjang' => $keranjang,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keranjang.create');
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
            'id_keranjang' => 'required',
            'id_beras' => 'required',
            'totalharga' => 'required',
            'jumlah' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Keranjang::create($request->all());//jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('keranjang.index')
            ->with('success', 'Keranjang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\keranjang
     */
    public function show($id_keranjang)
    {
        $keranjang = Keranjang::where('id_keranjang', $id_keranjang)->first();
        return view('keranjang.detail', compact('Keranjang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_keranjang)
    {
        $Keranjang = DB::table('keranjang')->where('id_keranjang', $id_keranjang)->first();
        return view('keranjang.edit', compact('Keranjang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_keranjang)
    {
        //melakukan validasi data
        $request->validate([
            'id_keranjang' => 'required',
            'id_beras' => 'required',
            'totalharga' => 'required',
            'jumlah' => 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            Keranjang::where('id_keranjang', $id_keranjang)
                ->update([
                    'id_keranjang' => $request->id_keranjang,
                    'id_beras' => $request->id_beras,
                    'totalharga' => $request->totalharga,
                    'jumlah' => $request->jumlah,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('keranjang.index')
                ->with('success', 'Keranjang Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_keranjang)
    {
        //fungsi eloquent untuk menghapus data
        Keranjang::where('id_keranjang', $id_keranjang)->delete();return redirect()->route('keranjang.index')
            -> with('success', 'Keranjang Berhasil Dihapus');       
    }
}
