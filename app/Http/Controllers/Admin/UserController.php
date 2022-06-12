<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all(); // Mengambil semua isi tabel
        $paginate = User::orderBy('id', 'asc')->paginate(3);
        return view('admin.user.index', ['user' => $user,'paginate'=>$paginate]);
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
        $user = User::where('id', $id)->first();
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.user.edit', compact('user'));
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
                'username' => 'required',
                'name' => 'required',
                'no_hp' => 'required',
                'email' => 'required',
            ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            User::where('id', $id)
            ->update([
                    'username' =>$request->username,
                    'name' =>$request->name,
                    'no_hp' =>$request->no_hp,
                    'email' =>$request->email,
            ]);
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->to('/admin/users')
                ->with('success', 'User Berhasil Diupdate');
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