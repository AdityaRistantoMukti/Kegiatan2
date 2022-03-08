<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Activity</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-white">
    <div class="content px-3">
        <div class="mb-3">
            <h3 class="text-info">Laporan Periode Activity</h3>
            <h5 class="text-muted">SMK AL-BAHRI</h5>
            <h5 class="text-muted">JL.Yon Armed No.07</h5>
        </div>

        <div class="mb-3">
            @if (request('mulai'))
                <small>Dari Tanggal {{request('mulai')}} sampai tanggal {{request('selesai')}}</small>
            @endif
        </div>

        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>IDR</th>
                    <th>Status</th>
                    <th>Desc</th>
                    <th>Peserta</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($activitys  as $ac)
                <tr>
                    <td>{{$ac->kode_activity}}</td>
                    <td>{{$ac->nama_activity}}</td>
                    <td>{{$ac->idr}}</td>
                    <td>{{$ac->status}}</td>
                    <td>{{$ac->desc}}</td>
                    <td>{{$ac->jumlah_peserta}}</td>
                    <td>{{$ac->tgl_mulai}} - {{$ac->tgl_selesai}}</td>
                </tr>       
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            Maaf Tanggal yang anda masukan tidak tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>