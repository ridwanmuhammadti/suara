<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {

        if(auth()->user()->role == 'admin'){

            $customers = Customer::all();
           
        return view('karyawan.customer.index',compact('customers'));
        } else {
            $customers = Customer::orderBy('id','DESC')->where('user_id',auth::user()->id)->get();
        // dd($customer);
        return view('karyawan.customer.index',compact('customers'));
        }

      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.customer.create');
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
            'nama' => 'required',
            'email' => 'required|unique:customers',
            'alamat' => 'required',
            'kelamin' => 'required',
            'no_telp' => 'required',
            
        ]);

        if (Customer::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['errors' => 'Email Sudah Terdaftar !!']);
        }

        $addplg = New customer();
        $addplg->nama = $request->nama;
        $addplg->email = $request->email;
        $addplg->alamat = $request->alamat;
        $addplg->kelamin = $request->kelamin;
        $addplg->no_telp = $request->no_telp;
        $addplg->user_id = Auth::user()->id;
        // dd($addplg);
        $addplg->save();
        
        return redirect('/customer')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        
        // dd($customer);

        return view('karyawan.customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('karyawan.customer.edit',compact('customer'));
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
        $this->validate($request, [
            'nama' => 'required',
           
            'alamat' => 'required',
            'kelamin' => 'required',
            'no_telp' => 'required',
            
        ]);

        $addplg = Customer::find($id);
        $addplg->nama = $request->nama;
        $addplg->email = $request->email;
        $addplg->alamat = $request->alamat;
        $addplg->kelamin = $request->kelamin;
        $addplg->no_telp = $request->no_telp;
        $addplg->user_id = Auth::user()->id;
        // dd($addplg);
        $addplg->save();
        return redirect('/customer')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Customer::find($id);
        $del->delete();

        return back();
    }
}
