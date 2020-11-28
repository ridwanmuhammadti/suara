@extends('backend.master')
@section('judul')
    Gaji Karyawan
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
                <th>Email</th>
                <th>Nama Cabang</th>
                <th>Periode</th>
                <th>Gambar</th>
                <th>Action</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $item)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->nama_cabang }}</td>
                  <td><img src="{{ $item->getFoto() }}" style="width: 100px" alt="" srcset="">
                  </td>
                <td>
                  
                    <a href="/gaji/{{$item->id}}" class="btn btn-warning btn-sm">Tambah Gaji</a>
                    </td>
                    <td>   <a href="/gaji/{{$item->id}}/show" class="btn btn-warning btn-sm">Details</a></td>
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