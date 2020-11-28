@extends('backend.master')
@section('judul')
    Data Customers
@endsection

@section('content')
<div class="row">

    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">

        @if (auth()->user()->role == 'karyawan')
        <div class="card-header">
           
            <a href="/customer/create" class="btn btn-primary">Tambah Customer</a>
           
          </div>
          @endif
          <div class="card">
            <div class="card-body">
          <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th>No</th>

                @if (auth()->user()->role == 'admin')
                <th>Cabang</th>
                @endif
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Action</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $item)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  @if (auth()->user()->role == 'admin')
                  <td>{{ $item->user->nama_cabang }}</td>
                  @endif
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->email }}</td>
                  <td>@if ($item->kelamin == 'L')
                      Laki - laki
                  @else 
                Perempuan @endif</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->no_telp }}</td>
                <td>
                  <a href="/customer/{{$item->id}}/edit"class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                  <a href="#" class="btn btn-danger btn-sm delete" customer-id="{{ $item->id }}"><i class="far fa-trash-alt"></i></a>
                </td>
                <td>
                  <a href="/customer/{{ $item->id }}/show" class="btn btn-sm btn-primary"><i class="fas fa-search-dollar"></i></i></a>
              
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
    var customer_id = $(this).attr('customer-id');
    swal({
        title: "Yakin?",
        text: "Mau dihapus Data customer dengan Id "+customer_id+" ??",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
          window.location = "/customer/"+customer_id+"/destroy";
          swal("Data Berhasil dihapus !!", {
            icon: "success",
          });
        } 
      });
  });
</script>
@endsection