<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role','karyawan')->get();
        return view('admin.karyawan.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'gambar' => 'mimes:jpeg,png|max:512',
            
        ]);

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['errors' => 'Email Sudah Terdaftar !!']);
        } elseif (User::where('nama_cabang', $request->nama_cabang)->exists()) {
            return redirect()->back()->withErrors(['errors' => 'Nama Cabang Sudah Terdaftar !!']);
        } 

        $adduser = New User();
        $adduser->name = $request->name;
        $adduser->email = $request->email;
        $adduser->nama_cabang = $request->nama_cabang;
        $adduser->alamat = $request->alamat;
        $adduser->alamat_cabang = $request->alamat_cabang;
        $adduser->no_telp = $request->no_telp;
        $adduser->role = 'karyawan';
        $adduser->password = bcrypt('12345678');
        // dd($adduser);
        // jika ada gambar yang diupload
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('images/',$request->file('gambar')->getClientOriginalName());
            $adduser->gambar = $request->file('gambar')->getClientOriginalName();
            $adduser->save();
        }
       
        $adduser->save();       
        
        return redirect('/karyawan')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.karyawan.edit',compact('user'));
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
        $adduser = User::find($id);
        $adduser->name = $request->name;
        $adduser->email = $request->email;
        $adduser->nama_cabang = $request->nama_cabang;
        $adduser->alamat = $request->alamat;
        $adduser->alamat_cabang = $request->alamat_cabang;
        $adduser->no_telp = $request->no_telp;
        // dd($adduser);
        $adduser->save();       
        
        return redirect('/karyawan')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = User::find($id);
        $del->delete();

        return back();
    }


    public function cetakkartu($id){
        $data = User::find($id);
        return PDF::loadview('laporan.cetak-kartu',compact('data'))->setPaper('legal', 'potrait')->stream();

    }
}
