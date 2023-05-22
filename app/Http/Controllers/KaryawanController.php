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
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
    //
    public function index(){
        $user = Auth::user()->id;
        $data = Profile::all()->where('user_id','!=', $user);
        $title = "Apakah Anda Yakin Untuk Menghapus Data?";
        $text = "Data yang di hapus tidak dapat di kembalikan lagi";
        confirmDelete($title,$text);
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
            'gaji' => $request->gaji,
            'date_gaji' => $request->date_gaji,
        ];
        $data->update($form);
        Alert::toast('Data karyawan berhasil di ubah', 'success');
        return redirect('/karyawan');
    }
    public function delete($id){
        $id = Crypt::decrypt($id);
        $data = Profile::findOrFail($id);
        $jurnal = Jurnal::all()->where('user_id',$data->user_id);
        // dd($jurnal);
        $user = User::findOrFail($data->user_id);
        // dd($user);
       
        $data->delete();
        $user->delete();
        Alert::toast("Data berhasil di hapus", 'success');
        if($data == null || $jurnal == null){
            return redirect('logout');
        } else {
            return redirect('/karyawan');
        }
    }
}
