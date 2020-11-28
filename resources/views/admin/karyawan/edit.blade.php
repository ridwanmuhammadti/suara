@extends('backend.master')
@section('judul')
   Profile
@endsection

@section('content')

<div class="row">

    
  <div class="col-12 col-md-6 col-lg-6">
    <div class="card">
      <div class="card-header">
        <h4>Edit</h4>
      </div>
      <div class="card-body">
            
@error('errors')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

        <form action="/karyawan/{{ $user->id }}/update" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nama Karyawan</label>
                <input type="text" name="name" id="" class="form-control" value="{{ $user->name }}">
            </div>
            @if(auth()->user()->role == 'admin')
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" value="{{ $user->email}}">
            </div>

            <div class="form-group">
                <label for="">Nama Cabang</label>
                <input type="text" name="nama_cabang" id="" class="form-control" value="{{ $user->nama_cabang }}">
            </div>
            
            <div class="form-group">
                <label for="">Alamat Cabang</label>
                <input type="text" name="alamat_cabang" id="" class="form-control" value="{{ $user->alamat_cabang }}">
            </div>
            @elseif (auth()->user()->role == 'karyawan')
                
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" value="{{ $user->email}}" readonly>
            </div>

            <div class="form-group">
                <label for="">Nama Cabang</label>
                <input type="text" name="nama_cabang" id="" class="form-control" value="{{ $user->nama_cabang }}" readonly>
            </div>
            
            <div class="form-group">
                <label for="">Alamat Cabang</label>
                <input type="text" name="alamat_cabang" id="" class="form-control" value="{{ $user->alamat_cabang }}" readonly>
            </div>
            
            @endif
            <div class="form-group">
                <label for="">Alamat Karyawan</label>
                <input type="text" name="alamat" id="" class="form-control" value="{{ $user->alamat }}">
            </div>
            <div class="form-group">
                <label for="">No Telpon</label>
                <input type="text" name="no_telp" id="" class="form-control" value="{{ $user->no_telp }}">
            </div>
            <div class="form-group">
                <label for="">Foto</label>
                <input type="file" name="gambar" id="" class="form-control">
            </div>


           
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
      </div>
    </div>
    
</div> 
<div class="col-12 col-sm-6 col-lg-6">
    <div class="card author-box card-primary">
      <div class="card-body">
        <div class="author-box-left">
          <img alt="image" src="{{ $user->getFoto() }}" class="rounded-circle author-box-picture">
          <div class="clearfix"></div>
          {{-- <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a> --}}
        </div>
        <div class="author-box-details">
          <div class="author-box-name">
            <h4>{{ $user->name }}</h4>
          </div>
          <div class="author-box-job"><h4>{{ $user->nama_cabang }}</h4></div>
          <div class="author-box-description">
            <ul>
                <li>Email : {{ $user->email }}</li>
                <li>Telp : {{ $user->no_telp }}</li>
                <li>Alamat : {{ $user->alamat }}</li>
                {{-- <li>Email : {{ $user->email }}</li> --}}
            </ul>
          </div>
         
        
          <div class="w-100 d-sm-none"></div>
          <div class="float-right mt-sm-0 mt-3">
            <a href="/cetak/{{ $user->id }}/kartu" target="_blank" class="btn btn-primary">Cetak Kartu <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
    </div>
   
  </div>

</div>
@endsection