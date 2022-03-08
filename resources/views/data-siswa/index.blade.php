@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3" style="margin-top: -70px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route('data-siswa.create')}}" class="btn btn-outline-primary">Tambah Siswa</a>
                    </div>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="" id="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="" id="">
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
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->students->first()->nisn ?? 'Belum Tersedia'}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->students->first()->class ?? 'Belum Tersedia'}}</td>
                                <td>{{$user->students->first()->major ?? 'Belum Tersedia'}}</td>
                                <td>{{$user->students->first()->status ?? 'Belum Tersedia'}}</td>
                                {{-- Option --}}
                                <td>
                                    <form action="{{route('data-siswa.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('data-siswa.edit', $user->id)}}" class="btn btn-primary btn-sm">Edit</a>
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