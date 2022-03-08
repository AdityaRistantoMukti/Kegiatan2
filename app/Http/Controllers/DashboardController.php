<?php

namespace App\Http\Controllers;


use App\User;
use App\Register;
use App\Activity;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
            $data = [
                'students' => User::whereHas('roles', function($q){
                                $q->where('roles.name', '=', 'student');
                                  })->count(),
                'activitys'      => Activity::count(),
                'registers'      => Register::where('status','peserta')->count(),
                'pending'        => Register::where('status','pending')->count(),
                'terverifikasi'  => Register::where('status','terverifikasi')->count(),
                'delayed'        => Register::where(['user_id' => Auth::user()->id, 'status' => 'pending'])->count(),
                'verified'       => Register::where(['user_id' => Auth::user()->id, 'status' => 'terverifikasi'])->count(),
                'participant'    => Register::where(['user_id' => Auth::user()->id, 'status' => 'peserta'])->count(),
                    ];

        return view('dashboard.index', $data);
    }
}
