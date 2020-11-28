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
                <th colspan="2" style="width: 75%">KARYAWAN</th>
                </tr>
               
            </thead>
            <tbody>
              
               <tr>
                    <td style="width:20px">
                        @if (!$data->gambar)
                        @php $image = '/images/default.png' @endphp
                        <img src="{{ public_path() . $image }}" alt="" style="width: 150px" srcset=""></td>
                       
                        @else
                        @php $image = '/images/'.$data->gambar @endphp
                        <img src="{{ public_path() . $image }}" alt="" style="width: 150px" srcset=""></td>
                        @endif
                
                    </td>
                    <td>
                      <ul>
                        <li>
                            Cabang :  {{ $data->nama_cabang }}
                           
                        </li>      
                        <li>
                            Alamat :  {{ $data->alamat_cabang }}
                           
                        </li>      
                        <li>
                            Email :  {{ $data->email }}
                           
                        </li>      
                        <li>
                            No. Telp :  {{ $data->no_telp }}
                           
                        </li>      
                    
                    </ul>
                    </td>
               </tr>

               <tr>
                   <th colspan="2" style="width: 75%">LAUNDRY ANDA</th>
               </tr>
           
            </tbody>
            
        </table>
    </div>
 
    
</body>
</html>