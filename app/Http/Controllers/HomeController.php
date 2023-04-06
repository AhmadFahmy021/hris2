<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Jurnal;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

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
        $cuti = Cuti::all()->where('status', null)->count();
        $cuti_tolak = Cuti::all()->where('status', 'tolak')->count();
        $cuti_setuju = Cuti::all()->where('status', 'setuju')->count();
        // $jurnal = DB::table('jurnal')->distinct()->groupBy('user_id'); 
        $jurnal =  DB::table('users')
        ->leftJoin('jurnal', 'users.id', '=', 'jurnal.user_id')
        ->select('users.*', DB::raw('COUNT(jurnal.id) as journal_count'))
        ->groupBy('users.id')
        ->orderByDesc('journal_count','desc')
        ->get();
        // dd($jurnal);
        // dd([$kar,$cuti,$cuti_tolak,$cuti_setuju]);
        return view('home',compact(['kar','cuti','cuti_tolak',  'cuti_setuju','jurnal']));
    }
}
