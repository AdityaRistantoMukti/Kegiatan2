<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Register;

class VerifikasiPendaftaranController extends Controller
{
    public function index()
    {
        $pendings = Register::with('user','activity')->where('status','pending')->latest()->paginate(6);

        return view('verifikasi.index', compact('pendings'));
    }
}
