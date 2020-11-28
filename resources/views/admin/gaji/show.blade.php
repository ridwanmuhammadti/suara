@extends('backend.master')
@section('judul')
    Detail Gaji
@endsection

@section('content')
<div class="row">

    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
          <div class="card">
            <div class="card-body">
          <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Periode</th>
                <th>Kehadiran</th>
                <th>Uang Makan</th>
                <th>Uang Transport</th>
                <th>Uang Lembur</th>
                <th>Bonus</th>
                <th>Total</th>
                <th>Cetak</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($gaji as $item)
              <tr>
                <td>{{ $item->user->name }}</td>
                  <td>{{ $item->tgl_awal }} - {{ $item->tgl_akhir }}</td>
                  <td>{{ Rupiah($item->absen) }}</td>
                  <td>{{ Rupiah($item->uang_makan) }}</td>
                  <td>{{ Rupiah($item->uang_transport) }}</td>
                  <td>{{ Rupiah($item->uang_lembur) }}</td>
                  <td>{{ Rupiah($item->bonus) }}</td>
                  <td>{{ Rupiah($item->total) }}</td>
                    <td>   <a href="/gaji/{{$item->id}}/cetak" target="_blank" class="btn btn-warning btn-sm">Print</a></td>
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


@section('script')
    <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
@endsection