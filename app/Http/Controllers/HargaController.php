<?php

namespace App\Http\Controllers;

use App\Harga;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HargaController extends Controller
{
    public function index(){
        // users bukan admin (where not)
        $users = User::where('id', '!=', Auth::user()->id)->get();
        $hargas = Harga::all();
        return view('admin.harga.index',compact('hargas','users'));
    }

    public function store(Request $request){
       
        $addharga = new harga();
        $addharga->user_id = $request->user_id;
        $addharga->jenis = $request->jenis;
        $addharga->kg = 1000; // satuan gram
        $addharga->harga = $request->harga;
        $addharga->hari = $request->hari;
        $addharga->status = 1; //aktif
        // dd($addharga);
        $addharga->save();

        return back()->with('success','Data berhasil ditambahkan');


    }
    
    public function edit($id){
        $harga = Harga::find($id);
        $users = User::where('id', '!=', Auth::user()->id)->get();
        $hargas = Harga::all();
        return view('admin.harga.edit',compact('hargas','harga','users'));
    }

    public function update(Request $request, $id){
        $addharga = Harga::find($id);
        $addharga->user_id = $request->user_id;
        $addharga->jenis = $request->jenis;
        $addharga->kg = 1000; // satuan gram
        $addharga->harga = $request->harga;
        $addharga->hari = $request->hari;
        $addharga->status = $request->status; //aktif
        // dd($addharga);
        $addharga->save();

        return redirect('harga')->with('success','Data berhasil diupdate');

    }

    public function destroy($id){
        $hargas = Harga::find($id);
        $hargas->delete();

        return redirect('harga')->with('success','Data berhasil dihapus');
    }
}
