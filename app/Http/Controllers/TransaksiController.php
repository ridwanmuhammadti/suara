<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use PDF;
use App\Customer;
use App\Harga;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class TransaksiController extends Controller
{
    public function index()
    {
        if(auth()->user()->role == 'admin'){

            $transaksis = Transaksi::orderBy('created_at','DESC')->get();
            return view('karyawan.transaksi.index',compact('transaksis'));
        } else {
            $transaksis = Transaksi::orderBy('created_at','DESC')->where('user_id',Auth::user()->id)->get();
        // dd($transaksis);
        return view('karyawan.transaksi.index',compact('transaksis'));
        }

        App::abort(403, 'You Cannot view this project');
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::orderBy('id','DESC')->where('user_id',Auth::user()->id)->get();
        $jeniss = Harga::orderBy('id','Desc')->where('status','1')->where('user_id',Auth::user()->id)->get();
        // dd($jeniss);
        $y = date('Y');
        $number = mt_rand(1000, 9999);
        // Nomor Form otomatis
        $newID = $number. Auth::user()->id .''.$y;
        $tgl = date('d-m-Y');

        // $jeniss = Harga::select('id','jenis')->where('status','1')->where('user_id',Auth::user()->id)->get();
        // dd($jeniss);
        return view('karyawan.transaksi.create',compact('customers','newID','jeniss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $order = new Transaksi;
        $order->invoice = $request->invoice;
        $order->tgl_transaksi = Carbon::now()->parse($order->tgl_transaksi)->format('d-m-Y');
        $order->status_order = $request->status_order;
        $order->status_payment = $request->status_payment;
        $order->harga_id = $request->harga_id;
        $order->customer_id = $request->customer_id;
        $order->email_customer = $request->email_customer;
        $order->user_id = Auth::user()->id;
        $order->hari    = $request->hari;
        $order->kg      = $request->kg;
        $order->price   = $request->price;
        $order->disc    = $request->disc;
        $hitung = ( $order->kg * $order->price);
        $disc = ($hitung * $order->disc) / 100;
        $total = $hitung - $disc;
        $order->total = $total;

        // dd($order);

        if ($order->save()) {

            // Menyiapkan data
            $email = $order->email_customer;
            $data = array(
                'invoice' => $order->invoice,
                'customer' => $order->customer,
                'tgl_transaksi' => $order->tgl_transaksi,
            );
                
            // Kirim Email
            Mail::send('karyawan.email.email', $data, function($mail) use ($email, $data){
            $mail->to($email,'no-replay')
                    ->subject("E-Laundry - Nomor Invoice");
            $mail->from('arsyalaundrybjb@gmail.com');
            });
        }

        return redirect('/transaksi')->with('success','Transaksi Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Transaksi::find($id);
        return view('karyawan.transaksi.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }


    public function getemailcustomer(Request $request)
    {
        
            $customer = Customer::select('id','email')
            ->where('id',$request->customer_id)
            ->where('user_id',Auth::user()->id)
            ->get();

            $select = '';
            $select .= '
                        <div class="form-group has-success">
                        <label for="id" class="control-label">Email</label>
                        <select id="email" class="form-control" name="email_customer" value="email">
                        ';
                        foreach ($customer as $studi) {
            $select .= '<option value="'.$studi->email.'">'.$studi->email.'</option>';
                        }'
                        </select>
                        </div>
                        </div>';
            return $select;

        
    }

    public function listharga(Request $request)
    {
            $list_harga = Harga::select('id','harga')
            ->where('user_id',Auth::user()->id)
            ->where('id',$request->id)
            ->get();
            $select = '';
            $select .= '
                        <div class="form-group has-success">
                        <label for="id" class="control-label">Harga</label>
                        <select id="harga" class="form-control" name="price" value="harga">
                        ';
                        foreach ($list_harga as $studi) {
            $select .= '<option value="'.$studi->harga.'">'.$studi->harga.'</option>';
                        }'
                        </select>
                        </div>
                        </div>';
            return $select;
        
    }

    // Filter List Jumlah Hari
    public function listhari(Request $request)
    {
       
        $list_jenis = Harga::select('id','hari')
        ->where('user_id',Auth::user()->id)
        ->where('id',$request->id)
        ->get();
        $select = '';
        $select .= '
                    <div class="form-group has-success">
                    <label for="id" class="control-label">Pilih Hari</label>
                    <select id="hari" class="form-control" name="hari" value="hari">
                    ';
                    foreach ($list_jenis as $hari) {
        $select .= '<option value="'.$hari->hari.'">'.$hari->hari.'</option>';
                    }'
                    </select>
                    </div>
                    </div>';
        return $select;
       
    }

    public function updatebayar($id){
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status_payment' => 'Lunas',
        ]);

        return redirect('/transaksi')->with('success','Berhasil dibayar');
    }
    public function updateselesai($id){
        $transaksi = Transaksi::find($id);
        $transaksi->status_order = 'Selesai';
        if ($transaksi->save()) {

            // Menyiapkan data
            $email = $transaksi->email_customer;
            $data = array(
                'invoice' => $transaksi->invoice,
                'customer' => $transaksi->customer,
                'tgl_transaksi' => $transaksi->tgl_transaksi,
            );
                
            // Kirim Email
            Mail::send('karyawan.email.selesai', $data, function($mail) use ($email, $data){
            $mail->to($email,'no-replay')
                    ->subject("E-Laundry - Laundry Selesai");
            $mail->from('arsyalaundrybjb@gmail.com');
            });
        }
        
        
        // dd($transaksi);
        return redirect('/transaksi')->with('success','Berhasil diupdate');
    }
    public function updateambil($id){
        $transaksi = Transaksi::find($id);
        $transaksi->status_order = 'Clear';
        $transaksi->tgl_ambil = Carbon::today();
        if($transaksi->save()){
             // Menyiapkan data
             $email = $transaksi->email_customer;
             $data = array(
                 'invoice' => $transaksi->invoice,
                 'customer' => $transaksi->customer,
                 'tgl_transaksi' => $transaksi->tgl_transaksi,
                 'tgl_ambil' => $transaksi->tgl_ambil,
             );
                 
             // Kirim Email
             Mail::send('karyawan.email.diambil', $data, function($mail) use ($email, $data){
             $mail->to($email,'no-replay')
                     ->subject("E-Laundry - Laundry Sudah Diambil");
             $mail->from('arsyalaundrybjb@gmail.com');
             });
        }

        return redirect('/transaksi')->with('success','Berhasil di ambil');
    }




    public function invoice($id){
        $data = Transaksi::find($id);
        
        // dd($data->user);
        // dd($invoice);
        return PDF::loadview('laporan.cetak-invoice',compact('data'))->setPaper('legal', 'landscape')->stream();

    }
}
