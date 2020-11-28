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
            /* border:0px solid #333; */
            border-collapse:collapse;
            margin:0 auto;
            width:100%;
        }
        td, tr, th{
            padding:12px;
            /* border:1px solid #333; */
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


        <h2 style="text-align: center">SLIP GAJI LAUNDRY ANDA</h2>
        <hr>
        <table style=" text-align: left">
           
                <tr>
                    <th>Nama : {{ $gaji->user->name }}</th>
                   
                </tr>

                <tr>
                    <th colspan="1">Jabatan : {{ $gaji->user->role }}</th>
                </tr>

                <tr>
                    
                    <th>Periode : {{ $gaji->tgl_awal }} - {{ $gaji->tgl_akhir }}</th>
                </tr>
    
         
        </table>

        <hr>

        <table>
            <tr>
              
                <td colspan="1">
                    Sistem Pembayaran : Transfer
                </td>
                <td colspan="5"></td>
                <td>Gaji Pokok : </td>
                <td>{{ Rupiah($gaji->absen) }}</td>
            
            </tr>

            <tr>
               
                <td></td>
                <td colspan="5"></td>
                <td style="margin-right: auto">Uang Makan : </td>
              <td>{{ Rupiah($gaji->uang_makan) }}</td>
            </tr>
            <tr>
                <td></td>
               
                <td colspan="5"></td>
              
                <td>Uang Transport : </td>
              <td>{{ Rupiah($gaji->uang_transport) }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="5"></td>
              
                <td>Uang Lembur : </td>
                <td>{{ Rupiah($gaji->uang_lembur) }}</td>
              
            </tr>
            <tr>
               <td></td>
                <td colspan="5"></td>
                <td>Bonus Tambahan : </td>
                <td>{{ Rupiah($gaji->bonus) }}</td>
            
            </tr>
          
        </table>
      
     <hr>
     
     <table>
          
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
             <td><b> Total : </b></td>
           <td><strong> {{ Rupiah($gaji->total) }} </strong></td>
         </tr>

       
     </table>
     
     <hr>
     
    </div>
</body>
</html>