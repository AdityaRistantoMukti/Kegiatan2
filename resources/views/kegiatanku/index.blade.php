@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($myActivitys as $kegiatanku)
            <div class="col-md-8">
                <div class="card mb-5 border-0">
                    <div class="card-header border-0">
                        <img src="{{url('storage/'. $kegiatanku->activity->image)}}" class="card-img-top">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title">{{$kegiatanku->activity->nama_activity}}</h1>
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">{{$kegiatanku->activity->tgl_mulai}} - {{$kegiatanku->activity->tgl_selesai}}</h6>
                            <h6 class="card-title">{{number_format($kegiatanku->activity->idr)}}</h6>
                        </div>

                        <p>
                            {{$kegiatanku->activity->desc}}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection