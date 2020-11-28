<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auths.login');
});


Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware' => ['auth','CheckRole:admin']], function () {

    Route::get('/suara','SuaraController@index');
    Route::post('/suara/store','SuaraController@store');
    Route::get('/suara/{id}/edit','SuaraController@edit');
    Route::post('/suara/{id}/update','SuaraController@update');
    Route::get('/suara/{id}/destroy','SuaraController@destroy');
    Route::get('/laporan/suara','SuaraController@laporan');

    Route::get('/suara/export','SuaraController@export');
    Route::post('/cetak/kelurahan','SuaraController@exportkelurahan');
    
    Route::get('/suara/cetak','SuaraController@cetaksuara');
    Route::post('/suara/import','SuaraController@importexcel');


    Route::get('/karyawan','KaryawanController@index');
    Route::get('/karyawan/create','KaryawanController@create');
    Route::post('/karyawan/store','KaryawanController@store');
    Route::get('/karyawan/{id}/destroy','KaryawanController@destroy');

    Route::get('/penggajian','GajiController@index');
    Route::get('/gaji/{id}','GajiController@create');
    Route::get('/gaji/{id}/cetak','GajiController@cetak');
    Route::get('/gaji/{id}/show','GajiController@show');
    Route::post('/gaji/{id}/store','GajiController@store');

    Route::get('/harga','HargaController@index');
    Route::post('/harga/store','HargaController@store');
    Route::get('/harga/{id}/edit','HargaController@edit');
    Route::post('/harga/{id}/update','HargaController@update');
    Route::get('/harga/{id}/destroy','HargaController@destroy');


    Route::get('/laporan/laundry','LaporanController@indexlaundry');
    Route::get('/laundry/cetak','LaporanController@cetaklaundry');
    Route::post('/cetak/laundry/filterwaktu','LaporanController@cetakfilterlaundry');
    Route::post('/cetak/customer','LaporanController@cetakcustomer');

    
    Route::get('/laundry/cetak/tahun/2019','LaporanController@cetaktahun2019');
    Route::get('/laundry/cetak/tahun/2020','LaporanController@cetaktahun2020');
    Route::get('/laundry/cetak/tahun/2021','LaporanController@cetaktahun2021');

});


Route::group(['middleware' => ['auth','CheckRole:admin,karyawan']], function () {

    Route::get('/dashboard','DashboardController@index');
    Route::get('/dashboard/keuangan','DashboardController@keuangan');
    Route::get('/dashboard/keuangan/hari','DashboardController@keuanganhari');
    Route::get('/dashboard/keuangan/bulan','DashboardController@keuanganbulan');
    Route::get('/dashboard/keuangan/tahun','DashboardController@keuangantahun');

    Route::get('/keuangan/hari/cetak','DashboardController@cetakhari');
    Route::get('/keuangan/bulan/cetak','DashboardController@cetakbulan');
    Route::get('/keuangan/tahun/cetak','DashboardController@cetaktahun');

    // Route::get('/laporan','LaporanController@index');

    Route::get('/password/{id}/edit','AuthController@getpassword');
    Route::post('/password/{id}/update','AuthController@postpassword');
    
    Route::get('/karyawan/{id}/edit','KaryawanController@edit');
    Route::post('/karyawan/{id}/update','KaryawanController@update');
    Route::get('/cetak/{id}/kartu','KaryawanController@cetakkartu');

    Route::get('/profile/{id}','AuthController@profile');

    Route::get('/customer','CustomerController@index');
    Route::get('/customer/create','CustomerController@create');
    Route::post('/customer/store','CustomerController@store');
    Route::get('/customer/{id}/edit','CustomerController@edit');
    Route::post('/customer/{id}/update','CustomerController@update');
    Route::get('/customer/{id}/destroy','CustomerController@destroy');
    Route::get('/customer/{id}/show','CustomerController@show');

    Route::get('/transaksi','TransaksiController@index');
    Route::get('/transaksi/create','TransaksiController@create');
    Route::get('/transaksi/{id}/show','TransaksiController@show');
    Route::post('/transaksi/store','TransaksiController@store');

    Route::get('listharga','TransaksiController@listharga');
    Route::get('listhari','TransaksiController@listhari');
    Route::get('get-customer','TransaksiController@getcustomer');
    Route::get('get-email-customer','TransaksiController@getemailcustomer');


    Route::post('/transaksi/{id}/bayar/update','TransaksiController@updatebayar');
    Route::post('/transaksi/{id}/selesai/update','TransaksiController@updateselesai');
    Route::post('/transaksi/{id}/ambil/update','TransaksiController@updateambil');
    Route::get('/invoice/{id}','TransaksiController@invoice');
    Route::post('/invoice/filter','LaporanController@invoicefilter');


});