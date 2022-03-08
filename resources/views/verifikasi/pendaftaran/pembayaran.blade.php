@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            Silahkan masukan bukti pembayaran anda.
                        </div>

                        <form action="{{route('upload-pembayaran.store', $pembayaran->id)}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="register_id" class="form-control" value="{{$pembayaran->id}}">
                                        <input type="text" class="form-control" value="{{$pembayaran->activity->kode_activity}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" name="image" id="" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control">

                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection