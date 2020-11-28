<?php

namespace App\Imports;

use App\Suara;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SuaraImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
    public function collection(Collection $collection)
    {
        // dd($collection);
      foreach($collection as $key => $row){
          if($key >= 5){

            // dd(\Carbon\Carbon::createFromFormat('dmY',$row[12])->format('Y-m-d'));
            $tgl =  ($row[12] - 25569) * 86400;

            Suara::create([
                'nama' => $row[1],
                'no_ktp' => $row[2].'',
                'alamat' => $row[3],
                'rt' => $row[4],
                'rw' => $row[5],
                'kelurahan' => $row[6],
                'no_tps' => $row[7],
                'no_telpon' => $row[8],
                'ket' => $row[9],
                'koordinator' => $row[10],
                'tim_pendata' => $row[11],
                'tgl_terima' => gmdate('Y-m-d',$tgl),
                // 'tgl_terima' =>  $this->transformDate($row[12]),
                // 'tgl_terima' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[12]),
                
                
            ]);
              
          }
      }
    }
}
