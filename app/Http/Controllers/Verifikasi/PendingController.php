<?php

namespace App\Http\Controllers\Verifikasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Register;
use Illuminate\Support\Facades\Auth;

class PendingController extends Controller
{
    public function index()
    {
        $pendings = Register::where(['user_id' => Auth::user()->id, 'status' => 'pending'])->paginate(6);

        return view('pendaftaran.student.pending', compact('pendings'));
    }
}
