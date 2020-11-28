@extends('backend.master')

@section('judul')
    Data Paket
@endsection

@section('content')
   <div class="row">
    <div class="col-12 col-md-4 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Tambah Data Paket</h4>
          </div>
          <div class="card-body">
            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="/harga/store" method="POST">
                {{ csrf_field() }}
            
                <div class="form-group">
                    <label for="">Cabang</label>
                    <select name="user_id" id="" class="form-control select2">
                        <option >-- Pilih Cabang --</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_cabang }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

            <div class="form-group">
              <label>Jenis Paket</label>
              <input type="text" name="jenis" class="form-control">
            </div>
           

            <div class="form-group">
              <label>Berat Per - Kg</label>
              <input type="text" class="form-control" value="1000 gram" disabled>
            </div>
           

            <div class="form-group">
              <label>Harga Per - Kg</label>
              <input type="text" name="harga" class="form-control">
            </div>
            <div class="form-group">
              <label>Lama hari</label>
              <input type="text" name="hari" class="form-control">
            </div>
           
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Simpan</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
          </div>
        </form>
        </div>
      </div>

      <div class="col-12 col-md-8 col-lg-8">
          <div class="card">
              <div class="card-body">
                <table class="table table-striped" id="Table">
                    <thead>
                      <tr>
                        <th scope="col">Jenis</th>
                        <th scope="col">Lama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Cabang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($hargas as $item)
                          <tr>
                            <th scope="row">{{$item->jenis}}</th>
                            <td>{{ $item->hari }} Hari</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->user->nama_cabang}} - {{ $item->user->name }}</td>
                            <td>@if ($item->status == 1)
                                Aktif  @else Tidak Aktif
                            @endif </td>
                            <td>
                                <a href="/harga/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm delete" harga-id="{{ $item->id }}"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
   </div>
@endsection


@section('script')
    <script>
      $(document).ready( function () {
    $('#Table').DataTable();
} );
    </script>

    
<script>
  $('.delete').click(function(){
    var harga_id = $(this).attr('harga-id');
    swal({
        title: "Yakin?",
        text: "Mau dihapus Data harga dengan Id "+harga_id+" ??",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
          window.location = "/harga/"+harga_id+"/destroy";
          swal("Data Berhasil dihapus !!", {
            icon: "success",
          });
        } 
      });
  });
</script>
@endsection