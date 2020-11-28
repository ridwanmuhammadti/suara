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
                <th>Invoice</th>
                <th>Nama</th>
                <th>Tanggal Transaksi</th>
                <th>Jenis Laundry</th>
                <th>Harga</th>
                <th>Tahun</th>
                </tr>
               
            </thead>
            <tbody>
              
                @foreach ($tahun as $item)
                    <tr>
                <td>{{ $item->invoice }}</td>
                  <td>{{ $item->customer->nama}}</td>
                  <td>{{ $item->tgl_transaksi }}</td>
                  <td>{{ $item->harga->jenis }}</td>
                  <td>{{ Rupiah($item->total) }}</td>
                  <td colspan="3" style="text-align: center"><b>Pada Tahun {{ $item->updated_at->isoFormat('YYYY') }} </b></td>
                  
                </tr>
               
                  @endforeach

           
            </tbody>
            
        </table>
    </div>
</body>
</html>