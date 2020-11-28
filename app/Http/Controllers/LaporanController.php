<?php

namespace App\Http\Controllers;

use App\Customer;
use Carbon\Carbon;
use PDF;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
      
    }
    public function indexlaundry(){
        $user = User::where('id','!=',auth()->user()->id)->get();
        // dd($user);
        $customers = Customer::all();
        $transaksi = Transaksi::all();
        $customers = Customer::all()->count();
        $masuk = Transaksi::whereIN('status_order',['Proses','Selesai','Clear'])->count();
        $selesai = Transaksi::where('status_order','Selesai')->count();
        $diambil = Transaksi::where('status_order','Clear')->count();
        $sp = Transaksi::where('status_order','Proses')->count();
        $proses = Transaksi::whereIN('status_order',['Proses','Selesai'])->get();
        return view('laporan.laundry',compact('user','proses','customers','masuk','selesai','diambil','sp'));
    }

    public function cetaklaundry(Request $request)
    {
        

        $transaksi = Transaksi::query();

        // dd($request->all());
        if ($request->get('status_order')) {
            if ($request->get('status_order') == 'Proses') {
                $transaksi->where('status_order', 'Proses');
            }

            if ($request->get('status_order') == 'Selesai') {
                $transaksi->where('status_order', 'Selesai');
            }
            if ($request->get('status_order') == 'Diambil') {
                $transaksi->where('status_order', 'Clear');
            }
        }

        $cetaklaundry = $transaksi->get();

        return PDF::setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('laporan.cetak-laundry', compact('cetaklaundry'))->setPaper('legal', 'landscape')->stream();
    }

    public function cetakfilterlaundry(Request $request){
        // dd($request->all());

        $days = Carbon::now()->locale('id');
        $data = Transaksi::whereIN('status_order',[$request->proses,$request->selesai,$request->diambil])->whereBetween('updated_at', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
        // dd($data);

        $tgl_mulai = $request->tanggal_mulai;
        $tgl_akhir = $request->tanggal_akhir;
        
        $pdf = PDF::loadView('laporan.cetak-laundry-filter',compact('data','tgl_mulai','tgl_akhir','days'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan Riwayat .pdf');
    }

  
    public function cetakcustomer(Request $request){

        // dd($request->all());
        $days = Carbon::now()->locale('id');
        $data = Customer::whereIN('user_id',$request->id)->get();
        // dd($data);

        
        $pdf = PDF::loadView('laporan.cetak-customer',compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan Riwayat .pdf');
    }

    public function cetaktahun2019(){
        $tahun = Transaksi::whereYear('updated_at', '=', 2019)
        ->get();
        // dd($tahun);
        return PDF::setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('laporan.cetak-tahun-transaksi', compact('tahun'))->setPaper('legal', 'landscape')->stream();
    }
    public function cetaktahun2020(){
        $tahun = Transaksi::whereYear('updated_at', '=', 2020)
        ->get();
        // dd($tahun);
        return PDF::setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('laporan.cetak-tahun-transaksi', compact('tahun'))->setPaper('legal', 'landscape')->stream();
    }
    public function cetaktahun2021(){
        $tahun = Transaksi::whereYear('updated_at', '=', 2021)
        ->get();
        // dd($tahun);
        return PDF::setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('laporan.cetak-tahun-transaksi', compact('tahun'))->setPaper('legal', 'landscape')->stream();
    }
}
