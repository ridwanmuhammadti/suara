@extends('backend.master')
@section('judul')
   Hari {{ $days->isoFormat('dddd')  }}
@endsection

@section('content')
<div class="row">

    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <a href="/keuangan/hari/cetak" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i></i></a>
             
        </div>
      
          <div class="card">
            <div class="card-body">
          <table class="table table-striped" id="table-1">
            <thead>
              <tr>
                <th>Invoice</th>
                <th>Nama</th>
                <th>Tanggal Transaksi</th>
                <th>Status Order</th>
                <th>Status Payment</th>
                <th>Jenis Laundry</th>
                <th>Total</th>
                <th>Details</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pemasukanhari as $item)
              <tr>
                  <td>{{ $item->invoice }}</td>
                  <td>{{ $item->customer->nama }}</td>
                  <td>{{carbon\carbon::parse($item->tgl_transaksi)->format('d M Y')}}</td>
                  <td>
                    @if ($item->status_order == 'Selesai')
                    <span class="badge badge-primary">Selesai</span>
                    @elseif($item->status_order == 'Clear')
                        <span class="badge badge-success">Sudah Diambil</span>
                    @elseif($item->status_order == 'Proses')
                        <span class="badge badge-secondary">Sedang Proses</span>
                    @endif
                  </td>
                  <td>
                    @if ($item->status_payment == 'Lunas')
                    <span class="badge badge-primary">Sudah Dibayar</span>
                @elseif($item->status_payment == 'Belum')
                    <span class="badge badge-danger">Belum Dibayar</span>
                @endif
                  </td>
                  <td>{{ $item->harga->jenis }}</td>
                  <td>{{ Rupiah($item->total) }}</td>
              
                <td>
                  <a href="/transaksi/{{ $item->id }}/show" class="btn btn-sm btn-primary"><i class="fas fa-search-dollar"></i></i></a>
                </td>
              </tr>
          @endforeach
            </tbody>
          </table>

            </div>
       
        </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection