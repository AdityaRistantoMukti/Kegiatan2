<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;

class DaftarUlangController extends Controller
{
    public function index()
    {
        $verifikasi = Register::with('user','activity')->where('status','terverifikasi')->latest()->paginate(6);

        return view('verifikasi.ulang', compact('verifikasi'));
    }

    public function update(Request $request, $id)
    {
        $register = Register::findOrFail($id);

        $register->update([
            'status' => 'peserta'
        ]);

        return redirect()->back();
    }
}
