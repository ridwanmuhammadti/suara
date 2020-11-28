@extends('backend.master')
@section('judul')
    Invoice {{ $data->invoice }}
@endsection

@section('content')
<div class="row">

    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">

      
            
        

          
          <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card card-dark">
                          <div class="card-header">
                            <h4>Cabang {{ $data->user->nama_cabang }}</h4>
                          </div>
                          <div class="card-body">
                            <h3> &nbsp;<b class="text-danger">{{$data->nama_cabang}}</b></h3>
                            <p class="text-muted m-l-5"> Diterima Oleh <span style="margin-left:20px"> </span>: {{$data->user->name}}
                                <br/> Alamat <span style="margin-left:70px"> </span>: {{$data->user->alamat}}
                                <br/> No. Telp <span style="margin-left:68px"> </span>: {{$data->user->no_telp}}
                                </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <div class="card card-dark">
                          <div class="card-header">
                            <h4>Detail Order Customer :</h4>
                          </div>
                          <div class="card-body">
                            
                            <p class="text-muted m-l-30">
                                {{$data->customer->nama}}
                                - {{$data->customer->alamat}}
                                <br/> {{$data->customer->no_telp}}</p>
                            <p class="m-t-30"><b>Tanggal Masuk :</b>  {{carbon\carbon::parse($data->tgl_transaksi)->format('d/m/Y')}}</p>
                            <p><b>Tanggal Diambil :</b>  
                                @if ($data->tgl_ambil == "")
                                    Belum Diambil
                                @else
                                {{\carbon\carbon::parse($data->tgl_ambil)->format('d/m/Y')}}
                                @endif
                            </p>
                        
                          </div>
                        </div>
                      </div>
                   <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                          <tbody>
                            <tr>
                                <th>#</th>
                                <th>Jenis Pakaian</th>
                                <th>Berat</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>{{$data->harga->jenis}}</td>
                                <td>{{$data->kg}} kg</td>
                                <td>{{Rupiah($data->harga->harga)}} /Kg</td>
                                <td><input type="hidden" value="{{$hitung = $data->kg * $data->harga->harga}}">
                                    <p>{{Rupiah($hitung)}}</p></td>
                            </tr>
                        
                        </tbody></table>
                      </div>
                   </div>
                  
                    <div class="col-md-12">
                        <div class="pull-left m-t-10">
                            <h6 class="text-right" style="font-weight:bold">Dengan Menandatangani/Menerima Nota Ini, Berarti Anda Setuju :</h6>
                            <p>
                                1. Pengambilan Cucian harus membawa Nota <br>
                                2. Hitung dan periksa sebelum pergi
                            </p>
                        </div>
                        <div class="pull-right m-t-10 text-right">
                            <p>Total : {{Rupiah($hitung)}}</p>
                            <p>Disc @if ($data->disc == "")
                                (0 %)
                            @else
                                ({{$data->disc}} %)
                            @endif :  <input type="hidden" value="{{$disc = ($hitung * $data->disc   ) / 100}}"> {{Rupiah($disc)}} </p>
                            <hr>
                            <h3><b>Total Bayar :</b> {{Rupiah($hitung - $disc)}}</h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="text-right">
                            <a href="/transaksi" class="btn btn-outline btn-danger" style="color:white">Back</a>
                            <a href="/invoice/{{ $data->id }}" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>

            </div>
       
        </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection