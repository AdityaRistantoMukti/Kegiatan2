<?php

namespace App\Http\Controllers\Barcode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Register;

class ResoultController extends Controller
{
    public function show($id)
    {
        $peserta = Register::findOrFail($id);

        return view('barcode', compact('peserta'));
    }
}
