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

    public function seleksi(){
        if(Auth::user()->role_id == 1){
            return redirect('/homes');
        } else{
            return redirect('/home');
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Query Untuk HRD
            # Query code untuk jumlah dari karyawan
            $kar = Profile::all()->count();
            # Query code untuk jumlah cuti dengan status kosong atau belum diberi izin 
            $cuti = Cuti::all()->where('status', null)->count();
            # Query code untuk jumlah divisi yang telah di buat
            $divisi = Divisi::all()->count();
            # Query code untuk jumlah tugas dengan status telah di selesaikan
            $tugas_selesai = Tugas::all()->where('status', 'selesai')->count();
            # Query code untuk 
            // $tugas = Tugas::all()->where('user_id','!=',null)->where('status','selesai')->count();
            // dd($tugas);
            # Query code untuk menampilkan jumlah tugas yang selesai di kerjakan
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
            $tugasIndiv = Tugas::all()->where('user_id','=', Auth::user()->id );
            $div = Profile::all()->where('user_id',Auth::user()->id)->first();
            // dd($divisi->);
            $tugasDiv = Tugas::all()->where('divisi_id', '=', $div->divisi_id);
            $gaji = Profile::all()->where('user_id',Auth::user()->id)->first();
            //  Ambil tanggal sekarang
            $now = date('Y-m-d');
            $nowDay = date('d', strtotime($now));
            $targetDate = DB::table('profile')->whereDay('date_gaji','>=',$nowDay)->min('date_gaji');
            // dd($targetDate);
            if($nowDay == 01){
                $target = $now;
                $target = [
                    'nama' => 'Seluruh Karyawan',
                    'date' => '2023-04-01'
                ];
            } else if($targetDate == null){
                $target = [
                    'nama' => 'Seluruh Karyawan',
                    'date' => '2023-04-01',
                ];
                // dd($target['nama']);
            }else{
                $target = Profile::all()->where('date_gaji',$targetDate)->first();
                // dd($target->date_gaji);
                $target = [
                    'nama' => $target->user->name,
                    'date' => $target->date_gaji
                ];
                // dd($target);
            }
            $com = [
                'kar' => $kar,
                'cuti' => $cuti,
                'divisi'=> $divisi,
                'tugas_selesai' => $tugas_selesai,
                'jurnal' => $jurnal,
                'jurnalkar' => $jurnalkar,
                'name' => $name,
                'data' => $data,
                'tugas' => $tugas,
                'cutiSetuju' => $cutiSetuju,
                'tugasIndiv' => $tugasIndiv,
                'tugasDiv'=> $tugasDiv,
                'gaji' => $gaji,
                'nama' => $target['nama'],
                'date' => $target['date'],
            ];
            // dd($gaji->date_gaji);
            if(Auth::user()->role_id == 2){
                // return view('home',compact(['kar','cuti','divisi',  'tugas_selesai','jurnal','name','data']));
                return view('home',$com);
            } else if(Auth::user()->role_id == 4){
                return view('home',$com);
            }

    }
    public function owner()
    {
        $kar = Profile::all()->count();
        $div = Divisi::all()->count();
        $cuti = Cuti::all()->whereNull('status')->count();
        $tugasS = Tugas::all()->where('status','selesai')->count();
        $tugasK = Tugas::all()->where('user_id','!=',null )->whereNotNull('status');
        $tugasD = Tugas::all()->where('divisi_id','!=',null)->whereNotNull('status');
        $cutiK = Cuti::all()->where('status','=','setuju');
        $cutiA = Cuti::all()->whereNull('status');
        $tgs = Tugas::where('status', 'selesai')->where('user_id','!=' ,'null')
            ->selectRaw('count(*) as jumlah, user_id')
            ->groupBy('user_id')
            ->get();
            $user = User::all();
    
            $name = [];
            $data = [];
    
            foreach ($tgs as $ts) {
                $name[] = $ts->user->name;
                $data[] = $ts->jumlah;
            };
            if(Jurnal::all() == null){
                $jurnal = Jurnal::all()->count();
            } else {
                $jurnal = DB::select("SELECT j.user_id, u.name, COUNT(j.id) AS jumlah_jurnal
                FROM (SELECT * FROM jurnal)j 
                INNER JOIN (SELECT * FROm users)u ON j.user_id = u.id
                GROUP BY j.user_id
                ORDER BY jumlah_jurnal DESC");
            }

        // dd($tugasK);

        return view('homes',compact(['kar','div','cuti','tugasS','tugasK','tugasD','cutiK','cutiA','name','data','jurnal']));
    }
}
