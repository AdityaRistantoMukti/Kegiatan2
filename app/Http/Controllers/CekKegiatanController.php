<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\User;
use App\Register;
use App\Mail\PendaftaranMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CekKegiatanController extends Controller
{
    public function index()
    {   
        $data = [
            'kegiatans' => Activity::get(),
            'activitys' => Activity::latest()->get(),
        ];
        return view('cek-kegiatan.index', $data);
    }

    public function readmore($id)
    {
        $activity = Activity::findOrFail($id);

        return view('cek-kegiatan.readmore', compact('activity'));
    }

    public function store(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $register = Register::create([
            'user_id'       => $user->id,
            'activity_id'   => $request->activity_id,
            'status'        => $request->status,
            'qty'           => $request->qty,
        ]);
         $to = Mail::to($user->email)
         ->send(new PendaftaranMail($register));

        return redirect()->back();
    }
}
