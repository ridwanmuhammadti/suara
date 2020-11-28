<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laundry Anda Banjarbaru</title>
</head>
<body>
    <p>Halo, {{$customer->nama}} </p>
    <p>Terima Kasih sudah menggunakan layanan Laundry kami, berikut ini nomor <b>Inovice</b> kamu.</p>
    <p>Kamu bisa mengecek status pakaian setiap saat pada website kami.</p>
    <p>Nomor Invoice : <b>{{$invoice}}</b></p>
    <p>Customer : <b>{{$customer->nama}}</b> </p>
    <p>Tgl Transaksi : <b>{{Carbon\carbon::parse($tgl_transaksi)->format('d-m-Y')}}</b></p>
    <br><br><br>
    Laundry Anda Banjarbaru
</body>
</html>