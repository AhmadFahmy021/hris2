<?php

namespace App\Http\Middleware;

use App\Models\Profile;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DateRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = Auth::user()->id;
        $prof = Profile::all()->where('user_id', $id)->first();
        // dd(date('d', strtotime($prof->date_gaji)));
        $day = date('d', strtotime($prof->date_gaji));
         // Set tanggal yang diizinkan untuk mengakses route
        $date = Carbon::now();
        $allowed_date = $day; // tanggal yang diizinkan
        if($prof->date_gaji == null){
            return abort('403','Akses Anda Di Tangguhkan ');
        } else if ($date->day != $allowed_date) {
            return abort('403','Akses Di buka Pada Tanggal '. $allowed_date);
        }
        
        return $next($request);

        // return $next($request);

        // return $next($request);
    }
}
