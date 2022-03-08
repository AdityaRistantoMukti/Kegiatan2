<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Activity;

class ManageKegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Activity::all();

        return view('manage-kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('manage-kegiatan.create');
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);

        return view('manage-kegiatan.edit', compact('activity'));
    }

    public function store()
    {
        $activity = Activity::create($this->validateRequest());

        $this->storeImage($activity);

        
        flash()->success('Successfully');
        return redirect()->back();
    }

    // Private 
    private function validateRequest()
    {
        return tap(request()->validate([
            'nama_activity' => 'required',
            'idr'   => 'required',
            'status' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' =>'required',
            'jumlah_peserta' => 'required',
            'desc'  => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:5000',
        ]), function(){
            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'required|mimes:jpeg,jpg,png|max:5000',
                ]);
            }
        });
    }

    private function storeImage($activity){
        if (request()->has('image')) {
            $activity->update([
                'image' => request()->image->store('uploads','public'),
            ]);

            $img = Image::make(public_path('storage/'. $activity->image))->fit(300, 300, null, 'top-left');
            $img->save();
        }
    }

    // End Private

    // Edit
    public function update(Request $request, Activity $activity)
    {
        $activity->update($request->all());

        $this->storeImage($activity);

        return redirect(route('manage-kegiatan.index'));
    }

    // Hapus/Delete
    public function destroy(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
        
        $activity->delete($request->all());

        if (\File::exists(public_path('storage/'. $activity->image))) {
            \File::delete(public_path('storage/'. $activity->image));
        }

        return redirect()->back();
    }
}
