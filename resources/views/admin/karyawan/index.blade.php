@extends('backend.master')
@section('judul')
    Karyawan
@endsection

@section('content')
<div class="row">

    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
           
            <a href="/karyawan/create" class="btn btn-primary">Tambah Karyawan</a>
           
          </div>
          <div class="card">
            <div class="card-body">
          <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nama Cabang</th>
                <th>Alamat Karyawan</th>
                <th>No Telpon</th>
                <th>Gambar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $item)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->nama_cabang }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->no_telp }}</td>
                  <td><img src="{{ $item->getFoto() }}" style="width: 100px" alt="" srcset="">
                  </td>
                <td>
                  <a href="/karyawan/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                  <a href="#" class="btn btn-danger btn-sm delete" karyawan-id="{{ $item->id }}"><i class="far fa-trash-alt"></i></a>
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


@section('script')
    <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    
<script>
  $('.delete').click(function(){
    var karyawan_id = $(this).attr('karyawan-id');
    swal({
        title: "Yakin?",
        text: "Mau dihapus Data karyawan dengan Id "+karyawan_id+" ??",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
          window.location = "/karyawan/"+karyawan_id+"/destroy";
          swal("Data Berhasil dihapus !!", {
            icon: "success",
          });
        } 
      });
  });
</script>
@endsection