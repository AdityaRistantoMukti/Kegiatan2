@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3" style="margin-top: -70px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route('verifikasi-pendaftaran.ulang')}}" class="btn btn-outline-info">Daftar Ulang</a>
                        <a href="{{route('verifikasi-pendaftaran.peserta')}}" class="btn btn-outline-secondary ml-2">Peserta</a>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <input type="date" name="" id="" class="form-control">
                        </div>
                        <div class="col-md-5">
                            <input type="date" name="" id="" class="form-control">
                        </div>

                        <div class="ml-3">
                            <button type="submit" class="btn btn-primary">Cari Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               <th>Kode Kegiatan</th>
                               <th>NISN</th>
                               <th>Nama</th>
                               <th>Tgl Daftar</th>
                               <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pendings as $pending)
                            <tr>
                              <td>{{$pending->activity->kode_activity}}</td>
                              <td>{{$pending->user->students->first()->nisn ?? 'Belum Tersedia'}}</td>
                              <td>{{$pending->user->name}}</td>
                              <td>{{$pending->created_at->diffForHumans()}}</td>
                              <td>
                                  <span class="badge bg-secondary text-white">
                                      {{$pending->status}}
                                  </span>
                                </td>
                            </tr>
                            @empty 
                            <tr>
                                <td>
                                    <td colspan="8">Data Kosong</td>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$pendings->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection