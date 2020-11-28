<?php

namespace App\Http\Controllers;

use PDF;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Customer;
use App\Transaksi;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        if(auth()->user()->role == 'admin'){

            $customers = Customer::all()->count();
            $masuk = Transaksi::whereIN('status_order',['Proses','Selesai','Clear'])->count();
            $selesai = Transaksi::where('status_order','Selesai')->count();
            $diambil = Transaksi::where('status_order','Clear')->count();
            $proses = Transaksi::whereIN('status_order',['Proses','Selesai'])->get();
           
        return view('dashboard.index',compact('proses','customers','masuk','selesai','diambil'));
        } else {
            $customers = Customer::orderBy('id','DESC')->where('user_id',Auth::user()->id)->get()->count();
            $masuk = Transaksi::whereIN('status_order',['Proses','Selesai','Clear'])->where('user_id',Auth::user()->id)->get()->count();
            $selesai = Transaksi::where('status_order','Selesai')->where('user_id',Auth::user()->id)->get()->count();
            $diambil = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id)->get()->count();

            $proses = Transaksi::whereIN('status_order',['Proses','Selesai'])->where('user_id',Auth::user()->id)->get();
        return view('dashboard.index',compact('proses','customers','masuk','selesai','diambil'));
        }
    }

    public function keuangan(){

        if(auth()->user()->role == 'admin'){

            // harian
            $days = Carbon::now()->locale('id');
            // dd($days);
            $pemasukanhari = Transaksi::where('status_order','Clear') ->whereDate('updated_at', '=', $days)->get();
            // dd($pemasukanhari);
            $day = $pemasukanhari->sum('total');

            // bulanan
            $pemasukanbulan = Transaksi::where('status_order','Clear') ->whereMonth('updated_at', '=', $days)->get();
            // dd($pemasukanbulan);
            $bulan = $pemasukanbulan->sum('total');

            // tahunan
            $pemasukantahun = Transaksi::where('status_order','Clear') ->whereYear('updated_at', '=', $days)->get();
            // dd($pemasukantahun);
            $tahun = $pemasukantahun->sum('total');


            // $chart = Transaksi::where(DB::raw("(DATE_FORMAT(updated_at,'%Y'))"),date('Y'))
            //         ->get();
            // dd($chart);

            // $chart_options = [
            //     'chart_title' => 'Users by months',
            //     'report_type' => 'group_by_date',
            //     'model' => 'App\Transaksi',
            //     'group_by_field' => 'updated_at',
            //     'group_by_period' => 'month',
            //     'chart_type' => 'bar',
            // ];

       

            
            
            $chart_options = [
                'chart_title' => 'Laporan Pemasukan Perhari',
                'report_type' => 'group_by_date',
                'model' => 'App\Transaksi',
                'group_by_field' => 'updated_at',
                'group_by_period' => 'day',
                'aggregate_function' => 'sum',
                'aggregate_field' => 'total',
                'chart_type' => 'line',
                // 'filter_field' => 'updated_at',
                // 'filter_days' => 30, // show only transactions for last 30 days
                // 'filter_period' => 'week', // show only transactions for this week
            ];
            
        
            $chart1 = new LaravelChart($chart_options);

            $chart_options = [
                'chart_title' => 'Laporan Pemasukan Perbulan',
                'report_type' => 'group_by_date',
                'model' => 'App\Transaksi',
                'group_by_field' => 'updated_at',
                'group_by_period' => 'month',
                'aggregate_function' => 'sum',
                'aggregate_field' => 'total',
                'chart_type' => 'line',
                // 'filter_field' => 'updated_at',
                // 'filter_days' => 30, // show only transactions for last 30 days
                // 'filter_period' => 'week', // show only transactions for this week
            ];
            
        
            $chart2 = new LaravelChart($chart_options);

          
            $transaksi = Transaksi::selectRaw('year(updated_at) year, monthname(updated_at) month, sum(total) total')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->get();

            // dd($transaksi);
       
            $yearschart = [];
            $bulanchart = [];
            $totalbulan = [];
            foreach($transaksi as $trans){
                $bulanchart[] = $trans->month;
                $totalbulan[] = $trans->total;
                $yearschart[] = $trans->year;
            }
           

            $data=Transaksi::
            select(DB::raw('sum(total) as total'),DB::raw('date(updated_at) as dates'))
            ->groupBy('dates')
            ->orderBy('dates','asc')
            ->get();

            $hari = [];
            $total = [];
            foreach($data as $trans){
                $hari[] = date('d M Y', strtotime($trans->dates));
                $total[] = $trans->total;
            }
    

            return view('dashboard.keuangan',compact('pemasukanhari','pemasukanbulan','pemasukantahun','days','day','bulan','tahun','chart1','chart2','hari','total','yearschart','bulanchart','totalbulan'));
        } else {
            $days = Carbon::now()->locale('id');
            $pemasukanhari = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereDate('updated_at', '=', $days)->get();
            $day = $pemasukanhari->sum('total');
            $pemasukanbulan = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereMonth('updated_at', '=', $days)->get();
            $bulan = $pemasukanbulan->sum('total');
            $pemasukantahun = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereYear('updated_at', '=', $days)->get();
            $tahun = $pemasukantahun->sum('total');
        
            $chart_options = [
                'chart_title' => 'Laporan Pemasukan Perhari',
                'report_type' => 'group_by_date',
                'model' => 'App\Transaksi',
                'group_by_field' => 'updated_at',
                'group_by_period' => 'day',
                'aggregate_function' => 'sum',
                'aggregate_field' => 'total',
                'chart_type' => 'line',
                // 'filter_field' => 'updated_at',
                // 'filter_days' => 30, // show only transactions for last 30 days
                // 'filter_period' => 'week', // show only transactions for this week
            ];
            
        
            $chart1 = new LaravelChart($chart_options);

            
            $chart_options = [
                'chart_title' => 'Laporan Pemasukan Perbulan',
                'report_type' => 'group_by_date',
                'model' => 'App\Transaksi',
                'group_by_field' => 'updated_at',
                'group_by_period' => 'month',
                'aggregate_function' => 'sum',
                'aggregate_field' => 'total',
                'chart_type' => 'line',
                // 'filter_field' => 'updated_at',
                // 'filter_days' => 30, // show only transactions for last 30 days
                // 'filter_period' => 'week', // show only transactions for this week
            ];
            
        
            $chart2 = new LaravelChart($chart_options);

            
            $transaksi = Transaksi::where('user_id',Auth::user()->id)->selectRaw('year(updated_at) year, monthname(updated_at) month, sum(total) total')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->get();
       
            $yearschart = [];
            $bulanchart = [];
            $totalbulan = [];
            foreach($transaksi as $trans){
                $bulanchart[] = $trans->month;
                $totalbulan[] = $trans->total;
                $yearschart[] = $trans->year;
            }
           

            $data=Transaksi::where('user_id',Auth::user()->id)->
            select(DB::raw('sum(total) as total'),DB::raw('date(updated_at) as dates'))
            ->groupBy('dates')
            ->orderBy('dates','asc')
           ->get();
           
       
                   $transaksi = Transaksi::all();
       
                   $hari = [];
                   $total = [];
                   foreach($data as $trans){
                       $hari[] = date('d M Y', strtotime($trans->dates));
                   }
                   
                   foreach($data as $trans){
                       $total[] = $trans->total;
                   }
            return view('dashboard.keuangan',compact('pemasukanhari','pemasukanbulan','pemasukantahun','days','day','bulan','tahun','chart1','chart2','hari','total','yearschart','totalbulan','bulanchart'));
        }
       
    }
    public function keuangantahun(){

        if(auth()->user()->role == 'admin'){

          
             $days = Carbon::now()->locale('id');
            $pemasukantahun = Transaksi::where('status_order','Clear') ->whereYear('updated_at', '=', $days)->get();
          
            return view('dashboard.keuangan.tahun',compact('days','pemasukantahun'));
        } else {
             $days = Carbon::now()->locale('id');
            $pemasukantahun = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereYear('updated_at', '=', $days)->get();
            $tahun = $pemasukantahun->sum('total');
        
            return view('dashboard.keuangan.tahun',compact('days','pemasukantahun'));
        }
       
    }
    public function keuanganhari(){

        if(auth()->user()->role == 'admin'){

            // harian
             $days = Carbon::now()->locale('id');
            $pemasukanhari = Transaksi::where('status_order','Clear') ->whereDate('updated_at', '=', $days)->get();
            // dd($pemasukanhari);
            $day = $pemasukanhari->sum('total');

            return view('dashboard.keuangan.hari',compact('days','pemasukanhari'));
        } else {
             $days = Carbon::now()->locale('id');
            $pemasukanhari = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereDate('updated_at', '=', $days)->get();
           
            return view('dashboard.keuangan.hari',compact('days','pemasukanhari'));
        }
       
    }
    public function keuanganbulan(){

        if(auth()->user()->role == 'admin'){

             $days = Carbon::now()->locale('id');
            $pemasukanbulan = Transaksi::where('status_order','Clear') ->whereMonth('updated_at', '=', $days)->get();

            return view('dashboard.keuangan.bulan',compact('days','pemasukanbulan'));
        } else {
             $days = Carbon::now()->locale('id');
            $pemasukanbulan = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereMonth('updated_at', '=', $days)->get();
           
            return view('dashboard.keuangan.bulan',compact('days','pemasukanbulan'));
        }
       
    }


    public function cetakhari(){
        if(auth()->user()->role == 'admin'){

            // harian
             $days = Carbon::now()->locale('id');
            $data = Transaksi::where('status_order','Clear') ->whereDate('updated_at', '=', $days)->get();
            // dd($data);
            $day = $data->sum('total');

             return PDF::loadview('laporan.cetak-hari',compact('days','data','day'))->setPaper('legal', 'landscape')->stream();
        } else {
             $days = Carbon::now()->locale('id');
            $data = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereDate('updated_at', '=', $days)->get();
            $day = $data->sum('total');
            return PDF::loadview('laporan.cetak-hari',compact('days','data','day'))->setPaper('legal', 'landscape')->stream();
        }
    }
    public function cetakbulan(){
        if(auth()->user()->role == 'admin'){

            // harian
             $days = Carbon::now()->locale('id');
            $data = Transaksi::where('status_order','Clear') ->whereMonth('updated_at', '=', $days)->get();
            // dd($data);
            $day = $data->sum('total');

             return PDF::loadview('laporan.cetak-bulan',compact('days','data','day'))->setPaper('legal', 'landscape')->stream();
        } else {
             $days = Carbon::now()->locale('id');
            $data = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereMonth('updated_at', '=', $days)->get();
            $day = $data->sum('total');
            return PDF::loadview('laporan.cetak-bulan',compact('days','data','day'))->setPaper('legal', 'landscape')->stream();
        }
    }
    public function cetaktahun(){
        if(auth()->user()->role == 'admin'){

            // harian
             $days = Carbon::now()->locale('id');
            $data = Transaksi::where('status_order','Clear') ->whereYear('updated_at', '=', $days)->get();
            // dd($data);
            $day = $data->sum('total');

             return PDF::loadview('laporan.cetak-tahun',compact('days','data','day'))->setPaper('legal', 'landscape')->stream();
        } else {
             $days = Carbon::now()->locale('id');
            $data = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereYear('updated_at', '=', $days)->get();
            $day = $data->sum('total');
            return PDF::loadview('laporan.cetak-tahun',compact('days','data','day'))->setPaper('legal', 'landscape')->stream();
        }
    }

}
