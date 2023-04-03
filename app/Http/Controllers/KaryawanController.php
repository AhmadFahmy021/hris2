<?php

namespace App\Http\Controllers;

// use App\Models\Karyawan;

use App\Models\Jurnal;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class KaryawanController extends Controller
{
    //
    public function index(){
        $user = User::all();
        // dd($user->id);
        $data = Profile::all();
        // dd($data->user->name);
        // foreach($data as $dt){
        //     dd($dt->user->name);
        // }
        return view('karyawan.index', compact('data'));
    }
    public function detail($id){
        $id = Crypt::decrypt($id);
        $data = Profile::findOrFail($id);
        // dd($data);
        // foreach($data as $dt){
        //     dd($dt->user->name);
        // }
        return view('karyawan.detail', compact('data'));
    }
    public function edit($id){
        $id = Crypt::decrypt($id);
        $data = Profile::findOrFail($id);
        // dd($data);
        // foreach($data as $dt){
        //     dd($dt->user->name);
        // }
        return view('karyawan.edit', compact('data'));
    }
    public function update(Request $request, $id){
        $id = Crypt::decrypt($id);
        $data = Profile::findOrFail($id);
        // dd($request);
        // foreach($data as $dt){
        //     dd($dt->user->name);
        // }
        $form = [
            'divisi' => $request->post('divisi'),
            'jabatan' => $request->post('jabatan'),
        ];
        $data->update($form);
        return redirect('/karyawan');
    }
    public function delete($id){
        $id = Crypt::decrypt($id);
        $data = Profile::findOrFail($id);
        $jurnal = Jurnal::findOrFail($data->user_id);
        $user = User::findOrFail($data->user_id);
        // dd($user);
        // foreach($data as $dt){
        //     dd($dt->user->name);
        // }
        $data->delete();
        $user->delete();
        if($data == null || $jurnal == null){
            return redirect('logout');
        } else {
            return redirect('/karyawan');
        }
    }
}
