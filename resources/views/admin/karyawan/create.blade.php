@extends('backend.master')
@section('judul')
   Tambah Karyawan
@endsection

@section('content')

@error('errors')
<div class="alert alert-danger">
    {{ $message }}
  </div>
@enderror

@foreach ($errors->all() as $error)
<div class="alert alert-danger">
    {{ $error }}
  </div>
@endforeach

        <form action="/karyawan/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nama Karyawan</label>
                <input type="text" name="name" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama Cabang</label>
                <input type="text" name="nama_cabang" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Alamat Karyawan</label>
                <input type="text" name="alamat" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Alamat Cabang</label>
                <input type="text" name="alamat_cabang" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">No Telpon</label>
                <input type="text" name="no_telp" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Gambar Karyawan</label>
                <input type="file" name="gambar" id="" class="form-control">
            </div>
          
          
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        
@endsection