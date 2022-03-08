@component('mail::message')

<p>Hallo, {{$register->user->name}}</p>
<p>Terimakasih Telah melakukan pendaftaran dalam kegiatan kami.
    Silahkan buka link ini untuk melakukan upload bukti pembayaran anda
    dengan kode pembayaran.
</p>
<p>Kode Pendaftaran {{$register->activity->kode_activity}}</p>
<p>Jumlah Tiket : {{$register->qty}}</p>
<p>Total pembayaran : {{$register->qty * $register->activity->idr}}</p>

@component('mail::button', ['url' => "http://localhost/kegiatan2/public/user/upload-pembayaran/{$register->id}"])
      Upload Pembayaran
@endcomponent
@endcomponent