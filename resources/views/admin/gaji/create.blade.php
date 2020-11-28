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

        <form action="/gaji/{{ $users->id }}/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nama Karyawan</label>
                <input type="text" id="" class="form-control"  value="{{ $users->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control" value="{{ $users->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Cabang</label>
                <input type="text" name="nama_cabang" id="" class="form-control" value="{{ $users->nama_cabang }}" readonly>
            </div>
            <div class="form-group">
              <label for="">Dari tanggal</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control datepicker"  data-language='en'  name="tgl_awal">
                    </div>
            </div>
            <div class="form-group">
              <label for="">Sampai tanggal</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control datepicker"  data-language='en'  name="tgl_akhir">
                    </div>
            </div>
            <div class="form-group">
                <label for="">Jumlah Kehadiran dalam sebulan</label>
                <input type="text" name="absen" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Uang Makan perhari</label>
                <input type="text" name="uang_makan" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Uang Transport</label>
                <input type="text" name="uang_transport" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Uang Lembur perjam</label>
                <input type="text" name="uang_lembur" id="" class="form-control">
            </div>
           
            <div class="form-group">
                <label for="">Bonus Karyawan</label>
                <input type="text" name="bonus" id="" class="form-control" value="{{ $bonus }}" readonly>
            </div>
           
          
          
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        
@endsection