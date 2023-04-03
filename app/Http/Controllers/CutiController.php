<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CutiController extends Controller
{
    //
    public function index(){
        $data = Cuti::all()->where('status', null);
        return view('cuti.index', compact('data'));
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
