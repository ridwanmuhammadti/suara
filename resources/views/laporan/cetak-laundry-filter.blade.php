<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:0px;
            width:100%;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:0px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:100%;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:auto;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <table>
            <thead>

                <tr>
                    <td colspan="6" style="background-color: rgb(133, 133, 133); text-align: center"><h3>Arsya Laundry</h3></td>
                </tr>
                <tr>
                    <td colspan="6" style="background-color: rgb(182, 182, 182); text-align: center"><h3>Laporan Laundry Pada Tanggal {{ carbon\carbon::parse($tgl_mulai)->isoFormat('dddd DD MMMM YYYY') }} sampai {{ carbon\carbon::parse($tgl_akhir)->isoFormat('dddd DD MMMM YYYY') }}</h3></td>
                </tr>

                <tr>
                <th>Invoice</th>
                <th>Nama</th>
                <th>Tanggal Transaksi</th>
                <th>Jenis Laundry</th>
                <th>Status</th>
                <th>Harga</th>
                </tr>
               
            </thead>
            <tbody>
              
                @foreach ($data as $item)
                    <tr>
                <td>{{ $item->invoice }}</td>
                  <td>{{ $item->customer->nama}}</td>
                  <td>{{ $item->tgl_transaksi }}</td>
                  <td>{{ $item->harga->jenis }}</td>
                  <td>
                    @if ($item->status_order == 'Selesai')
                    <span class="badge badge-primary">Selesai</span>
                    @elseif($item->status_order == 'Clear')
                        <span class="badge badge-success">Sudah Diambil</span>
                    @elseif($item->status_order == 'Proses')
                        <span class="badge badge-secondary">Sedang Proses</span>
                    @endif
                  </td>
                  <td>{{ Rupiah($item->total) }}</td>
                  
                </tr>
               
                  @endforeach

              
            </tbody>
            
        </table>
    </div>
</body>
</html>