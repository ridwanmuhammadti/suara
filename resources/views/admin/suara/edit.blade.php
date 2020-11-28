@extends('backend.master')

@section('judul')
    Data Suara
@endsection

@section('content')
   <div class="row">
    <div class="col-12 col-md-4 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Tambah Data Suara</h4>
          </div>
          <div class="card-body">
            {{-- <div class="alert alert-info">
              <b>Note!</b> Not all browsers support HTML5 type input.
            </div> --}}
            <form action="/suara/{{ $suara->id }}/update" method="POST">
                {{ csrf_field() }}
            
             

            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" value="{{ $suara->nama }}">
            </div>
           

            <div class="form-group">
              <label>No KTP</label>
              <input type="text" class="form-control" name="no_ktp"  value="{{ $suara->no_ktp }}">
            </div>
           

            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control"  value="{{ $suara->alamat }}">
            </div>
            <div class="form-group">
              <label>RT</label>
              <input type="text" name="rt" class="form-control"  value="{{ $suara->rt }}">
            </div>
            <div class="form-group">
              <label>RW</label>
              <input type="text" name="rw" class="form-control"  value="{{ $suara->rw }}">
            </div>
            <div class="form-group">
              <label for="">Kelurahan</label>
              <select name="kelurahan" id="" class="form-control select2">
                  <option>-- Pilih Kelurahan --</option>
                  <option value="LOKTABAT UTARA" @if ($suara->kelurahan == 'LOKTABAT UTARA')
                    selected
                @endif>LOKTABAT UTARA</option>
                  <option value="MENTAOS"  @if ($suara->kelurahan == 'MENTAOS')
                    selected
                @endif>MENTAOS</option>
                  <option value="KOMET"  @if ($suara->kelurahan == 'KOMET')
                    selected
                @endif>KOMET</option>
                  <option value="SUNGAI ULIN"  @if ($suara->kelurahan == 'SUNGAI ULIN')
                    selected
                @endif>SUNGAI ULIN</option>
                  <option value="SEI BESAR"  @if ($suara->kelurahan == 'SEI BESAR')
                    selected
                @endif>SEI BESAR</option>
                  <option value="GUNTUNG PAIKAT"  @if ($suara->kelurahan == 'GUNTUNG PAIKAT')
                    selected
                @endif>GUNTUNG PAIKAT</option>
                  <option value="KEMUNING"  @if ($suara->kelurahan == 'KEMUNING')
                    selected
                @endif>KEMUNING</option>
                  <option value="LOKTABAT SELATAN" @if ($suara->kelurahan == 'LOKTABAT SELATAN')
                    selected
                @endif>LOKTABAT SELATAN</option>
                  <option value="CEMPAKA"  @if ($suara->kelurahan == 'CEMPAKA')
                    selected
                @endif>CEMPAKA</option>
                  <option value="SUNGAI TIUNG"  @if ($suara->kelurahan == 'SUNGAI TIUNG')
                    selected
                @endif>SUNGAI TIUNG</option>
                  <option value="BANGKAL"  @if ($suara->kelurahan == 'BANGKAL')
                    selected
                @endif>BANGKAL</option>
                  <option value="PALAM"  @if ($suara->kelurahan == 'PALAM')
                    selected
                @endif>PALAM</option>
                  <option value="LANDASAN ULIN TIMUR"  @if ($suara->kelurahan == 'LANDASAN ULIN TIMUR')
                    selected
                @endif>LANDASAN ULIN TIMUR</option>
                  <option value="SYAMSUDDINOOR"  @if ($suara->kelurahan == 'SYAMSUDDINOOR')
                    selected
                @endif>SYAMSUDDINOOR</option>
                  <option value="GUNTUNG MANGGIS" @if ($suara->kelurahan == 'GUNTUNG MANGGIS')
                    selected
                @endif>GUNTUNG MANGGIS</option>
                  <option value="GUNTUNG PAYUNG" @if ($suara->kelurahan == 'GUNTUNG PAYUNG')
                    selected
                @endif>GUNTUNG PAYUNG</option>
                  <option value="LANDASAN ULIN BARAT" @if ($suara->kelurahan == 'LANDASAN ULIN BARAT')
                    selected
                @endif>LANDASAN ULIN BARAT</option>
                  <option value="LANDASAN ULIN TENGAH" @if ($suara->kelurahan == 'LANDASAN ULIN TENGAH')
                    selected
                @endif>LANDASAN ULIN TENGAH</option>
                  <option value="LANDASAN ULIN UTARA" @if ($suara->kelurahan == 'LANDASAN ULIN UTARA')
                    selected
                @endif>LANDASAN ULIN UTARA</option>
                  <option value="LANDASAN ULIN SELATAN" @if ($suara->kelurahan == 'LANDASAN ULIN SELATAN')
                    selected
                @endif>LANDASAN ULIN SELATAN</option>
                 
              </select>
          </div>
            <div class="form-group">
              <label>No TPS</label>
              <input type="text" name="no_tps" class="form-control"  value="{{ $suara->no_tps }}">
            </div>
            <div class="form-group">
              <label>Nomor Telpon</label>
              <input type="text" name="no_telpon" class="form-control"  value="{{ $suara->no_telpon }}">
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="ket" class="form-control"  value="{{ $suara->ket }}">
            </div>
            <div class="form-group">
              <label>Koordinator</label>
              <input type="text" name="koordinator" class="form-control"  value="{{ $suara->koordinator }}">
            </div>
            <div class="form-group">
              <label>Tim Pendata</label>
              <input type="text" name="tim_pendata" class="form-control"  value="{{ $suara->tim_pendata}}">
            </div>
            <div class="form-group">
              <label>Tanggal Terima</label>
              <input type="text" class="form-control datepicker" name="tgl_terima"  value="{{ $suara->tgl_terima }}">
            </div>
            
           
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-warning mr-1" type="submit">Update</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
          </div>
        </form>
        </div>
      </div>

      <div class="col-12 col-md-8 col-lg-8">
          <div class="card">
            <div class="card-header">
              <a href="/suara/export" class="btn btn-success">Export All</a>
            </div>
              <div class="card-body">
                
            <div class="table-responsive">
                <table class="table table-striped" id="Table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No KTP</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">RT</th>
                        <th scope="col">RW</th>
                        <th scope="col">Kelurahan</th>
                        <th scope="col">No TPS</th>
                        <th scope="col">No Telpon</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Koordinator</th>
                        <th scope="col">Tim Pendata</th>
                        <th scope="col">Tanggal Terima</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($suaras as $item)
                          <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th scope="row">{{$item->nama}}</th>
                            <td>{{ $item->no_ktp }} Hari</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->rt }}</td>
                            <td>{{ $item->rw }}</td>
                            <td>{{ $item->kelurahan }}</td>
                            <td>{{ $item->no_tps }}</td>
                            <td>{{ $item->no_telpon }}</td>
                            <td>{{ $item->ket}}</td>
                            <td>{{ $item->koordinator }}</td>
                            <td>{{ $item->tim_pendata }}</td>
                            <td>{{ $item->tgl_terima->format('d-m-Y') }}</td>
                            <td>
                                <a href="/suara/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm delete" suara-id="{{ $item->id }}"><i class="far fa-trash-alt"></i></a>
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
@endsection


@section('script')
    <script>
      $(document).ready( function () {
    $('#Table').DataTable();
} );
    </script>

    
<script>
  $('.delete').click(function(){
    var suara_id = $(this).attr('suara-id');
    swal({
        title: "Yakin?",
        text: "Mau dihapus Data suara dengan Id "+suara_id+" ??",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        console.log(willDelete);
        if (willDelete) {
          window.location = "/suara/"+suara_id+"/destroy";
          swal("Data Berhasil dihapus !!", {
            icon: "success",
          });
        } 
      });
  });
</script>
@endsection