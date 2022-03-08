<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use PDF;

class PesertaController extends Controller
{
    public function index()
    {
        $registers = Register::with('user','activity')->where('status','peserta')->paginate(6);

        return view('verifikasi.peserta', compact('registers'));
    }

    public function sertifikat($id)
    {
        $sertifikat = Register::findOrFail($id);

        $pdf = PDF::loadView('cetak.sertifikat', compact('sertifikat'))->setPaper('a4', 'landscape');

        return $pdf->stream('sertifikat.pdf');
    }
}
