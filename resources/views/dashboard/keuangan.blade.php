@extends('backend.master')
@section('judul')
   Dashboard
@endsection

@section('content')

<div class="row">
  <div class="card">
  <div class="card-body">
<div class="row">
  <div class="col-12 col-md-4 col-lg-4">
    <div class="pricing pricing-highlight">
      <div class="pricing-title">
        Total Pemasukan Laundry Hari ini
      </div>
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>{{ Rupiah($day) }}</div>
          <div></div>
        </div>
        <div class="pricing-details">
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $days->isoFormat('dddd') }}</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $pemasukanhari->count() }} Transaksi</div>
          </div>
      
        </div>
      </div>
      <div class="pricing-cta">
        <a href="/dashboard/keuangan/hari">View All <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 col-lg-4">
    <div class="pricing pricing-highlight">
      <div class="pricing-title">
        Total Pemasukan Laundry Bulan ini
      </div>
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>{{ Rupiah($bulan) }}</div>
          <div></div>
        </div>
        <div class="pricing-details">
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $days->isoFormat('MMMM') }}</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $pemasukanbulan->count() }} Transaksi</div>
          </div>
      
        </div>
      </div>
      <div class="pricing-cta">
        <a href="/dashboard/keuangan/bulan">View All <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 col-lg-4">
    <div class="pricing pricing-highlight">
      <div class="pricing-title">
        Total Pemasukan Laundry Tahun ini
      </div>
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>{{ Rupiah($tahun) }}</div>
          <div></div>
        </div>
        <div class="pricing-details">
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $days->isoFormat('YYYY') }}</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $pemasukantahun->count() }} Transaksi</div>
          </div>
        
        </div>
      </div>
      <div class="pricing-cta">
        <a href="/dashboard/keuangan/tahun">View All <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</div>
  </div>
  </div>

  <div class="card">
    <div class="card-body">
<div class="row">
  <div class="col-12 col-md-12">
  <div id="chartPemasukan" style="height: 400px; width: 1020px"></div>
  </div>
</div>
</div>
</div>
  <div class="card">
    <div class="card-body">
<div class="row">
  <div class="col-12 col-md-12">
  <div id="chartPemasukanBulan" style="height: 400px; width: 1020px"></div>
  </div>
</div>
</div>
</div>
@if (auth()->user()->role == 'admin')
    
  {{-- <div class="card">
  <div class="card-body">

    <div class="row">
      <div class="col-12 col-md-6">
    <h1>{{ $chart1->options['chart_title'] }}</h1>
    {!! $chart1->renderHtml() !!}
  </div>
  <div class="col-12 col-md-6">
    <h1>{{ $chart2->options['chart_title'] }}</h1>
    {!! $chart2->renderHtml() !!}
  </div>
  </div>
</div>
</div> --}}

@endif
@endsection

@section('script')

  {!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
{!! $chart2->renderJs() !!}
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
 Highcharts.chart('chartPemasukan', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Pemasukan Harian'
    },
    subtitle: {
        text: 'Laundry'
    },
    xAxis: {
        categories:{!! json_encode($hari) !!}
    },
    yAxis: {
        title: {
            text: 'Total '
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Pemasukan',
        data: {!! json_encode($total) !!}
    },]
});
</script>


<script>
  Highcharts.chart('chartPemasukanBulan', {
     chart: {
         type: 'line'
     },
     title: {
         text: 'Pemasukan Bulanan'
     },
     subtitle: {
         text: 'Laundry'
     },
     xAxis: {
         categories:{!! json_encode($bulanchart) !!}
     },
     yAxis: {
         title: {
             text: 'Total '
         }
     },
     plotOptions: {
         line: {
             dataLabels: {
                 enabled: true
             },
             enableMouseTracking: false
         }
     },
     series: [{
         name: '2020',
         data: {!! json_encode($totalbulan) !!}
     },]
 });
 </script>
@endsection