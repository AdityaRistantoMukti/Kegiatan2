<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use PDF;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('mulai')) {
            $activitys = Activity::whereBetWeen('tgl_mulai', [request('mulai'), request('selesai')])->get();
        }

        $pdf = PDF::loadView('cetak.activity', compact('activitys'))->setPaper('a4', 'landscape');

        return $pdf->stream('laporan_activity.pdf');
    }

    public function edit(Request $request)
    {
        $kegiatans = Activity::all();

        $pdf = PDF::loadView('cetak.semua-data', compact('kegiatans'))->setPaper('a4', 'landscape');

        return $pdf->stream('laporan_semua_data_activity');
    }
}
