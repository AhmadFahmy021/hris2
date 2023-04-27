<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Divisi;
use App\Models\Jurnal;
use App\Models\Profile;
use App\Models\Tugas;
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
        $divisi = Divisi::all()->count();
        $tugas_selesai = Tugas::all()->where('status', 'selesai')->count();
        $tugas = Tugas::all()->where('user_id','!=',null)->where('status','selesai');
        $tgs = Tugas::where('status', 'selesai')->where('user_id','!=' ,'null')
        ->selectRaw('count(*) as jumlah, user_id')
        ->groupBy('user_id')
        ->get();
        $user = User::all();
        // foreach ($user as $usr ) {
        //     $u = $usr;
        //     dd($u);
        // }

        $name = [];
        $data = [];
        
        foreach ($tgs as $ts) {
            $name[] = $ts->user->name;
            $data[] = $ts->jumlah;
        }
        // $jurnal = DB::table('jurnal')->distinct()->groupBy('user_id'); 
        // dd($name);
        // dd([$kar,$cuti,$cuti_tolak,$cuti_setuju]);
        if(Jurnal::all() == null){
            $jurnal = Jurnal::all()->count();
        } else {
            $jurnal =  DB::table('users')->where('status','selesai')
            ->leftJoin('jurnal', 'users.id', '=', 'jurnal.user_id')
            ->select('users.*', DB::raw('COUNT(jurnal.id) as journal_count'))
            ->groupBy('users.id')
            ->orderByDesc('journal_count','desc')
            ->get();
            // dd($jurnal);
        }


        return view('home',compact(['kar','cuti','divisi',  'tugas_selesai','jurnal','name','data']));
    }
}
