<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CutiController extends Controller
{
    //
    public function index(){
        if(Auth::user()->role_id == 2){
            $data = Cuti::all()->where('status', null);
            return view('cuti.index', compact('data'));
        } else if(Auth::user()->role_id == 4) {
            $data = Cuti::all()->where('user_id', Auth::user()->id);
            return view('cuti.index', compact('data'));
        }
    }
    public function index_cuti_hrd(){
        $data = Cuti::all()->where('user_id', Auth::user()->id);
        return view('cuti.index', compact('data'));
    }

    public function create(){
        return view('cuti.create');
    }
    public function store(Request $request){
        // dd($request);
        $validasi = $request->validate([
            'alasan' => 'required',
            'mulai' => 'required',
            'akhir' => 'required',
        ]);
        $user_id = Auth::user()->id;
        $profile_id = Profile::all()->where('user_id',$user_id)->first();
        // dd($profile_id);
        $validasi['user_id'] = $user_id;
        $validasi['profile_id'] = $profile_id->id;
        // dd($validasi['profile_id']);
        Cuti::create($validasi);
        if(Auth::user()->id == 2){
            return redirect('/cuti');
        } elseif(Auth::user()->id == 4){
            return redirect('/pengcuti');
        }
    }

    public function index_setuju(){
        $data = Cuti::all()->where('status', 'setuju');
        return view('cuti.index', compact('data'));
    }
    public function index_tolak(){
        $data = Cuti::all()->where('status', 'tolak');
        return view('cuti.index', compact('data'));
    }
    public function setuju($id){
            $id = Crypt::decrypt($id);
            $data = Cuti::findOrFail($id);
            // dd($data);
            $status = ['status' => 'setuju'];
            $data->update($status);
            return redirect('/cuti');
    }
    public function tolak($id){
            $id = Crypt::decrypt($id);
            $data = Cuti::findOrFail($id);
            // dd($data);
            $status = ['status' => 'tolak'];
            $data->update($status);
            return redirect('/cuti');
    }
}
