<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::all(); // Mengambil semua isi tabel
        $paginate = User::orderBy('id', 'asc')->paginate(3);
        return view('admin.index', ['admin' => $admin,'paginate'=>$paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'id' => 'required',
            'nama_admin' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        User::create($request->all());//jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.index')
            ->with('success', 'Admin Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::where('id', $id)->first();
        return view('admin.detail', compact('Admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Admin = DB::table('admin')->where('id', $id)->first();
        return view('admin.edit', compact('Admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //melakukan validasi data
            $request->validate([
                'id' => 'required',
                'nama_admin' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
                'email' => 'required',
            ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            User::where('id', $id)
                ->update([
                    'id' =>$request->id,
                    'nama_admin' =>$request->nama_admin,
                    'no_hp' =>$request->no_hp,
                    'alamat' =>$request->alamat,
                    'email' =>$request->email,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('admin.index')
                ->with('success', 'Admin Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        User::where('id', $id)->delete();return redirect()->route('admin.index')
            -> with('success', 'Admin Berhasil Dihapus');
    }
}