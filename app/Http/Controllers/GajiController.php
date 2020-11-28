<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Gaji;
use App\Transaksi;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class GajiController extends Controller
{
    public function index(){
        $days = Carbon::now()->locale('id');
        $users = User::where('id','!=',auth()->user()->id)->get();

        // dd($users);
        $gaji = Gaji::all();
        $gajikaryawan = Gaji::select('user_id')->get();

        
        // dd($gajikaryawan);
        return view('admin.gaji.index',compact('gaji','users','gajikaryawan'));
    }

    public function create($id){
        $days = Carbon::now()->locale('id');
        
        $pemasukanbulan = Transaksi::where('status_order','Clear')->where('user_id',$id) ->whereMonth('updated_at', '=', $days)->get();
        $bulan = $pemasukanbulan->sum('total');
        $bonus = ($bulan * 20) / 100;
        // dd($bonus);
        $users = User::find($id);
        return view('admin.gaji.create',compact('users','bonus'));
    }


    public function show($id){
        $days = Carbon::now()->locale('id');
        $gaji = Gaji::where('user_id',$id)->get();
        return view('admin.gaji.show',compact('gaji'));
    }

    public function store(Request $request, $id){
        $users = User::find($id);
        $gaji = new Gaji;
        $gaji->user_id = $id;
        $mail = $request->email;
        $gaji->tgl_awal = $request->tgl_awal;
        $gaji->tgl_akhir = $request->tgl_akhir;
        $absen = $gaji->absen = $request->absen * 20000;
        $makan = $gaji->uang_makan = $request->uang_makan * 10000;
        $transport =  $gaji->uang_transport = $request->uang_transport *10000;
        $lembur = $gaji->uang_lembur = $request->uang_lembur * 3000;
        $bonus = $gaji->bonus = $request->bonus;
        $gaji->total = $absen + $makan + $transport + $lembur + $bonus;
        
        if ($gaji->save()) {

            // Menyiapkan data
            $email = $mail;
            $data = array(
                'name' => $users->name,
                'tgl_awal' => $gaji->tgl_awal,
                'tgl_akhir' => $gaji->tgl_akhir,
                'absen' => $absen,
                'makan' => $makan,
                'transport' => $transport,
                'lembur' => $lembur,
                'bonus' => $bonus,
                'total' => $gaji->total,
            );
                
            // Kirim Email
            Mail::send('karyawan.email.gaji', $data, function($mail) use ($email, $data){
            $mail->to($email,'no-replay')
                    ->subject("E-Laundry - Nomor Invoice");
            $mail->from('arsyalaundrybjb@gmail.com');
            });
        }

        return redirect('/penggajian')->with('success','Data berhasil dikirim');
    }

    public function cetak($id){
        $gaji = Gaji::find($id);
        return PDF::loadview('laporan.cetak-gaji',compact('gaji'))->setPaper('legal', 'potrait')->stream();
    }
}
