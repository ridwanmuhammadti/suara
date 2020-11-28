<?php

namespace App\Exports;

use App\Suara;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;



class SuaraExport  implements FromCollection, WithMapping, WithHeadings,  WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */

   
    public function collection()
    {
        // dd(Suara::all());
        return Suara::all();
    }

    public function map($suara): array
    {
        return [
            $suara->nama,
            $suara->no_ktp.' ',
            $suara->alamat,
            $suara->rt ,
            $suara->rw ,
            $suara->kelurahan ,
            $suara->no_tps ,
            $suara->no_telpon,
            $suara->ket ,
            $suara->koordinator ,
            $suara->tim_pendata ,
            Date::dateTimeToExcel($suara->tgl_terima),
            
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Nomor KTP',
            'Alamat',
            'RT',
            'RW',
            'Kelurahan',
            'No TPS',
            'No Telpon',
            'KET',
            'Koordinator',
            'Tim Pendata',
            'Tanggal Terima Data',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'L' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
