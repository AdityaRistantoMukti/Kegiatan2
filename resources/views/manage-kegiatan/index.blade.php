@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3" style="margin-top: -70px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{route('manage-kegiatan.create')}}" class="btn btn-outline-primary">Tambah Kegiatan</a>
                            <a href="{{route('cetak.semua-data')}}" class="btn btn-outline-secondary ml-3">Cetak Semua Data</a>
                        </div>

                        <form action="{{route('cetak.data')}}" method="get">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="date" name="mulai"class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="date" name="selesai" class="form-control">
                                    </div> 
                                </div>
                                <div class="ml-3">
                                    <button type="submit" class="btn btn-info">Cari Data</button>
                                </div>
                            </div>
                        </form>
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
                                <th>Nama Kegiatan</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($kegiatan as $it)
                            <tr>
                                <td>{{$it->kode_activity}}</td>
                                <td>{{$it->nama_activity}}</td>
                                <td>{{$it->idr}}</td>
                                <td>{{$it->status}}</td>
                                <td>{{$it->created_at->format('Y-m-d')}}</td>

                                <td>
                                    <form action="{{ route('manage-kegiatan.destroy', $it->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('manage-kegiatan.edit', $it->id)}}" class="btn btn-primary btn-sm">Edit</a>      
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection