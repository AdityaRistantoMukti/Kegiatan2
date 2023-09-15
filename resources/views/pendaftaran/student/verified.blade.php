@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    Data yang Terverifikasi
                </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-3">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Kegiatan</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Tanggal Daftar</th>   
                                        <th>Status</th>   
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($Cverified == 0)
                                        <tr>
                                            <td>
                                                <td>
                                                    <td colspan="8">Data anda belum ada yang terverifikasi !</td>
                                                </td>
                                            </td>
                                        </tr>
                                    @else
                                    @foreach ($verifieds as $verif)
                                    <tr>
                                        <td>{{$verif->activity->kode_activity}}</td>
                                        <td>{{$verif->user->students->first()->nisn}}</td>
                                        <td>{{$verif->user->name}}</td>
                                        <td>{{$verif->created_at->diffForHumans()}}</td>
                                        <td>
                                            <span class="badge bg-secondary text-white">
                                                {{$verif->status}}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach  
                                    @endif
                                   
                                </tbody>
                            </table>
                            {{$verifieds->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection