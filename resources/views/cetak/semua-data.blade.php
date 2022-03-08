<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Semua Data Activity</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-white">
    <div class="content px-3">
        <div class="mb-3">
            <h3 class="text-info">Laporan Periode Activity</h3>
            <h5 class="text-muted">SMK AL-BAHRI</h5>
            <h5 class="text-muted">JL.Yon Armed No.07</h5>
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
                @forelse ($kegiatans as $it)
                <tr>
                    <td>{{$it->kode_activity}}</td>
                    <td>{{$it->nama_activity}}</td>
                    <td>{{$it->idr}}</td>
                    <td>{{$it->status}}</td>
                    <td>{{$it->desc}}</td>
                    <td>{{$it->jumlah_peserta}}</td>
                    <td>{{$it->tgl_mulai}} - {{$it->tgl_selesai}}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            Maaf Data Kosong
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html> 