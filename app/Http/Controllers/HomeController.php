<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Divisi;
use App\Models\Jurnal;
use App\Models\Profile;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

use function GuzzleHttp\Promise\all;

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
        // Query Untuk HRD
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
                // $jurnal =  DB::table('users')
                // ->leftJoin('jurnal', 'users.id', '=', 'jurnal.user_id')
                // ->select('*', DB::raw('COUNT(jurnal.id) as journal_count'))
                // ->groupBy('users.id')
                // ->orderByDesc('journal_count','desc')->where('jurnal.status','=','selesai')
                // ->get();
                $jurnal = DB::select("SELECT j.user_id, u.name, COUNT(j.id) AS jumlah_jurnal
                FROM (SELECT * FROM jurnal)j 
                INNER JOIN (SELECT * FROm users)u ON j.user_id = u.id
                GROUP BY j.user_id
                ORDER BY jumlah_jurnal DESC");
                // $jurnal = DB::select("SELECT COUNT( u.name, j.*) FROM (SELECT * FROM jurnal)j LEFT JOIN (SELECT * FROM users)u ON j.user_id = u.id GROUP BY j.user_id DESC");
                // dd($jurnal);
            }
        // Query Untuk Karyawan
            $jurnalkar = Jurnal::all()->where('user_id', Auth::user()->id)->count();
            $tugas = Tugas::all()->where('user_id', Auth::user()->id)->count();
            $cuti = Cuti::all()->where('user_id', Auth::user()->id)->count();
            $cutiSetuju = Cuti::all()->where('user_id',Auth::user()->id AND 'status','setuju')->count();
            $tugasIndiv = Tugas::all()->where('user_id','=', Auth::user()->id AND 'status','=',null OR 'status','=', 'tunda');
            $div = Profile::all()->where('user_id',Auth::user()->id)->first();
            // dd($divisi->);
            $tugasDiv = Tugas::all()->where('divisi_id','=',$div->divisi_id AND 'status','=',null OR 'status','=','tunda');

            // dd($tugasIndiv);
            if(Auth::user()->role_id == 2){
                return view('home',compact(['kar','cuti','divisi',  'tugas_selesai','jurnal','name','data']));
            } else if(Auth::user()->role_id == 4){
                return view('home',compact(['kar','cuti','divisi',  'tugas_selesai','jurnal','jurnalkar','name','data','tugas','cutiSetuju','tugasIndiv','tugasDiv']));
            }

    }
}
