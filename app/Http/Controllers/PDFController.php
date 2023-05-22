<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Akaunting\Money\Currency;
use Akaunting\Money\Money;

class PDFController extends Controller
{
    //
    public function generatePDF(){
        $id = Auth::user()->id;
        $gaj = Gaji::all()->where('user_id','=',$id)->first();
        $prof = Profile::all()->where('user_id','=',$id)->first();
            if($gaj != null){
                $pokok = $gaj->pokok;
                $tunjangan = $gaj->tunjangan;
                $bonus = $gaj->bonus;
                $lembur = $gaj->lembur;
                $total = $pokok + $tunjangan + $bonus + $lembur;
                // dd($idr);
                $jabatan = $prof->jabatan;
                // dd($jabatan);
                // dd($total);
                $data = [
                    'name' => Auth::user()->name,
                    'date' => now()->format('d/m/Y'),
                    'pokok' => $pokok,
                    'tunjangan' => $tunjangan,
                    'bonus' => $bonus,
                    'lembur' => $lembur,
                    'total' => $total,
                    'jabatan' => $jabatan,
                ];
                
                $pdf = PDF::loadview('myPDF', $data);
                return $pdf->stream('slip-gaji.pdf');
            }
        // $user = Auth::user();
        // dd($data);
        return abort('403','Gaji Anda Belum Di Daftar Kan ');

    }
}
