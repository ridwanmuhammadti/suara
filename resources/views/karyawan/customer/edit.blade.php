@extends('backend.master')
@section('judul')
   Edit Customer
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
        <form action="/customer/{{ $customer->id }}/update" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Nama Customer</label>
                <input type="text" name="nama" id="" class="form-control" value="{{ $customer->nama }}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control"  value="{{ $customer->email }}" readonly>
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="kelamin" id="" class="form-control select2">
                    <option>-- Jenis Kelamin</option>
                    <option value="L" @if ($customer->kelamin == 'L')
                        selected
                    @endif>Laki - laki</option>
                    <option value="P" @if ($customer->kelamin == 'P')
                        selected
                        @endif>Perempuan</option>
                    
                </select>
            </div>
          
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" id="" class="form-control"  value="{{ $customer->alamat }}">
            </div>
            <div class="form-group">
                <label for="">No Telpon</label>
                <input type="text" name="no_telp" id="" class="form-control"  value="{{ $customer->no_telp }}">
            </div>
          
          
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
        
@endsection