<?php

namespace App\Exports;


use Illuminate\Http\Request;

use App\Suara;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\Exportable;

class KelurahanSuaraExport implements  ShouldAutoSize,  FromCollection,  WithHeadings,  WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    protected $request;
   public function __construct($request)
   {
       $this->request = $request;
   }

    public function collection()
    {

        // $suaras = Suara::query('id',$this->request->id)->get();
        $suaras = Suara::query();
        // dd($suaras);

        if ($this->request->get('kelurahan')) {
            if ($this->request->get('kelurahan') == 'LoktabatUtara') {
                $suaras->where('kelurahan', 'LOKTABAT UTARA');
            }

            if ($this->request->get('kelurahan') == 'Komet') {
                $suaras->where('kelurahan', 'KOMET');
            }
            if ($this->request->get('kelurahan') == 'Mentaos') {
                $suaras->where('kelurahan', 'MENTAOS');
            }
           
            if ($this->request->get('kelurahan') == 'SungaiUlin') {
                $suaras->where('kelurahan', 'SUNGAI ULIN');
            }
            if ($this->request->get('kelurahan') == 'SeiBesar') {
                $suaras->where('kelurahan', 'SEI BESAR');
            }
            if ($this->request->get('kelurahan') == 'GuntungPaikat') {
                $suaras->where('kelurahan', 'GUNTUNG PAIKAT');
            }
            if ($this->request->get('kelurahan') == 'Kemuning') {
                $suaras->where('kelurahan', 'KEMUNING');
            }
            if ($this->request->get('kelurahan') == 'LoktabatSelatan') {
                $suaras->where('kelurahan', 'LOKTABAT SELATAN');
            }
            if ($this->request->get('kelurahan') == 'Cempaka') {
                $suaras->where('kelurahan', 'CEMPAKA');
            }
            if ($this->request->get('kelurahan') == 'SungaiTiung') {
                $suaras->where('kelurahan', 'SUNGAI TIUNG');
            }
            if ($this->request->get('kelurahan') == 'Bangkal') {
                $suaras->where('kelurahan', 'BANGKAL');
            }
            if ($this->request->get('kelurahan') == 'Palam') {
                $suaras->where('kelurahan', 'PALAM');
            }
            if ($this->request->get('kelurahan') == 'LandasanUlinTimur') {
                $suaras->where('kelurahan', 'LANDASAN ULIN TIMUR');
            }
            if ($this->request->get('kelurahan') == 'Syamsuddinoor') {
                $suaras->where('kelurahan', 'SYAMSUDDINOOR');
            }
            if ($this->request->get('kelurahan') == 'GuntungManggis') {
                $suaras->where('kelurahan', 'GUNTUNG MANGGIS');
            }
            if ($this->request->get('kelurahan') == 'GuntungPayung') {
                $suaras->where('kelurahan', 'GUNTUNG PAYUNG');
            }
            if ($this->request->get('kelurahan') == 'LandasanUlinBarat') {
                $suaras->where('kelurahan', 'LANDASAN ULIN BARAt');
            }
            if ($this->request->get('kelurahan') == 'LandasanUlinTengah') {
                $suaras->where('kelurahan', 'LANDASAN ULIN TENGAH');
            }
            if ($this->request->get('kelurahan') == 'LandasanUlinUtara') {
                $suaras->where('kelurahan', 'LANDASAN ULIN UTARA');
            }
            if ($this->request->get('kelurahan') == 'LandasanUlinSelatan') {
                $suaras->where('kelurahan', 'LANDASAN ULIN SELATAN');
            }
          
        }

        $tes = $suaras->get();

        // dd($tes);

        $output = [];

        foreach ($tes as $suara)
        {
          $output[] = [
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
        return collect($output);
    }

    // public function map($suara): array
    // {
    //     return [
    //         $suara->nama,
    //         $suara->no_ktp,
    //         $suara->alamat,
    //         $suara->rt ,
    //         $suara->rw ,
    //         $suara->kelurahan ,
    //         $suara->no_tps ,
    //         $suara->no_telpon,
    //         $suara->ket ,
    //         $suara->koordinator ,
    //         $suara->tim_pendata ,
    //         Date::dateTimeToExcel($suara->tgl_terima),
            
    //     ];
    // }

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
