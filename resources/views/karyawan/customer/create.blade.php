@extends('backend.master')
@section('judul')
   Tambah Customer
@endsection

@section('content')

@error('errors')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
   
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
    {{ $error }}
  </div>
@endforeach
        <form action="/customer/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nama Customer</label>
                <input type="text" name="nama" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="kelamin" id="" class="form-control select2">
                    <option>-- Jenis Kelamin</option>
                    <option value="L">Laki - laki</option>
                    <option value="P">Perempuan</option>
                    
                </select>
            </div>
          
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">No Telpon</label>
                <input type="text" name="no_telp" id="" class="form-control">
            </div>
          
          
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        
@endsection