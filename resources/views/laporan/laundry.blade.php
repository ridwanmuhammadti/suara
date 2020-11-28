@extends('backend.master')
@section('judul')
   Laporan
@endsection

@section('content')
<div class="row">

    <div class="col-lg-4">
        <div class="card gradient-bottom">
          <div class="card-header">
            <h4>Laporan</h4>
            <div class="card-header-action dropdown">
              <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle" aria-expanded="false">Transaksi</a>
              <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(75px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
               
                <li><a href="/laundry/cetak/" class="dropdown-item" target="_blank">Semua Data</a></li>
                <li><a href="/laundry/cetak/?status_order=Proses" class="dropdown-item" target="_blank">Sedang Proses</a></li>
                <li><a href="/laundry/cetak/?status_order=Selesai" class="dropdown-item" target="_blank">Selesai</a></li>
                <li><a href="/laundry/cetak/?status_order=Diambil" class="dropdown-item" target="_blank">Diambil</a></li>
              </ul>
            </div>
          </div>
          <div class="card-body" id="top-5-scroll" tabindex="2" style="height: 315px; overflow: hidden; outline: none;">
            <ul class="list-unstyled list-unstyled-border">
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{ asset('/images/assets/laundry.png') }}" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">{{ $masuk }} laundry</div></div>
                  <div class="media-title">Semua Data</div>
                  <div class="mt-1">
                    {{-- <div class="budget-price">
                      <div class="budget-price-square bg-primary" data-width="64%" style="width: 64%;"></div>
                      <div class="budget-price-label">$68,714</div>
                    </div>
                    <div class="budget-price">
                      <div class="budget-price-square bg-danger" data-width="43%" style="width: 43%;"></div>
                      <div class="budget-price-label">$38,700</div>
                    </div> --}}
                    <div>
                        <a href="/laundry/cetak" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i></i></a>
        
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{ asset('/images/assets/proses.png') }}" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">{{ $sp }} Laundry</div></div>
                  <div class="media-title">Sedang Proses</div>
                  <div>
                    <a href="/laundry/cetak/?status_order=Proses" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i></i></a>
    
                </div>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{ asset('/images/assets/selesai.png') }}" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">{{ $selesai }} Laundry</div></div>
                  <div class="media-title">Selesai</div>
                  <div>
                    <a href="/laundry/cetak/?status_order=Selesai" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i></i></a>
    
                </div>
                </div>
              </li>
              <li class="media">
                <img class="mr-3 rounded" width="55" src="{{ asset('/images/assets/diambil.png') }}" alt="product">
                <div class="media-body">
                  <div class="float-right"><div class="font-weight-600 text-muted text-small">{{ $diambil }} Laundry</div></div>
                  <div class="media-title">Diambil</div>
                  <div>
                    <a href="/laundry/cetak/?status_order=Diambil" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i></i></a>
    
                </div>
                </div>
              </li>
           
            </ul>
          </div>
          <div class="card-footer pt-3 d-flex justify-content-center">
            <div class="budget-price justify-content-center">
              <div class="budget-price-square bg-primary" data-width="20" style="width: 20px;"></div>
              <div class="budget-price-label">Data Laundry</div>
            </div>
            {{-- <div class="budget-price justify-content-center">
              <div class="budget-price-square bg-danger" data-width="20" style="width: 20px;"></div>
              <div class="budget-price-label">Budget Price</div>
            </div> --}}
          </div>
        </div>
      </div>

      <div class="col-lg-8">
       <div class="card">
              <div class="card-header centered" style="text-align: center">
                    <h4 >Cetak Filter Waktu Transaksi Laundry</h4>
              </div>
              <div class="card-body">
                <form action="/cetak/laundry/filterwaktu" method="POST" enctype="multipart/form-data" target="_blank">
                  @csrf
                  <div class="row">
                    <div class="form-group col-md-6 ">
                     
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control datepicker"  data-language='en'  name="tanggal_mulai">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control datepicker"  data-language='en'  name="tanggal_akhir">
                      </div>
                    </div>
                  </div>

                  <div class="row justify-content-center">
                  <div class="custom-control custom-checkbox ">
                    <input type="checkbox" class="custom-control-input" id="proses" name="proses" value="Proses">
                    <label class="custom-control-label" for="proses">Sedang Proses</label>
                  </div>
                  <div class="custom-control custom-checkbox  ml-5">
                    <input type="checkbox" class="custom-control-input" id="selesai" name="selesai" value="Selesai">
                    <label class="custom-control-label" for="selesai">Selesai</label>
                  </div>
                  <div class="custom-control custom-checkbox  ml-5">
                    <input type="checkbox" class="custom-control-input" id="diambil" name="diambil" value="Clear">
                    <label class="custom-control-label" for="diambil">Diambil</label>
                  </div>
                </div>
                  <div style="text-align: center">
                      <button type="submit" class="btn btn-success ml-3 mt-3"><i class="fa fa-print"></i>
                          Cetak Laporan</button>
                        </div>
                </form>
              </div>
         
            </div>
       <div class="card">
              <div class="card-header centered" style="text-align: center">
                    <h4 >Cetak Customer</h4>
              </div>
              <div class="card-body">
                <form action="/cetak/customer" method="POST" enctype="multipart/form-data" target="_blank">
                  @csrf
               

                  <div class="row justify-content-center">

                    @foreach ($user as $item)
                     
                  <div class="custom-control custom-checkbox ml-3">
                    <input type="checkbox" class="custom-control-input" id="{{ $item->nama_cabang }}" name="id[]" value="{{ $item->id }}">
                    <label class="custom-control-label" for="{{ $item->nama_cabang }}">{{ $item->nama_cabang }}</label>
                  </div>
                   
                  @endforeach
                </div>
                  <div style="text-align: center">
                      <button type="submit" class="btn btn-primary ml-3 mt-3"><i class="fa fa-print"></i>
                          Cetak Cabang</button>
                        </div>
                </form>
              </div>
         
            </div>

      </div>
  </div>

  <div class="row">
      
    <div class="col-lg-4">
      <div class="card gradient-bottom">
        <div class="card-header">
          <h4>Laporan Tahun</h4>
          <div class="card-header-action dropdown">
            <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle" aria-expanded="false">Transaksi</a>
            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(75px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
             
              {{-- <li><a href="/laundry/cetak/tahun" class="dropdown-item" target="_blank">Semua Tahun</a></li> --}}
              <li><a href="/laundry/cetak/tahun/2019" class="dropdown-item" target="_blank">2019</a></li>
              <li><a href="/laundry/cetak/tahun/2020" class="dropdown-item" target="_blank">2020</a></li>
              <li><a href="/laundry/cetak/tahun/2021" class="dropdown-item" target="_blank">2021</a></li>
            </ul>
          </div>
        </div>
        <div class="card-body" id="top-5-scroll" tabindex="2" style="height: 315px; overflow: hidden; outline: none;">
          <ul class="list-unstyled list-unstyled-border">
            <li class="media">
              <img class="mr-3 rounded" width="55" src="{{ asset('/images/assets/laundry.png') }}" alt="product">
              <div class="media-body">
                <div class="float-right"><div class="font-weight-600 text-muted text-small">{{ $masuk }} laundry</div></div>
                <div class="media-title">Semua Data</div>
                <div class="mt-1">
                  {{-- <div class="budget-price">
                    <div class="budget-price-square bg-primary" data-width="64%" style="width: 64%;"></div>
                    <div class="budget-price-label">$68,714</div>
                  </div>
                  <div class="budget-price">
                    <div class="budget-price-square bg-danger" data-width="43%" style="width: 43%;"></div>
                    <div class="budget-price-label">$38,700</div>
                  </div> --}}
                  <div>
                      <a href="/laundry/cetak" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i></i></a>
      
                  </div>
                </div>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded" width="55" src="{{ asset('/images/assets/proses.png') }}" alt="product">
              <div class="media-body">
                <div class="float-right"><div class="font-weight-600 text-muted text-small">{{ $sp }} Laundry</div></div>
                <div class="media-title">Sedang Proses</div>
                <div>
                  <a href="/laundry/cetak/?status_order=Proses" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i></i></a>
  
              </div>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded" width="55" src="{{ asset('/images/assets/selesai.png') }}" alt="product">
              <div class="media-body">
                <div class="float-right"><div class="font-weight-600 text-muted text-small">{{ $selesai }} Laundry</div></div>
                <div class="media-title">Selesai</div>
                <div>
                  <a href="/laundry/cetak/?status_order=Selesai" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i></i></a>
  
              </div>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded" width="55" src="{{ asset('/images/assets/diambil.png') }}" alt="product">
              <div class="media-body">
                <div class="float-right"><div class="font-weight-600 text-muted text-small">{{ $diambil }} Laundry</div></div>
                <div class="media-title">Diambil</div>
                <div>
                  <a href="/laundry/cetak/?status_order=Diambil" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-print"></i></i></a>
  
              </div>
              </div>
            </li>
         
          </ul>
        </div>
        <div class="card-footer pt-3 d-flex justify-content-center">
          <div class="budget-price justify-content-center">
            <div class="budget-price-square bg-primary" data-width="20" style="width: 20px;"></div>
            <div class="budget-price-label">Data Laundry</div>
          </div>
          {{-- <div class="budget-price justify-content-center">
            <div class="budget-price-square bg-danger" data-width="20" style="width: 20px;"></div>
            <div class="budget-price-label">Budget Price</div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection