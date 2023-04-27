<?php

namespace App\Http\Controllers;

// use App\Models\Karyawan;

use App\Models\Divisi;
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
        $user = Auth::user()->id;
        $data = Profile::all()->where('user_id','!=', $user);
        return view('karyawan.index', compact('data'));
    }
    public function detail($id){
        $id = Crypt::decrypt($id);
        $data = Profile::findOrFail($id);
        
        return view('karyawan.detail', compact('data'));
    }
    public function edit($id){
        $id = Crypt::decrypt($id);
        $data = Profile::findOrFail($id);
        $div = Divisi::all();
        // dd($data);
        
        return view('karyawan.edit', compact('data','div'));
    }
    public function update(Request $request, $id){
        $id = Crypt::decrypt($id);
        $data = Profile::findOrFail($id);
        // dd($request);
        
        $form = [
            'divisi_id' => $request->divisi,
            'jabatan' => $request->jabatan,
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
       
        $data->delete();
        $user->delete();
        if($data == null || $jurnal == null){
            return redirect('logout');
        } else {
            return redirect('/karyawan');
        }
    }
}
