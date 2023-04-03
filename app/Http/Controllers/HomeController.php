<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Jurnal;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kar = Profile::all()->count();
        $cuti = Cuti::all()->count();
        $cuti_tolak = Cuti::all()->where('status', 'tolak')->count();
        $cuti_setuju = Cuti::all()->where('status', 'setuju')->count();
        $jurnal = Jurnal::all();
        // dd($jurnal);
        // dd([$kar,$cuti,$cuti_tolak,$cuti_setuju]);
        return view('home',compact(['kar','cuti','cuti_tolak',  'cuti_setuju','jurnal']));
    }
}
