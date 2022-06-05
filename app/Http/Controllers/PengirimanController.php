<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pengiriman = Pengiriman::all(); // Mengambil semua isi tabel
        $paginate = Pengiriman::orderBy('id_pengiriman', 'asc')->paginate(3);
        return view('pengiriman.index', ['pengiriman' => $pengiriman,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengiriman.create');
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
            'id_pengiriman' => 'required',
            'id_pembayaran' => 'required' ,
            'totaongkir' => 'required',
            'alamat' => 'required',
            'kurir'=> 'required',
        ]);
        //fungsi eloquent untuk menambah data
       Pengiriman::create($request->all());//jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pengiriman.index')
            ->with('success', 'Pengiriman Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\response
     */
    public function show($id_pengiriman)
    {
        $pengiriman = Pengiriman::where('id_pengiriman', $id_pengiriman)->first();
        return view('pengiriman.detail', compact('Pengiriman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pengiriman)
    {
        $pengiriman = DB::table('pengiriman')->where('id_pengiriman', $id_pengiriman)->first();
        return view('pengiriman.edit', compact('Pengiriman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pengiriman)
    {
        //melakukan validasi data
        $request->validate([
            'id_pengiriman' => 'required',
            'id_pembayaran' => 'required' ,
            'totaongkir' => 'required',
            'alamat' => 'required',
            'kurir'=> 'required',
        ]);
        //fungsi eloquent untuk mengupdate data inputan kita
           Pengiriman::where('id_pengiriman', $id_pengiriman)
                ->update([
                    'id_pengiriman' => $request->id_pengiriman,
                    'id_pembayaran' => $request->id_pembayaran ,
                    'totaongkir' => $request->totalongkir,
                    'alamat' => $request->alamat,
                    'kurir'=> $request->kurir,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('pengiriman.index')
                ->with('success', 'Pengiriman Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengiriman)
    {
        //fungsi eloquent untuk menghapus data
        Pengiriman::where('id_pengiriman', $id_pengiriman)->delete();return redirect()->route('pengiriman.index')
            -> with('success', 'Pengiriman Berhasil Dihapus');       
    }
}
