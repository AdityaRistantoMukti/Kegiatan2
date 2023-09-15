@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    Data yang belum terverifikasi / Pending
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
                                        <th>Action</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Tanggal Daftar</th>   
                                        <th>Status</th>   
                                    </tr>
                                </thead>

                                <tbody>                                                             
                                    @if ($Cpending == 0) 
                                    <tr>
                                        <td>
                                            <td>
                                                <td colspan="8"> Anda belum mendaftar apapun !</td>    
                                            </td>
                                        </td>
                                    </tr>                                                                                                                   
                                     @else 
                                     @foreach ($pendings as $pend)
                                    <tr>
                                        <td>
                                            <a href="{{route('upload-pembayaran', $pend->id)}}" class="btn btn-outline-info btn-sm">
                                                Verifikasi Pembayaran
                                            </a>
                                        </td>
                                        <td>{{$pend->user->students->first()->nisn}}</td>
                                        <td>{{$pend->user->name}}</td>
                                        <td>{{$pend->created_at->diffForHumans()}}</td>
                                        <td>
                                            <span class="badge bg-secondary text-white">
                                                {{$pend->status}}
                                            </span>
                                        </td>
                                     </tr>
                                     @endforeach
                                     @endif
                                   
                                </tbody>
                            </table>
                            {{$pendings->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection