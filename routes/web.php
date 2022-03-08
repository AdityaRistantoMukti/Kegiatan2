<?php

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

// Group
Route::group(['prefix' => 'data-siswa'], function() {
    route::get('/index', 'DataSiswaController@index')->name('data-siswa.index');
    route::get('/create-siswa', 'DataSiswaController@create')->name('data-siswa.create');
    route::get('/edit-siswa/{user}', 'DataSiswaController@edit')->name('data-siswa.edit');
    route::post('/post-siswa', 'DataSiswaController@store')->name('data-siswa.store');
    route::patch('/update-siswa/{user}', 'DataSiswaController@update')->name('data-siswa.update');
    route::delete('/destroy/{user}', 'DataSiswaController@destroy')->name('data-siswa.destroy');
});

Route::group(['prefix' => 'manage-kegiatan'], function(){
    route::get('/index', 'ManageKegiatanController@index')->name('manage-kegiatan.index');
    route::get('/create', 'ManageKegiatanController@create')->name('manage-kegiatan.create');
    route::get('/edit/{id}', 'ManageKegiatanController@edit')->name('manage-kegiatan.edit');
    route::post('/store', 'ManageKegiatanController@store')->name('manage-kegiatan.store');
    route::patch('/update/{activity}', 'ManageKegiatanController@update')->name('manage-kegiatan.update');
    route::delete('/destroy/{activity}', 'ManageKegiatanController@destroy')->name('manage-kegiatan.destroy');
});

Route::group(['prefix' => 'verifikasi-pendaftaran'], function(){
    route::get('index', 'VerifikasiPendaftaranController@index')->name('verifikasi-pendaftaran.index');
    route::get('daftar-ulang', 'DaftarUlangController@index')->name('verifikasi-pendaftaran.ulang');
    route::get('peserta', 'PesertaController@index')->name('verifikasi-pendaftaran.peserta');
    route::patch('/update/{register}', 'DaftarUlangController@update')->name('verifikasi-pendaftaran.update');
});
Route::get('sertifikat/{register}','PesertaController@sertifikat')->name('cetak.sertifikat');

Route::group(['prefix' => 'cek-kegiatan'], function(){
    route::get('index', 'CekKegiatanController@index')->name('cek-kegiatan.index');
    route::get('/readmore/{user}', 'CekKegiatanController@readmore')->name('cek-kegiatan.readmore');
    route::post('/store', 'CekKegiatanController@store')->name('cek-kegiatan.store');
});

Route::group(['prefix' => 'kegiatan-ku'], function(){
    route::get('index', 'KegiatanKuController@index')->name('kegiatan-ku.index');
});

Route::group(['prefix' => 'user'], function(){
    route::get('upload-pembayaran/{register}', 'PaymentController@create')->name('upload-pembayaran');
    route::post('verifikasi-pembayaran/{register}', 'PaymentController@store')->name('upload-pembayaran.store');
});


Route::group(['prefix' => 'laporan'], function(){
    route::get('semua-data', 'Laporan\ActivityController@edit')->name('cetak.semua-data');
    route::get('laporan-data', 'Laporan\ActivityController@index')->name('cetak.data');
});

Route::group(['prefix' => 'pendaftaran'], function(){
    route::get('pending', 'Verifikasi\PendingController@index')->name('pendaftaran.pending');
    route::get('terverifikasi', 'Verifikasi\VerifiedController@index')->name('pendaftaran.verified');
});

// Solo
Route::get('kegiatan-ku', 'KegiatanKuController@index')->name('kegiatan-ku');
Route::get('/','WelcomeController@index')->name('/');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('resoult/{register}', 'Barcode\ResoultController@show')->name('resoult');