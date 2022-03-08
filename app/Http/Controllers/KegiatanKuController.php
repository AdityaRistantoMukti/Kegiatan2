<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use Illuminate\Support\Facades\Auth;

class KegiatanKuController extends Controller
{
    public function index()
    {
        $myActivitys = Register::where(['status' => 'peserta', 'user_id' => Auth::user()->id])->get();

        return view('kegiatanku.index', compact('myActivitys'));
    }
}
