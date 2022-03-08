<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Role;

class DataSiswaController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function($q){
            $q->where('roles.name', '=','student');
        })->paginate(6);

        return view('data-siswa.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        
        return view('data-siswa.create', compact('roles'));
    }
    
    public function edit($id)
    {
        $data = [
            'user'  => User::findOrFail($id),
            'role'  => Role::pluck('name','id'),
        ];

        return view('data-siswa.edit', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $request->merge(['password' => bcrypt($request->get('password'))]);

        if ($user = User::create($request->except('roles'))) {
            $user->syncRoles($request->get('roles'));

            if ($user->save()) {
                $siswa = Student::create([
                    'user_id'    => $user->id,
                    'nisn'       => $request->nisn,
                    'gender'     => $request->gender,
                    'religion'   => $request->religion,
                    'major'      => $request->major,
                    'class'      => $request->class,
                    'phone'      => $request->phone,
                    'status'     => $request->status,
                ]);
            }
        } else {
            //
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)    
    {
        $student = Student::where('user_id','=', $id)->firstOrFail();

        $student->update($request->all());

        return redirect(route('data-siswa.index'));
    }

    public function destroy(Request $request, $id)
    {   
        $user = User::findOrFail($id);

        if ($user->delete()) {
            $student = Student::where('user_id','=', $id)->firstOrFail();

            $student->delete(); 
        }
        return redirect()->back();
    }
}
