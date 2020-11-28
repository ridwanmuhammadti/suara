<?php

use Carbon\Carbon;
use Carbon\CarbonPeriod;

function Rupiah($amount = 0) {
    return  "Rp " . number_format(intval($amount),0, '', '.');
}


function Bulan($month) {
    $date = Carbon::createFromFormat('m', $month);
    $awal = $date->startOfMonth()->toDateString();
    $akhir = $date->endtOfMonth()->toDateString();
    $hari2 = [];

    foreach(CarbonPeriod::create($awal, $akhir) as $item){
        $hari2 = $item;
    }

    return $hari2;
}