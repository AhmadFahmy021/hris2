<?php

namespace App\Http\Middleware;

use App\Models\Profile as ModelsProfile;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class profile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role_id == 1){
            return $next($request);
        }else{
            $prof = ModelsProfile::all()->where('user_id','=',Auth::user()->id)->count();
            // dd($prof);
            if($prof > 0){
                return $next($request);
            } else{
                return redirect('/profile/create');
            }
        }
    }
}
