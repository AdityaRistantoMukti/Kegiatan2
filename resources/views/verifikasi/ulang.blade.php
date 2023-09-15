@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3" style="margin-top: -70px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route('verifikasi-pendaftaran.index')}}" class="btn btn-outline-info">Pending</a>
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
                               <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($verifikasi as $verif)
                            <tr>
                              <td>{{$verif->activity->kode_activity}}</td>
                              <td>{{$verif->user->students->first()->nisn ?? 'Belum Tersedia'}}</td>
                              <td>{{$verif->user->name}}</td>
                              <td>{{$verif->created_at->diffForHumans()}}</td>
                              <td>
                                  <span class="badge bg-info text-white">
                                      {{$verif->status}}
                                  </span>
                                </td>

                                <td>
                                    <form action="{{route('verifikasi-pendaftaran.update', $verif->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-info btn-sm">Tambah Peserta</button>
                                    </form>
                                </td>
                            </tr>
                            @empty 
                            <tr>
                                <td>
                                    <td>
                                    <td colspan="8">Data kosong !</td>    
                                    </td>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection