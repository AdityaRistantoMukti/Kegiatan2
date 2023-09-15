<?php

namespace App\Http\Controllers\Verifikasi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Register;
use Illuminate\Support\Facades\Auth;

class VerifiedController extends Controller
{
    public function index()
    {
        $verifieds = Register::where(['user_id' => Auth::user()->id, 'status' => 'terverifikasi'])->paginate(6);
        $Cverified = Register::where('status' , 'terverifikasi')->count();
        return view('pendaftaran.student.verified', compact('verifieds','Cverified'));
    }
}
