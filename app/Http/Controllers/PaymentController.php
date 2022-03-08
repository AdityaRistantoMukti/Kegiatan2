<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Register;
use App\Payment;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create($id)
    {
        $pembayaran = Register::findOrFail($id);

        return view('verifikasi.pendaftaran.pembayaran', compact('pembayaran'));
    }

    public function store()
    {
        $verifikasi = Payment::create($this->validateRequest());

        $this->storeImage($verifikasi);

        if ($verifikasi->save()) {
            $register = Register::findOrFail($verifikasi->register_id);
            $activity = Activity::findOrFail($register->activity_id);

            // Merubah Status
            $register->update([
                'status'    =>  'terverifikasi'
            ]);

            // Mengurangkan Total Bangku / Seat di Activity
            $hitung = $activity->jumlah_peserta - $register->qty;

            $activity->update([
                'jumlah_peserta'    => $hitung
            ]);
        }

        return redirect()->back();
    }

    private function validateRequest()
    {
        return tap(request()->validate([
            'register_id' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]), function(){
            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'required|mimes:jpeg,jpg,png|max:5000',
                ]);
            }
        });
    }

    private function storeImage($event)
    {
        if (request()->hasFile('image')) {
            $event->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            $image = Image::make(public_path('storage/'. $event->image))->fit(300, 300, null, 'top-left');
            $image->save();
        }
    }
}
