@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3" style="margin-top: -70px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route('verifikasi-pendaftaran.index')}}" class="btn btn-outline-info">Pending</a>
                        <a href="{{route('verifikasi-pendaftaran.ulang')}}" class="btn btn-outline-secondary ml-2">Daftar Ulang</a>
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
                               <th>TGL Daftar</th>
                               <th>Status</th>
                               <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($registers as $peserta)
                               <tr>
                                   <td>{{$peserta->activity->kode_activity}}</td>
                                   <td>{{$peserta->user->students->first()->nisn}}</td>
                                   <td>{{$peserta->user->name}}</td>
                                   <td>{{$peserta->created_at->diffForHumans()}}</td>
                                   <td>
                                       <span class="badge badge-info">
                                           {{$peserta->status}}
                                       </span>
                                   </td>

                                   <td>
                                       <a href="{{route('cetak.sertifikat', $peserta->id)}}" class="btn btn-info btn-sm">Cetak Sertifikat</a>
                                   </td>
                               </tr>
                           @empty
                               <td>
                                    <td>
                                    <td colspan="8">Data kosong !</td>    
                                    </td>
                                </td>
                           @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection