<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class WelcomeController extends Controller
{
    public function index()
    {   
        $data = [
            'kegiatans' => Activity::get(),
            'activitys' => Activity::latest()->get(),
        ];
        return view('cek-kegiatan.index', $data);
    }
}
