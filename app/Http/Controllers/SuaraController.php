<?php

namespace App\Http\Controllers;

use App\Exports\KelurahanSuaraExport;
use App\Exports\SuaraExport;
use App\Imports\SuaraImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Suara;

use Illuminate\Http\Request;

class SuaraController extends Controller
{
    public function index(){
        $suaras = Suara::all();
        return view('admin.suara.index',compact('suaras'));   
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_ktp' => 'required',   
        ]);

        $suara = new Suara;
        $suara->nama = $request->nama;
        $suara->no_ktp = $request->no_ktp.' ';
        $suara->alamat = $request->alamat;
        $suara->rt = $request->rt;
        $suara->rw = $request->rw;
        $suara->kelurahan = $request->kelurahan;
        $suara->no_tps = $request->no_tps;
        $suara->no_telpon = $request->no_telpon;
        $suara->ket = $request->ket;
        $suara->koordinator = $request->koordinator;
        $suara->tim_pendata = $request->tim_pendata;
        $suara->tgl_terima = $request->tgl_terima;
        // dd($suara);
        $suara->save();

        
        return back()->with('success','Data berhasil ditambahkan');
    }

    public function edit($id){
        $suaras = Suara::all();
        $suara = Suara::find($id);
        return view('admin.suara.edit',compact('suaras','suara'));
        
    }

    public function update($id, Request $request){
        $suara = Suara::find($id);
        $suara->nama = $request->nama;
        $suara->no_ktp = $request->no_ktp.' ';
        $suara->alamat = $request->alamat;
        $suara->rt = $request->rt;
        $suara->rw = $request->rw;
        $suara->kelurahan = $request->kelurahan;
        $suara->no_tps = $request->no_tps;
        $suara->no_telpon = $request->no_telpon;
        $suara->ket = $request->ket;
        $suara->koordinator = $request->koordinator;
        $suara->tim_pendata = $request->tim_pendata;
        $suara->tgl_terima = $request->tgl_terima;
        // dd($suara);
        $suara->save();

        
        return redirect('/suara')->with('success','Data berhasil diupdate');
    }

    public function destroy($id){
        $suara = Suara::find($id);
        $suara->delete();

        return back()->with('success','Data berhasil dihapus');
    }

    public function laporan(){
        $suaras = Suara::all();
        return view('admin.suara.laporan',compact('suaras'));
    }

    public function export() 
    {
        return Excel::download(new SuaraExport, 'Suara.xlsx');
    }

    public function cetaksuara(Request $request) 
    {
        return Excel::download(new KelurahanSuaraExport($request), 'KelurahanSuara.xlsx');
    }

    public function importexcel(Request $request){
        Excel::import(new SuaraImport,$request->file('data'));
        // dd($request->all());

        return redirect('/suara')->with('success','Sukses Import');
    }
    
}
