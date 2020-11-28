@extends('backend.master')
@section('judul')
   Tambah Orders
@endsection

@section('content')

@error('errors')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

        <form action="/transaksi/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
           
            <div class="form-group">
                <label for="">No Transaksi</label>
                <input type="text" name="invoice" class="form-control" value="{{ $newID }}" readonly>
            </div>

            <div class="form-group">
                <label for="">Nama Customer</label>
                <select name="customer_id"  id="customer_id"  class="form-control select2">
                    <option>-- Pilih Customers --</option>
                    @foreach ($customers as $item)
                        
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <span id="select-email"></span>
            </div>
            <div class="form-group">
                <label for="">Pilih Pakaian</label>
                <select name="harga_id" id="id" class="form-control select2">
                    <option value="">-- Jenis Pakaian --</option>
                   
                   
                    @foreach($jeniss as $jenis)
                    <option value="{{$jenis->id}}">{{$jenis->jenis}}</option>
                    @endforeach			
                </select>
            </div>

            <div class="col-md-12">
                <span id="select-hari"></span>
            </div>
            <div class="col-md-12">
                <span id="select-harga"></span>
            </div>
          
            <div class="form-group">
                <label for="">Discon</label>
                <input type="text" name="disc" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Berat Pakaian</label>
                <input type="text" name="kg" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Status Order</label>
                <input type="text" name="status_order" id="" class="form-control" value="Proses" readonly>
            </div>
          
            <div class="form-group">
                <label for="">Status Pembayaran</label>
                <select name="status_payment" id="" class="form-control select2">
                    <option>-- Pilih --</option>
                    <option value="Belum">Belum dibayar</option>
                    <option value="Lunas">Sudah dibayar</option>
                   
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        
@endsection


@section('script')
    <script>
    // Filter Harga 
    $(document).ready(function() {
       var id = $("#id").val();
            $.get('{{ Url("listhari") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
            $("#select-hari").html(resp);
            $.get('{{ Url("listharga") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
            $("#select-harga").html(resp);
        });
        });
    });

    $(document).on('change', '#id', function (e) { 
      var id = $(this).val();
      $.get('{{ Url("listhari") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
        $("#select-hari").html(resp);
      });
    });

    $(document).on('change', '#id', function (e) { 
        var id = $(this).val();
        $.get('{{ Url("listharga") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
            $("#select-harga").html(resp);
        });
    });


    // get email customers
    
    $(document).ready(function() {
       var customer_id = $("#customer_id").val();
            $.get('{{ Url("get-email-customer") }}',{'_token': $('meta[name=csrf-token]').attr('content'),customer_id:customer_id}, function(resp){  
            $("#select-email").html(resp);
           
        });
    });

    $(document).on('change', '#customer_id', function (e) { 
      var customer_id = $(this).val();
      $.get('{{ Url("get-email-customer") }}',{'_token': $('meta[name=csrf-token]').attr('content'),customer_id:customer_id}, function(resp){  
        $("#select-email").html(resp);
      });
    });


</script>
@endsection