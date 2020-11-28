<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laundry Anda Banjarbaru</title>
</head>
<body>
    <p>Halo, {{$name}} </p>
    <p>Kami ingin memberitahu, bahwa gaji anda telah kami transfer</b>. Gaji pada tanggal <b>{{Carbon\carbon::parse($tgl_awal)->format('d-m-Y')}} sampai {{Carbon\carbon::parse($tgl_akhir)->format('d-m-Y')}}  </b>.</p> 
    <p>kehadiran : {{ Rupiah($absen) }}</b></p>
    <br>
    <p>Uang Makan : {{ Rupiah($makan) }}</b></p>
    <br>
    <p>Transport : {{ Rupiah($transport) }}</b></p>
    <br>
    <p>Lembur : {{ Rupiah($lembur) }}</b></p>
    <br>
    <p>Bonus : {{ Rupiah($bonus) }}</b></p>
    <br>
    <p>Total Gaji : {{ Rupiah($total) }}</b></p>
    <br>
    
    <p>Terima kasih,</p>
    <p>Laundry Anda Banjarbaru</p>
</body>
</html>