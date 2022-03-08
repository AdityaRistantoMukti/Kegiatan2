@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: -70px">
        @foreach ($kegiatans as $kegiatan)
            <div class="col-md-4 mb-3">
                <div class="card" style="border-radius: 10px">
                    <div class="card-body">
                        <h3>{{$kegiatan->nama_activity}}</h3>
                        <p class="text-muted">
                            {{str_limit(strip_tags($kegiatan->desc), 50)}}
                        </p>
                        <div class="">
                            @if (strlen(strip_tags($kegiatan->desc)) > 50)
                                <a href="" class="btn btn-info btn-sm">Read More</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row py-4">
        @foreach ($activitys as $ac)
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <img src="{{url('storage/'.$ac->image)}}" alt="" width="100px" class="rounded" height="100px">

                                <div class="ml-3">
                                    <h3 >{{$ac->nama_activity}}</h3>
                                    <p class="text-muted">
                                        {{str_limit(strip_tags($ac->desc), 100)}}
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <small class="text-info">Created, {{$ac->created_at->diffForHumans()}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <a href="{{route('cek-kegiatan.readmore', $ac->id)}}" class="btn btn-outline-info">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection